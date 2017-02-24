@extends('layouts.app')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Dashboard</a></li>
        <li><a href="{{ url('/documents') }}">Documents</a></li>
        <li><a href="{{ route('documentTemplates.index') }}">Templates</a></li>
        <li class="active">Edit template</li>
    </ol>
@endsection

@section('content')
    @include('documents-templates.partials.add-edit-form')
@endsection
