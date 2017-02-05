@extends('layouts.app')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Dashboard</a></li>
        <li class="active">Users</li>
    </ol>
@endsection

@section('content')
    <div class="card">
        <div class="card-header bg-white">
            <div class="media">
                <div class="media-body">
                    <h4 class="card-title">Users</h4>
                    <p class="card-subtitle">{{ $users->count() }} total</p>
                </div>
                <div class="media-right media-middle">
                    <a href="{{ route('users.create') }}" class="btn btn-circle btn-success-outline" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <i class="material-icons">add</i>
                    </a>
                </div>
            </div>
        </div>

        <ul class="list-group list-group-fit">
            @foreach($users as $user)
            <li class="list-group-item">
                <div class="media m-b-0">
                    <div class="media-left media-middle">
                        <a href="{{ route('users.edit', $user->id) }}">
                            <img src="{{ asset($user->getPicture()) }}" alt="{{ $user->name }}" width="40" class="img-circle" />
                        </a>
                    </div>
                    <div class="media-body media-middle">
                        <p class="m-b-0">
                            <a href="{{ route('users.edit', $user->id) }}">
                                {{ $user->name }}
                            </a>
                            <br />
                        </p>

                        <p class="m-b-0">
                            <small>{{ $user->email }}</small>
                        </p>

                        <small class="text-muted-light">
                            Last active {{ $user->created_at }}
                        </small>

                        <small class="text-muted">&bull;</small>

                        <small class="text-muted-light">
                            Registered at {{ $user->created_at }}
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
