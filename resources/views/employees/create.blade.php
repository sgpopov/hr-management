@extends('layouts.app')

@section('breadcrumb')
    {!! Breadcrumbs::render('employee.create') !!}
@endsection

@section('content')
    @include('employees.partials.add-edit-form')
@endsection
