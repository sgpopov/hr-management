@extends('layouts.app')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}">Dashboard</a></li>
        <li><a href="{{ route('roles.index') }}">Roles</a></li>
        <li class="active">Create new role</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-block">
                    @include('roles.partials.add-edit-form')
                </div>
            </div>
        </div>
    </div>
@endsection
