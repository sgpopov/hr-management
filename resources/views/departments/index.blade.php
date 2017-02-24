@extends('layouts.app')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Dashboard</a></li>
        <li class="active">Departments</li>
    </ol>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="media">
                <div class="media-body">
                    <h4 class="card-title">Departments</h4>
                    <p class="card-subtitle">{{ $departments->count() }} total</p>
                </div>
                <div class="media-right media-middle">
                    <a href="{{ route('departments.create') }}" class="btn btn-rounded-deep btn-success-outline">
                        <i class="material-icons">add</i>
                        <span class="icon-text">Add</span>
                    </a>
                </div>
            </div>
        </div>

        <ul class="list-group list-group-fit m-b-0">
            @foreach($departments as $department)
                <li class="list-group-item">
                    <div class="media">
                        <div class="media-body media-middle">
                            <div>
                                <a href="{{ route('departments.edit', $department->id) }}">{{ $department->name }}</a>
                            </div>
                        </div>
                        <div class="media-right center">
                            <a href="{{ route('employees.view', $department->manager->id) }}" class="nav-link active p-a-0">
                                @if (!empty($department->manager->picture))
                                <img src="/storage/employees/pictures/thumbs/{{ $department->manager->picture }}" alt="Avatar" class="img-circle" width="40" />
                                @else
                                    <img src="/storage/images/avatar.png" alt="Avatar" class="img-circle" width="40" />
                                @endif
                            </a>
                            <span class="text-muted-light">manager</span>
                        </div>
                        <div class="media-right center">
                            <h2 class="m-b-0">{{ $department->teams()->count() }}</h2>
                            <span class="text-muted-light">teams</span>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
