<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();

        return view('users.create', compact('roles'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();

        return view('users.edit', compact('user', 'roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users',
            'role_id' => 'required',
            'role_id.*' => 'exists:roles,id',
            'picture' => 'sometimes|mimes:jpeg,png'
        ], [
            'role_id.required' => 'The role field is required.'
        ]);

        // ToDo: Upload user picture
        if ($request->hasFile('picture')) {
            $extension = $request->picture->extension();
            $filename = "{$request->name}.{$extension}";

            $request->file('picture')->storeAs('public/images/users', $filename);
        }

        // Create random password and email it to the user.
        $generatedPassword = $this->generatePassword();

        $request->request->add([
            'password' => Hash::make($generatedPassword)
        ]);

        User::create($request->all());

        return redirect()->action('UsersController@index');
    }

    /**
     * Update user.
     *
     * @param Request $request
     * @param User $user
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $user->id,
            'role_id' => 'sometimes|required',
            'role_id.*' => 'exists:roles,id',
            'picture' => 'sometimes|mimes:jpeg,png',
            'old_password' => 'required_with:new_password|oldpassword',
            'new_password' => 'required_with:old_password,confirm_password|min:6',
            'confirm_password' => 'required_with:new_password|same:new_password'
        ], [
            'role_id.required' => 'The role field is required.',
            'old_password.oldpassword' => 'Ivalid password.'
        ]);

        // ToDo: Delete old user picture if requested

        // ToDo: Upload user picture

        if ($request->new_password) {
            $user->password = $request->new_password;
        }

        $user->update($request->all());

        if ($request->role_id) {
            $user->roles()->sync($request->role_id);
        }

        return redirect()->back()->with('status', 'Profile updated!');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->back()->with('status', 'User deleted.');
    }

    protected function generatePassword()
    {
        return str_random(15);
    }
}
