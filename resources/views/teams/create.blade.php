@extends('layouts.app')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}">Dashboard</a></li>
        <li><a href="{{ route('teams.index') }}">Teams</a></li>
        <li class="active">Add new team</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-block">
                    @include('teams.partials.add-edit-form')
                </div>
            </div>
        </div>
    </div>
@endsection
