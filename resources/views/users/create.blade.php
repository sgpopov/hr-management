@extends('layouts.app')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Dashboard</a></li>
        <li><a href="{{ url('/users') }}">Users</a></li>
        <li class="active">Create new user</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-block">
                    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group row {{ $errors->has('name') ? 'has-danger' : '' }}">
                            <div class="col-md-2">
                                <label for="name" class="col-sm-3 form-control-label">Name</label>
                            </div>
                            <div class="col-sm-5">
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="Name" required />
                                @if ($errors->has('name'))
                                    <small class="text-help">{{ $errors->first('name') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('email') ? 'has-danger' : '' }}">
                            <div class="col-md-2">
                                <label for="email" class="col-sm-3 form-control-label">Email</label>
                            </div>
                            <div class="col-sm-5">
                                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="Email" required />
                                @if ($errors->has('email'))
                                    <small class="text-help">{{ $errors->first('email') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('role_id') ? 'has-danger' : '' }}">
                            <div class="col-md-2">
                                <label for="role_id" class="col-sm-3 form-control-label">Role</label>
                            </div>
                            <div class="col-sm-3">
                                @foreach($roles as $role)
                                    <div class="form-group">
                                        <label class="c-input c-checkbox">
                                            <input type="checkbox" name="role_id[]" value="{{ $role->id }}" />
                                            <span class="c-indicator"></span>
                                            {{ $role->name }}
                                        </label>
                                    </div>
                                @endforeach

                                @if ($errors->has('role_id'))
                                    <small class="text-help">{{ $errors->first('role_id') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2">
                                <label for="picture" class="col-sm-3 form-control-label">Picture</label>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="picture">
                                        <input type="file" name="picture" id="picture" />
                                        <span class="file-custom"></span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row m-b-0">
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
