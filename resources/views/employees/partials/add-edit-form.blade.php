<form action="{{ isset($employee->id) ? route('employees.update', $employee->id) : route('employees.store') }}" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Personal information</h4>
                </div>
                <div class="card-block">
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

                    <div class="form-group row {{ $errors->has('passport.address') ? 'has-danger' : '' }}">
                        <div class="col-md-2">
                            <label for="passport[address]" class="form-control-label">Address</label>
                        </div>
                        <div class="col-sm-10">
                            <textarea name="passport[address]" id="passport[address]" class="form-control" rows="5" required>{{ old('passport.address', $employee->passport->address ?? null) }}</textarea>
                            @if ($errors->has('passport.address'))
                                <small class="text-help">{{ $errors->first('passport.address') }}</small>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">ID / Passport information</h4>
                </div>
                <div class="card-block">
                    <div class="form-group row {{ $errors->has('passport.number') ? 'has-danger' : '' }}">
                        <div class="col-md-2">
                            <label for="passport[number]" class="form-control-label">Number</label>
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="passport[number]" id="passport[number]" class="form-control" placeholder="ID number" required
                                   value="{{ old('passport.number', $employee->passport->number ?? null) }}" />
                            @if ($errors->has('passport.number'))
                                <small class="text-help">{{ $errors->first('passport.number') }}</small>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row {{ $errors->has('passport.issue_by') ? 'has-danger' : '' }}">
                        <div class="col-md-2">
                            <label for="passport[issue_by]" class="form-control-label">Issue by</label>
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="passport[issue_by]" id="passport[issue_by]" class="form-control" placeholder="Issue by" required
                                   value="{{ old('passport.issue_by', $employee->passport->issue_by ?? null) }}" />
                            @if ($errors->has('passport.issue_by'))
                                <small class="text-help">{{ $errors->first('passport.issue_by') }}</small>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row {{ $errors->has('passport.issue_date') ? 'has-danger' : '' }}">
                        <div class="col-md-2">
                            <label for="passport[issue_date]" class="form-control-label">Issue date</label>
                        </div>
                        <div class="col-sm-2">
                            <div class="input-group bootstrap-touchspin">
                                <passport-dates
                                        input-name="passport[issue_date]"
                                        input-id="passport[issue_date]"
                                        input-value="{{ old('passport.issue_date', $employee->passport->issue_date ?? null) }}"
                                        input-placeholder="Issue date"
                                >
                                </passport-dates>
                                <span class="input-group-btn">
                                    <span class="btn btn-default material-icons" type="button">event</span>
                                </span>
                            </div>
                            @if ($errors->has('passport.issue_date'))
                                <small class="text-help">{{ $errors->first('passport.issue_date') }}</small>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row {{ $errors->has('passport.valid_until') ? 'has-danger' : '' }}">
                        <div class="col-md-2">
                            <label for="passport[valid_until]" class="form-control-label">Valid until</label>
                        </div>
                        <div class="col-sm-2">
                            <div class="input-group bootstrap-touchspin">
                                <passport-dates
                                        input-name="passport[valid_until]"
                                        input-id="passport[valid_until]"
                                        input-value="{{ old('passport.valid_until', $employee->passport->valid_until ?? null) }}"
                                        input-placeholder="Valid until"
                                >
                                </passport-dates>
                                <span class="input-group-btn">
                                    <span class="btn btn-default material-icons" type="button">event</span>
                                </span>
                            </div>
                            @if ($errors->has('passport.valid_until'))
                                <small class="text-help">{{ $errors->first('passport.valid_until') }}</small>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Job information</h4>
        </div>
        <div class="card-block">
            <div class="form-group row {{ $errors->has('email') ? 'has-danger' : '' }}">
                <div class="col-md-2">
                    <label for="email" class="form-control-label">Work email</label>
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
                <div class="col-sm-2">
                    <div class="input-group bootstrap-touchspin">
                        <datetime-picker
                                input-name="hired_on"
                                input-id="hired_on"
                                input-value="{{ old('hired_on', $employee->hired_on ?? null) }}"
                                input-placeholder="Hired on"
                        >
                        </datetime-picker>
                        <span class="input-group-btn">
                            <span class="btn btn-default material-icons" type="button">event</span>
                        </span>
                    </div>
                    @if ($errors->has('hired_on'))
                        <small class="text-help">{{ $errors->first('hired_on') }}</small>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Picture</h4>
        </div>
        <div class="card-block">
            <div class="media">
                <div class="media-left">
                    <div class="icon-block rounded">
                        @if(isset($employee->picture) && !empty($employee->picture))
                            <a href="{{ asset('storage/employees/pictures/' . $employee->picture) }}" target="_blank">
                                <img src="{{ asset('storage/employees/pictures/thumbs/' . $employee->picture) }}" alt="{{ $employee->fullname }}">
                            </a>
                        @endif
                    </div>
                </div>
                <div class="media-body media-middle">
                    <div class="form-group row {{ $errors->has('picture') ? 'has-danger' : '' }}">
                        <div class="col-sm-10">
                            <picture-upload></picture-upload>
                        </div>

                        @if ($errors->has('picture'))
                            <small class="text-help">{{ $errors->first('picture') }}</small>
                        @endif
                    </div>
                </div>
            </div>
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
