@extends('layouts.app')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Dashboard</a></li>
        <li><a href="{{ url('/documents') }}">Documents</a></li>
        <li><a href="{{ route('documentsKeywords.index') }}">Keywords</a></li>
        <li class="active">Edit keyword</li>
    </ol>
@endsection

@section('content')
    @include('documents-keywords.partials.add-edit-form')
@endsection
