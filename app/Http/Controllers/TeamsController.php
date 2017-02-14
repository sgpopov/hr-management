<?php

namespace App\Http\Controllers;

use App\Department;
use App\Employee;
use App\Http\Requests\TeamRequest;
use App\Team;

class TeamsController extends Controller
{
    /**
     * Display all teams.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all()->sortBy('name', SORT_ASC);

        return view('teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new team.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::all()->sortBy('fullname', SORT_ASC);
        $departments = Department::all()->sortBy('name', SORT_ASC);

        return view('teams.create', compact('team', 'departments', 'employees'));
    }

    /**
     * Store a newly created team in storage.
     *
     * @param TeamRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TeamRequest $request)
    {
        Team::create($request->all());

        return redirect()
            ->route('teams.index')
            ->with('status', 'Team create!');
    }

    /**
     * Show the form for editing the specified team.
     *
     * @param \App\Team $team
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        $employees = Employee::all()->sortBy('fullname', SORT_ASC);
        $departments = Department::all()->sortBy('name', SORT_ASC);

        return view('teams.edit', compact('team', 'departments', 'employees'));
    }

    /**
     * Update the specified team in storage.
     *
     * @param TeamRequest $request
     * @param \App\Team $team
     *
     * @return \Illuminate\Http\Response
     */
    public function update(TeamRequest $request, Team $team)
    {
        $team->update($request->all());

        return redirect()
            ->route('teams.index')
            ->with('status', 'Team updated!');
    }

    /**
     * Remove the specified team from storage.
     *
     * @param \App\Team $team
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        //
    }
}
