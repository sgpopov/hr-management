@extends('layouts.app')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Dashboard</a></li>
        <li class="active">Roles</li>
    </ol>
@endsection

@section('content')
    <div class="card">
        <div class="card-header bg-white">
            <div class="media">
                <div class="media-body">
                    <h4 class="card-title">Roles</h4>
                    <p class="card-subtitle">{{ $roles->count() }} total</p>
                </div>
                <div class="media-right media-middle">
                    <a href="{{ route('roles.create') }}" class="btn btn-rounded-deep btn-success-outline">
                        <i class="material-icons">add</i>
                        <span class="icon-text">Add</span>
                    </a>
                </div>
            </div>
        </div>

        <ul class="list-group list-group-fit">
            @foreach($roles as $role)
            <li class="list-group-item">
                <div class="media m-b-0">
                    <div class="media-body media-middle">
                        <p class="m-b-0">
                            <a href="{{ route('roles.edit', $role->id) }}">
                                {{ $role->name }}
                            </a>
                            <br />
                        </p>

                        <p class="m-b-0">
                            <small>{{ $role->description }}</small>
                        </p>

                        <small class="text-muted-light">
                            {{ $role->users->count() }} users &bull;
                            {{ $role->routes->count() }} routes
                        </small>

                        <div class="card-button-wrapper">
                            <div class="dropdown">
                                <a href="javascript:" class="card-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="javascript:" class="dropdown-item js-delete-user">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
@endsection
