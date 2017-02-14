@extends('layouts.app')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}">Dashboard</a></li>
        <li><a href="{{ route('departments.index') }}">Departments</a></li>
        <li class="active">Add new department</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-block">
                    @include('departments.partials.add-edit-form')
                </div>
            </div>
        </div>
    </div>
@endsection
