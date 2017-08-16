@extends('layouts.app')

@section('breadcrumb')
    {!! Breadcrumbs::render('users.index') !!}
@endsection

@section('content')
    <div class="card">
        <div class="card-header bg-white">
            <div class="media">
                <div class="media-body">
                    <h4 class="card-title">Users</h4>
                    <p class="card-subtitle">{{ $users->count() }} total</p>
                </div>
                <div class="media-right media-middle">
                    <a href="{{ route('users.create') }}" class="btn btn-rounded-deep btn-success-outline">
                        <i class="material-icons">add</i>
                        <span class="icon-text">Add</span>
                    </a>
                </div>
            </div>
        </div>

        <users-list :list="{{ $users }}"></users-list>
    </div>
@endsection
