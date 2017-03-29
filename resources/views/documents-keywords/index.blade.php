@extends('layouts.app')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Dashboard</a></li>
        <li><a href="{{ url('/') }}">Documents</a></li>
        <li class="active">Keywords</li>
    </ol>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="media">
                <div class="media-body">
                    <h4 class="card-title">Keywords</h4>
                    <p class="card-subtitle">{{ $keywords->count() }} total</p>
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
            @foreach($keywords as $keyword)
                <li class="list-group-item">
                    <div class="media">
                        <div class="media-body media-middle">
                            <div>
                                <a href="{{ route('documentsKeywords.edit', $keyword->id) }}">
                                    <span class="label label-default m-b-1">{{ $keyword->keyword }}</span>
                                </a>
                            </div>
                            <div class="text-muted">
                                {{ $keyword->description }}
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
