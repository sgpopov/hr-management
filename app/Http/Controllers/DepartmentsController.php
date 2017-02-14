<?php

namespace App\Http\Controllers;

use App\Department;
use App\Employee;
use App\Http\Requests\DepartmentsRequest;

class DepartmentsController extends Controller
{
    /**
     * Display all departments.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all()->sortBy('name', SORT_ASC);;

        return view('departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new department.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::all()->sortBy('fullname', SORT_ASC);;

        return view('departments.create', compact('employees'));
    }

    /**
     * Store a newly created department.
     *
     * @param DepartmentsRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentsRequest $request)
    {
        Department::create($request->all());

        return redirect()
            ->route('departments.index')
            ->with('status', 'Department created!');
    }

    /**
     * Show the form for editing the specified department.
     *
     * @param \App\Department $department
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        $employees = Employee::all()->sortBy('fullname', SORT_ASC);

        return view('departments.edit', compact('department', 'employees'));
    }

    /**
     * Update the specified department.
     *
     * @param DepartmentsRequest $request
     * @param \App\Department $department
     *
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentsRequest $request, Department $department)
    {
        $department->update($request->all());

        return redirect()
            ->route('departments.index')
            ->with('status', 'Departments updated!');
    }

    /**
     * Remove the specified department.
     *
     * @param \App\Department $department
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        //
    }
}
