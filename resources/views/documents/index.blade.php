@extends('layouts.app')

@section('breadcrumb')
    {!! Breadcrumbs::render('documents.index') !!}
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="media">
                <div class="media-body">
                    <h4 class="card-title">Documents</h4>
                    <p class="card-subtitle">{{ $documents->count() }} total</p>
                </div>
                <div class="media-right media-middle">
                    <a href="{{ route('documents.create') }}" class="btn btn-outline-success">
                        <i class="material-icons">add</i>
                        <span class="icon-text">Create new</span>
                    </a>
                </div>
            </div>
        </div>

        <ul class="list-group list-group-fit m-b-0">
            @forelse($documents as $document)
                <li class="list-group-item">
                    <div class="media">
                        <div class="media-body media-middle">
                            <div>
                                <a href="{{ route('documentTemplates.edit', $document->id) }}">{{ $document->title }}</a>
                            </div>
                        </div>
                    </div>
                </li>
            @empty
                <li class="list-group-item">
                    <div class="media">
                        <div class="media-body media-middle">
                            No documents
                        </div>
                    </div>
                </li>
            @endforelse
        </ul>
    </div>
@endsection
