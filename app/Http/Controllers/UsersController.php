<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * List users.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    /**
     * Render create user form.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $roles = Role::all();

        return view('users.create', compact('roles'));
    }

    /**
     * Create new user.
     *
     * @param UsersRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UsersRequest $request)
    {
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

        return redirect()->route('users.index')->with('status', 'User created!');
    }

    /**
     * Render edit user form.
     *
     * @param User $user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        $roles = Role::all();

        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update user.
     *
     * @param UsersRequest $request
     * @param User $user
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UsersRequest $request, User $user)
    {
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

    /**
     * Remove user.
     *
     * @param User $user
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('status', 'User deleted.');
    }

    /**
     * Generate random user password.
     *
     * @return string
     */
    protected function generatePassword()
    {
        return str_random(15);
    }
}
