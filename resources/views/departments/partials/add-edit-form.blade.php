<form action="{{ isset($department->id) ? route('departments.update', $department->id) : route('departments.store') }}" method="POST" enctype="multipart/form-data">
    @if (isset($department->id))
        <input type="hidden" name="_method" value="PATCH">
    @endif
    {{ csrf_field() }}

    <div class="form-group row {{ $errors->has('name') ? 'has-danger' : '' }}">
        <div class="col-md-2">
            <label for="name" class="col-sm-3 form-control-label">Name</label>
        </div>
        <div class="col-sm-5">
            <input type="text" name="name" id="name" class="form-control" placeholder="Name" required
                   value="{{ old('name', $department->name ?? null) }}" />
            @if ($errors->has('name'))
                <small class="text-help">{{ $errors->first('name') }}</small>
            @endif
        </div>
    </div>

    <div class="form-group row {{ $errors->has('manager_id') ? 'has-danger' : '' }}">
        <div class="col-md-2">
            <label for="manager_id" class="col-sm-3 form-control-label">Manager</label>
        </div>
        <div class="col-sm-5">
            <select name="manager_id" id="manager_id" class="form-control" required>
                <option value="">Please select</option>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}" {{ (old('manager_id', $department->manager_id ?? null) == $employee->id) ? 'selected' : '' }}>{{ $employee->fullname }}</option>
                @endforeach
            </select>

            @if ($errors->has('manager_id'))
                <small class="text-help">{{ $errors->first('manager_id') }}</small>
            @endif
        </div>
    </div>

    <div class="form-group row m-b-0">
        <div class="col-sm-9">
            <button type="submit" class="btn btn-primary">{{ isset($department->id) ? 'Update' : 'Submit' }}</button>
        </div>
    </div>
</form>
