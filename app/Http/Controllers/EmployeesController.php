<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Http\Requests\EmployeeRequest;
use App\Team;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    protected $paginate = 20;

    /**
     * Display all employees.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::orderBy('fullname', 'asc')->paginate($this->paginate);

        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new employee.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::orderBy('name', 'asc')->get();

        return view('employees.create', compact('teams'));
    }

    /**
     * Store a newly created employee in storage.
     *
     * @param EmployeeRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        Employee::create($request->all());

        return redirect()
            ->route('employees.index')
            ->with('status', 'Employee created!');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Employee $employee
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Employee $employee
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $teams = Team::orderBy('name', 'asc')->get();

        return view('employees.edit', compact('employee', 'teams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EmployeeRequest $request
     * @param \App\Employee $employee
     *
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->all());
        $employee->passport()->update($request->get('passport'));

        return redirect()
            ->route('employees.index')
            ->with('status', 'Employee updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee $employee
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
