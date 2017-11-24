@extends('layouts.app')

@section('breadcrumb')
    {!! Breadcrumbs::render('document-templates.view', $template) !!}
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="media">
                <div class="media-body">
                    <h4 class="card-title">{{ $template->title }}</h4>
                </div>
                <div class="media-right">
                    <span class="label {{ $template->archived ? 'label-default' : 'label-success' }}">
                        {{ $template->archived ? 'archived' : 'active' }}
                    </span>
                </div>
            </div>
        </div>
        <div class="card-block" v-pre>
            {!!  $template->content !!}
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Used keywords
        </div>
        <ul class="list-group list-group-fit m-b-0">
            @forelse($keywords as $keyword)
                <li class="list-group-item">
                    <div class="media">
                        <div class="media-body">
                            <span class="label label-default m-b-1">
                                {{ $keyword }}
                            </span>
                            <div>
                                Keyword description.
                            </div>
                        </div>
                    </div>
                </li>
            @empty
                <li class="list-group-item">
                    <div class="media">
                        <div class="media-body">
                            No keywords have been found for this template.
                        </div>
                    </div>
                </li>
            @endforelse
        </ul>
    </div>

    <div class="right">
        <a href="{{ route('documentTemplates.edit', $template->id) }}" class="btn btn-primary right">Edit</a>
    </div>
@endsection
