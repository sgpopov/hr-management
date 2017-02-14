<form action="{{ isset($team->id) ? route('teams.update', $team->id) : route('teams.store') }}" method="POST" enctype="multipart/form-data">
    <div class="form-group row {{ $errors->has('name') ? 'has-danger' : '' }}">
        <div class="col-md-2">
            <label for="name" class="col-sm-3 form-control-label">Name</label>
        </div>
        <div class="col-sm-5">
            <input type="text" name="name" id="name" class="form-control" placeholder="Name" required
                   value="{{ old('name', $team->name ?? null) }}" />
            @if ($errors->has('name'))
                <small class="text-help">{{ $errors->first('name') }}</small>
            @endif
        </div>
    </div>

    <div class="form-group row {{ $errors->has('department_id') ? 'has-danger' : '' }}">
        <div class="col-md-2">
            <label for="department_id" class="col-sm-3 form-control-label">Department</label>
        </div>
        <div class="col-sm-5">
            <select name="department_id" id="department_id" class="form-control" required>
                <option value="">Please select department</option>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}" {{ (old('department_id', $team->department_id ?? null) == $department->id) ? 'selected' : '' }}>{{ $department->name }}</option>
                @endforeach
            </select>

            @if ($errors->has('department_id'))
                <small class="text-help">{{ $errors->first('department_id') }}</small>
            @endif
        </div>
    </div>

    <div class="form-group row {{ $errors->has('manager_id') ? 'has-danger' : '' }}">
        <div class="col-md-2">
            <label for="manager_id" class="col-sm-3 form-control-label">Manager</label>
        </div>
        <div class="col-sm-5">
            <select name="manager_id" id="manager_id" class="form-control" required>
                <option value="">Please select team manager</option>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}" {{ (old('manager_id', $team->manager_id ?? null) == $employee->id) ? 'selected' : '' }}>{{ $employee->fullname }}</option>
                @endforeach
            </select>

            @if ($errors->has('manager_id'))
                <small class="text-help">{{ $errors->first('manager_id') }}</small>
            @endif
        </div>
    </div>

    <div class="form-group row {{ $errors->has('leader_id') ? 'has-danger' : '' }}">
        <div class="col-md-2">
            <label for="leader_id" class="col-sm-3 form-control-label">Leader</label>
        </div>
        <div class="col-sm-5">
            <select name="leader_id" id="leader_id" class="form-control" required>
                <option value="">Please select team leader</option>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}" {{ (old('leader_id', $team->leader_id ?? null) == $employee->id) ? 'selected' : '' }}>{{ $employee->fullname }}</option>
                @endforeach
            </select>

            @if ($errors->has('leader_id'))
                <small class="text-help">{{ $errors->first('leader_id') }}</small>
            @endif
        </div>
    </div>

    <div class="form-group row m-b-0">
        <div class="col-sm-9">
            <button type="submit" class="btn btn-primary">{{ isset($team->id) ? 'Update' : 'Submit' }}</button>
        </div>
    </div>

    {{ csrf_field() }}

    @if (isset($team->id))
        <input type="hidden" name="_method" value="PATCH">
    @endif
</form>
