@extends('layouts.app')

@section('breadcrumb')
    {!! Breadcrumbs::render('documents.create') !!}
@endsection

@section('content')
    @include('documents.partials.add-edit-form')
@endsection
