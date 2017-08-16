@extends('layouts.app')

@section('breadcrumb')
    {!! Breadcrumbs::render('departments.edit') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-block">
                    @include('departments.partials.add-edit-form')
                </div>
            </div>
            </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Teams <small class="text-muted">({{ $department->teams->count() }})</small>
                </div>
                <div class="card-block">
                    <ul class="list-group list-group-fit">
                        @forelse($department->teams as $team)
                            <li class="list-group-item">
                                <div class="media m-b-0">
                                    <div class="media-body media-middle">
                                        <p class="m-b-1">
                                            <a href="{{ route('teams.edit', $team->id) }}">{{ $team->name }}</a>
                                        </p>
                                        <p class="m-b-0">
                                            <small>
                                                Manager: <a href="#">{{ $team->manager->fullname }}</a> &bull;
                                                Leader: <a href="#">{{ $team->leader->fullname }}</a>
                                            </small>
                                        </p>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <li class="list-group-item">
                                <div class="media">
                                    <div class="media-body media-middle">
                                        There are no teams in this department.
                                    </div>
                                </div>
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
