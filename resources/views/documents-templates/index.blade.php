@extends('layouts.app')

@section('breadcrumb')
    {!! Breadcrumbs::render('document-templates.index') !!}
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="media">
                <div class="media-body">
                    <h4 class="card-title">Templates</h4>
                    <p class="card-subtitle">{{ $templates->count() }} total</p>
                </div>
                <div class="media-right media-middle">
                    <a href="{{ route('documentTemplates.create') }}" class="btn btn-rounded-deep btn-success-outline">
                        <i class="material-icons">add</i>
                        <span class="icon-text">Create new</span>
                    </a>
                </div>
            </div>
        </div>

        <ul class="list-group list-group-fit m-b-0">
            @foreach($templates as $template)
                <li class="list-group-item">
                    <div class="media">
                        <div class="media-body media-middle">
                            <div>
                                <a href="{{ route('documentTemplates.edit', $template->id) }}">{{ $template->title }}</a>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
