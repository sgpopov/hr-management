@extends('layouts.app')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Dashboard</a></li>
        <li class="active">Teams</li>
    </ol>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="media">
                <div class="media-body">
                    <h4 class="card-title">Teams</h4>
                    <p class="card-subtitle">{{ $teams->count() }} total</p>
                </div>
                <div class="media-right media-middle">
                    <a href="{{ route('teams.create') }}" class="btn btn-rounded-deep btn-success-outline">
                        <i class="material-icons">add</i>
                        <span class="icon-text">Add</span>
                    </a>
                </div>
            </div>
        </div>

        <ul class="list-group list-group-fit m-b-0">
            @foreach($teams as $team)
                <li class="list-group-item">
                    <div class="media">
                        <div class="media-body media-middle">
                            <div>
                                <a href="{{ route('teams.edit', $team->id) }}">{{ $team->name }}</a>
                            </div>

                            <small class="text-light">
                                Department: <a href="{{ route('departments.edit', $team->department->id) }}">{{ $team->department->name }}</a>
                            </small>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
