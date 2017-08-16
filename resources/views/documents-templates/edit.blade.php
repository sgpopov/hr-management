@extends('layouts.app')

@section('breadcrumb')
    {!! Breadcrumbs::render('document-templates.edit') !!}
@endsection

@section('content')
    @include('documents-templates.partials.add-edit-form')
@endsection
