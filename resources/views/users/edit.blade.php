@extends('layouts.app')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Dashboard</a></li>
        <li><a href="{{ url('/users') }}">Users</a></li>
        <li class="active">Update user information</li>
    </ol>
@endsection

@section('content')

    @if (session('status'))
        @include('partials.alert-success', [
            'message' => session('status')
        ])
    @endif

    <div class="card">
        <div class="card-block">
            <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="row">
                    <div class="col-sm-12 col-lg-7">
                        <div class="row">
                            <div class="form-group row {{ $errors->has('name') ? 'has-danger' : '' }}">
                                <div class="col-md-3">
                                    <label for="name" class="form-control-label">Name</label>
                                </div>
                                <div class="col-sm-5">
                                    <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" placeholder="Name"/>
                                    @if ($errors->has('name'))
                                        <small class="text-help">{{ $errors->first('name') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row {{ $errors->has('email') ? 'has-danger' : '' }}">
                                <div class="col-md-3">
                                    <label for="email" class="form-control-label">Email</label>
                                </div>
                                <div class="col-sm-5">
                                    <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" placeholder="Email">
                                    @if ($errors->has('email'))
                                        <small class="text-help">{{ $errors->first('email') }}</small>
                                    @endif
                                </div>
                            </div>

                            @unless($user->id !== Auth::user()->id)
                            <div class="form-group row {{ $errors->has('old_password') ? 'has-danger' : '' }}">
                                <div class="col-md-3">
                                    <label for="old_password" class="form-control-label">Old password</label>
                                </div>
                                <div class="col-sm-5">
                                    <input type="password" name="old_password" id="old_password" class="form-control">
                                    @if ($errors->has('old_password'))
                                        <small class="text-help">{{ $errors->first('old_password') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row {{ $errors->has('new_password') ? 'has-danger' : '' }}">
                                <div class="col-md-3">
                                    <label for="new_password" class="form-control-label">New password</label>
                                </div>
                                <div class="col-sm-5">
                                    <input type="password" name="new_password" id="new_password" class="form-control">
                                    @if ($errors->has('new_password'))
                                        <small class="text-help">{{ $errors->first('new_password') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row {{ $errors->has('confirm_password') ? 'has-danger' : '' }}">
                                <div class="col-md-3">
                                    <label for="confirm_password" class="form-control-label">Confirm new password</label>
                                </div>
                                <div class="col-sm-5">
                                    <input type="password" name="confirm_password" id="confirm_password" class="form-control">
                                    @if ($errors->has('confirm_password'))
                                        <small class="text-help">{{ $errors->first('confirm_password') }}</small>
                                    @endif
                                </div>
                            </div>
                            @endunless

                            @if (Auth::user()->hasRole('admin'))
                            <div class="form-group row {{ $errors->has('role_id') ? 'has-danger' : '' }}">
                                <div class="col-md-3">
                                    <label for="role_id" class="form-control-label">Roles</label>
                                </div>
                                <div class="col-sm-3">
                                    @foreach($roles as $role)
                                        <div class="form-group">
                                            <label class="c-input c-checkbox">
                                                <input type="checkbox" name="role_id[]" value="{{ $role->id }}" {{ $user->hasRole($role->name) ? 'checked' : '' }} />
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
                            @endif
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-5">
                        <div class="form-group row {{ $errors->has('picture') ? 'has-danger' : '' }}">
                            <div class="col-md-12">
                                Profile picture
                            </div>
                            <div class="col-md-12">
                                {{--<div class="form-group">--}}
                                {{--<label class="picture">--}}
                                {{--<input type="file" name="picture" id="picture"/>--}}
                                {{--<span class="file-custom"></span>--}}
                                {{--</label>--}}
                                {{--</div>--}}

                                <div class="media">
                                    <div class="media-body">
                                        <div class="p-t-2">
                                            <a href="{{ $user->getPicture() }}" target="_blank">
                                                <img src="{{ asset($user->getPicture()) }}" alt="" width="80">
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                {{--@if ($errors->has('picture'))--}}
                                    {{--<small class="text-help">{{ $errors->first('picture') }}</small>--}}
                                {{--@endif--}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row m-b-0">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
