@extends('layouts.app')

@section('breadcrumb')
    {!! Breadcrumbs::render('users-roles.edit') !!}
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
