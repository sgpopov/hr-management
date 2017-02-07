<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Role;
use App\Route;

class RolesController extends Controller
{
    /**
     * List all roles.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $roles = Role::all();

        return view('roles.index', compact('roles'));
    }

    /**
     * Render create new role form.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $routes = Route::all();

        return view('roles.create', compact('routes'));
    }

    /**
     * Create new role with the
     *
     * @param StoreRoleRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRoleRequest $request)
    {
        $role = Role::create($request->all());
        $role->assignRoutes($request->get('route_id'));

        return redirect()
            ->route('roles.index')
            ->with('status', 'Role created!');
    }

    /**
     * Render edit role form.
     *
     * @param Role $role
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Role $role)
    {
        $routes = Route::all();

        return view('roles.edit', compact('role', 'routes'));
    }

    public function update(StoreRoleRequest $request, Role $role)
    {
        $role->update($request->all());
        $role->routes()->sync($request->get('route_id'));

        return redirect()
            ->route('roles.index')
            ->with('status', 'Profile updated!');
    }
}
