<?php

namespace App\Http\Controllers;

use App\Department;
use App\Employee;
use App\Employees\Filters as EmployeesFilters;
use App\Http\Requests\EmployeeRequest;
use App\Team;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class EmployeesController extends Controller
{
    /**
     * Paginate employees list.
     *
     * @var int
     */
    protected $paginate = 20;

    /**
     * Employees pictures path.
     *
     * @var string
     */
    protected $picturesPath = 'public/employees/pictures/';

    /**
     * Employees thumbnail pictures path.
     *
     * @var string
     */
    protected $thumbPicturesPath = 'public/employees/pictures/thumbs/';

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
        $employee = Employee::create($request->except('picture'));

        if ($request->has('picture')) {
            $this->setPicture($employee, $request->picture);
        }

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
        return view('employees.show', compact('employee'));
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
        $employee->update($request->except('picture'));
        $employee->passport()->update($request->get('passport'));

        if ($request->has('picture')) {
            $this->removePicture($employee);
            $this->setPicture($employee, $request->picture);
        }

        return redirect()
            ->route('employees.index')
            ->with('status', 'Employee updated!');
    }

    /**
     * Set employee's picture.
     *
     * @param Employee $employee
     * @param string $picture
     *
     * @return void
     */
    protected function setPicture(Employee $employee, string $picture)
    {
        // Set the filename using the following format: {id}-{fullname}.png
        //
        // For example:
        //
        // ID = 3, Fullname = Mr. Myron Moen;
        // File --> 3-mr-myron-moen.jpg
        $filename = sprintf(
            '%d-%s.%s',
            $employee->id, Str::slug($employee->fullname), 'png'
        );

        // Store the original file to the storage.
        $image = Image::make($picture);

        Storage::put($this->picturesPath . $filename, $image->stream());

        // Create thumbnail with the with of 56 and constrain aspect ratio (auto height)
        // and save to the storage.
        $thumb = Image::make($picture)->resize(56, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize(); // prevent possible upsizing
        });

        Storage::put($this->thumbPicturesPath . $filename, $thumb->stream());

        $employee->update(['picture' => $filename]);
    }

    /**
     * Removes employee picture if they have one.
     *
     * @param Employee $employee
     *
     * @return void
     */
    protected function removePicture(Employee $employee)
    {
        if (empty($employee->picture)) {
            return;
        }

        Storage::delete($this->picturesPath . $employee->picture);
        Storage::delete($this->thumbPicturesPath . $employee->picture);
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
