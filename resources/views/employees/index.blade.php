@extends('layouts.app')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Dashboard</a></li>
        <li class="active">Employees</li>
    </ol>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="media">
                <div class="media-body">
                    <h4 class="card-title">Employees</h4>
                    <p class="card-subtitle">
                        {{ $employees->total() }} total
                    </p>
                </div>
                <div class="media-right media-middle">
                    <a href="{{ route('employees.create') }}" class="btn btn-rounded-deep btn-success-outline">
                        <i class="material-icons">add</i>
                        <span class="icon-text">Add</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="card-block">
            @include('employees.partials.filters-form')
        </div>

        <ul class="list-group list-group-fit m-b-0">
            @foreach($employees as $employee)
                <li class="list-group-item">
                    <div class="media">
                        <div class="media-body media-middle">
                            <div class="m-b-1">
                                <a href="{{ route('employees.edit', $employee->id) }}">{{ $employee->fullname }}</a>
                            </div>
                            <div class="m-b-1">
                                {{ $employee->email }}
                            </div>
                            <span class="text-muted">
                                Employee since: <b>{{ $employee->hired_on }}</b> &bull;
                                Department: <a href="">{{ $employee->team->department->name }}</a> &bull;
                                Team: <a href="">{{ $employee->team->name }}</a>
                            </span>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>

        <div class="card-footer card-pagination align-middle">
            <span>
                Showing {{ $employees->firstItem() }} to {{ $employees->lastItem() }} of {{ $employees->total() }} employees.
            </span>

            {{ $employees->appends(request()->query())->links() }}
        </div>
    </div>
@endsection
