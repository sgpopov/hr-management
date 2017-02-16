<?php

namespace App\Http\Controllers;

use App\Department;
use App\Employee;
use App\Employees\Filters as EmployeesFilters;
use App\Http\Requests\EmployeeRequest;
use App\Team;

class EmployeesController extends Controller
{
    protected $paginate = 20;

    /**
     * Display all employees.
     *
     * @param EmployeesFilters $filters
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EmployeesFilters $filters)
    {
        $employees = Employee::filter($filters)->paginate($this->paginate);
        $departments = $this->getDepartments();
        $teams = $this->getTeams();

        return view('employees.index', compact('employees', 'departments', 'teams'));
    }

    /**
     * Return list with all departments.
     *
     * @return mixed
     */
    protected function getDepartments()
    {
        if (request()->has('team')) {
            $departments = Department::whereHas('teams', function ($team) {
                $team->where('id', request()->input('team'));
            })->orderBy('name', 'asc')->get();
        } else {
            $departments = Department::orderBy('name', 'asc')->get();
        }

        return $departments;
    }

    /**
     * Returns list with all teams optionally filtred by department.
     *
     * @return mixed
     */
    protected function getTeams()
    {
        if (request()->has('department')) {
            $departmentId = request()->input('department');

            $teams = Team::where('department_id', $departmentId)
                ->orderBy('name', 'asc')
                ->get();
        } else {
            $teams = Team::orderBy('name', 'asc')->get();
        }

        return $teams;
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
