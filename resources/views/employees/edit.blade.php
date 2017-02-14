@extends('layouts.app')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}">Dashboard</a></li>
        <li><a href="{{ route('employees.index') }}">Employees</a></li>
        <li class="active">Update employee</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-block">
                    @include('employees.partials.add-edit-form')
                </div>
            </div>
        </div>
    </div>
@endsection
