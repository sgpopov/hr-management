@extends('layouts/app')

@section('breadcrumb')
    {!! Breadcrumbs::render('home') !!}
@endsection

@section('content')
    @include('includes/content')
@endsection
