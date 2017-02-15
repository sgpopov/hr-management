@extends('layouts.app')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}">Dashboard</a></li>
        <li><a href="{{ route('employees.index') }}">Employees</a></li>
        <li class="active">Update employee</li>
    </ol>
@endsection

@section('content')
    @include('employees.partials.add-edit-form')
@endsection
