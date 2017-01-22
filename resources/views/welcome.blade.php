@extends('layouts/fluid')

@section('breadcrumb')
	<ol class="breadcrumb">
	    <li><a href="{{ url('/') }}">AdminPlus</a></li>
	    <li class="active">Fixed layout</li>
	</ol>
@endsection

@section('content')
    @include('includes/content')
@endsection