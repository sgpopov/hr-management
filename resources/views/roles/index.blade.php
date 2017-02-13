@extends('layouts.app')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Dashboard</a></li>
        <li class="active">Roles</li>
    </ol>
@endsection

@section('content')
    <div class="card">
        <div class="card-header bg-white">
            <div class="media">
                <div class="media-body">
                    <h4 class="card-title">Roles</h4>
                    <p class="card-subtitle">{{ $roles->count() }} total</p>
                </div>
                <div class="media-right media-middle">
                    <a href="{{ route('roles.create') }}" class="btn btn-rounded-deep btn-success-outline">
                        <i class="material-icons">add</i>
                        <span class="icon-text">Add</span>
                    </a>
                </div>
            </div>
        </div>

        <roles-list :list="{{ $roles }}"></roles-list>
    </div>
@endsection
