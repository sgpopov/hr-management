<form action="{{ isset($employee->id) ? route('employees.update', $employee->id) : route('employees.store') }}" method="POST" enctype="multipart/form-data">
    <div class="form-group row {{ $errors->has('first_name') ? 'has-danger' : '' }}">
        <div class="col-md-2">
            <label for="first_name" class="form-control-label">First name</label>
        </div>
        <div class="col-sm-3">
            <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First name" required
                   value="{{ old('first_name', $employee->first_name ?? null) }}" />
            @if ($errors->has('first_name'))
                <small class="text-help">{{ $errors->first('first_name') }}</small>
            @endif
        </div>
    </div>

    <div class="form-group row {{ $errors->has('family_name') ? 'has-danger' : '' }}">
        <div class="col-md-2">
            <label for="family_name" class="form-control-label">Family name</label>
        </div>
        <div class="col-sm-3">
            <input type="text" name="family_name" id="family_name" class="form-control" placeholder="Family name" required
                   value="{{ old('family_name', $employee->family_name ?? null) }}" />
            @if ($errors->has('family_name'))
                <small class="text-help">{{ $errors->first('family_name') }}</small>
            @endif
        </div>
    </div>

    <div class="form-group row {{ $errors->has('fullname') ? 'has-danger' : '' }}">
        <div class="col-md-2">
            <label for="fullname" class="form-control-label">Fullname</label>
        </div>
        <div class="col-sm-3">
            <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Fullname" required
                   value="{{ old('fullname', $employee->fullname ?? null) }}" />
            @if ($errors->has('fullname'))
                <small class="text-help">{{ $errors->first('fullname') }}</small>
            @endif
        </div>
    </div>

    <div class="form-group row {{ $errors->has('email') ? 'has-danger' : '' }}">
        <div class="col-md-2">
            <label for="email" class="form-control-label">Email</label>
        </div>
        <div class="col-sm-3">
            <input type="email" name="email" id="email" class="form-control" placeholder="Email address" required
                   value="{{ old('email', $employee->email ?? null) }}" />
            @if ($errors->has('email'))
                <small class="text-help">{{ $errors->first('email') }}</small>
            @endif
        </div>
    </div>

    <div class="form-group row {{ $errors->has('team_id') ? 'has-danger' : '' }}">
        <div class="col-md-2">
            <label for="team_id" class="col-sm-3 form-control-label">Team</label>
        </div>
        <div class="col-sm-5 col-md-3 col-lg-2">
            <select name="team_id" id="team_id" class="form-control" required>
                <option value="">Please select team</option>
                @foreach($teams as $team)
                    <option value="{{ $team->id }}" {{ (old('team_id', $employee->team_id ?? null) == $team->id) ? 'selected' : '' }}>{{ $team->name }}</option>
                @endforeach
            </select>

            @if ($errors->has('team_id'))
                <small class="text-help">{{ $errors->first('team_id') }}</small>
            @endif
        </div>
    </div>

    <div class="form-group row {{ $errors->has('hired_on') ? 'has-danger' : '' }}">
        <div class="col-md-2">
            <label for="hired_on" class="form-control-label">Hired on</label>
        </div>
        <div class="col-sm-3">
            <input type="date" name="hired_on" id="hired_on" class="form-control" placeholder="Email address" required
                   value="{{ old('hired_on', $employee->hired_on ?? null) }}" />
            @if ($errors->has('hired_on'))
                <small class="text-help">{{ $errors->first('hired_on') }}</small>
            @endif
        </div>
    </div>

    <div class="form-group row m-b-0">
        <div class="col-sm-9">
            <button type="submit" class="btn btn-primary">{{ isset($employee->id) ? 'Update' : 'Submit' }}</button>
        </div>
    </div>

    {{ csrf_field() }}

    @if (isset($employee->id))
        <input type="hidden" name="_method" value="PATCH">
    @endif
</form>
