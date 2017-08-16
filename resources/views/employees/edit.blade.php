@extends('layouts.app')

@section('breadcrumb')
    {!! Breadcrumbs::render('employee.edit') !!}
@endsection

@section('content')
    @include('employees.partials.add-edit-form')
@endsection
