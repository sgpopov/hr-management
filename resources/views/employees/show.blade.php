@extends('layouts.app')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}">Dashboard</a></li>
        <li><a href="{{ route('employees.index') }}">Employees</a></li>
        <li class="active">{{ $employee->fullname }}</li>
    </ol>
@endsection

@section('content')
    <a href="#" class="btn btn-primary right">Edit</a>
    <div class="row">
        <div class="col-md-2">
            <div class="card">
                <div class="card-header center">
                    @if (!empty($employee->picture))
                        <img src="/storage/employees/pictures/thumbs/{{ $employee->picture }}" alt="Avatar" class="img-circle" width="80" />
                    @else
                        <img src="/storage/images/avatar.png" alt="Avatar" class="img-circle" width="80" />
                    @endif
                </div>

                <ul class="list-group list-group-fit mb-0">
                    <li class="list-group-item">
                        <div class="media">
                            <div class="media-body">
                                <div class="text-muted-light">Department</div>
                                <a href="{{ route('departments.edit', $employee->team->department->id) }}">
                                    {{ $employee->team->department->name }}
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="media">
                            <div class="media-body">
                                <div class="text-muted-light">Team</div>
                                <a href="{{ route('departments.edit', $employee->team->id) }}">
                                    {{ $employee->team->name }}
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="media">
                            <div class="media-body">
                                <div class="text-muted-light">Position</div>
                                <span class="tag tag-danger">WIP</span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-10">
            <div class="card">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" id="history-tab" data-toggle="tab" href="#profile">
                            <i class="material-icons">perm_identity</i>
                            <span class="icon-text">Profile</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="customers-tab" data-toggle="tab" href="#customers">
                            <i class="material-icons">person_add</i>
                            <span class="icon-text">Passport</span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="profile">
                        dada
                    </div>

                    <div class="tab-pane" id="customers">
                        <table class="table  m-b-0">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Company</th>
                                <th width="120" class="center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><a href="#"> Derek S.</a></td>
                                <td>Reel Ltd.</td>
                                <td class="text-xs-center">
                                    <a href="#" class="btn btn-white btn-sm">
                                        <i class="material-icons md-18">edit</i>
                                    </a>
                                    <a href="#" class="btn btn-white btn-sm">
                                        <i class="material-icons md-18">email</i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="#"> Paul M.</a></td>
                                <td>Places Ltd.</td>
                                <td class="text-xs-center">
                                    <a href="#" class="btn btn-white btn-sm">
                                        <i class="material-icons md-18">edit</i>
                                    </a>
                                    <a href="#" class="btn btn-white btn-sm">
                                        <i class="material-icons md-18">email</i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="#"> John D.</a></td>
                                <td>Woot Ltd.</td>
                                <td class="text-xs-center">
                                    <a href="#" class="btn btn-white btn-sm">
                                        <i class="material-icons md-18">edit</i>
                                    </a>
                                    <a href="#" class="btn btn-white btn-sm">
                                        <i class="material-icons md-18">email</i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="#">Amy T.</a></td>
                                <td>Scoop Ltd.</td>
                                <td class="text-xs-center">
                                    <a href="#" class="btn btn-white btn-sm">
                                        <i class="material-icons md-18">edit</i>
                                    </a>
                                    <a href="#" class="btn btn-white btn-sm">
                                        <i class="material-icons md-18">email</i>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" id="history-tab" data-toggle="tab" href="#annual-leave">
                    <i class="material-icons">beach_access</i>
                    <span class="icon-text">Annual leaves</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="customers-tab" data-toggle="tab" href="#documents">
                    <i class="material-icons">description</i>
                    <span class="icon-text">Documents</span>
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade in active" id="annual-leave">
                <table class="table m-b-0">
                    <thead>
                        <tr>
                            <th>Dates</th>
                            <th>Paid</th>
                            <th>Approved by</th>
                            <th>Reason</th>
                            <th width="120" class="center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1 May 2017 - 6 May 2017 (5 days)</td>
                            <td>Reel Ltd.</td>
                            <td>Reel Ltd.</td>
                            <td>Reel Ltd.</td>
                            <td class="text-xs-center">
                                <a href="#" class="btn btn-white btn-sm">
                                    <i class="material-icons md-18">edit</i>
                                </a>
                                <a href="#" class="btn btn-white btn-sm">
                                    <i class="material-icons md-18">print</i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="center m-b-1">
                    <a href="#" class="btn btn-primary-outline btn-rounded-deep center">View more</a>
                </div>
            </div>

            <div class="tab-pane" id="documents">
                <table class="table  m-b-0">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Company</th>
                        <th width="120" class="center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><a href="#"> Derek S.</a></td>
                        <td>Reel Ltd.</td>
                        <td class="text-xs-center">
                            <a href="#" class="btn btn-white btn-sm">
                                <i class="material-icons md-18">edit</i>
                            </a>
                            <a href="#" class="btn btn-white btn-sm">
                                <i class="material-icons md-18">email</i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td><a href="#"> Paul M.</a></td>
                        <td>Places Ltd.</td>
                        <td class="text-xs-center">
                            <a href="#" class="btn btn-white btn-sm">
                                <i class="material-icons md-18">edit</i>
                            </a>
                            <a href="#" class="btn btn-white btn-sm">
                                <i class="material-icons md-18">email</i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td><a href="#"> John D.</a></td>
                        <td>Woot Ltd.</td>
                        <td class="text-xs-center">
                            <a href="#" class="btn btn-white btn-sm">
                                <i class="material-icons md-18">edit</i>
                            </a>
                            <a href="#" class="btn btn-white btn-sm">
                                <i class="material-icons md-18">email</i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td><a href="#">Amy T.</a></td>
                        <td>Scoop Ltd.</td>
                        <td class="text-xs-center">
                            <a href="#" class="btn btn-white btn-sm">
                                <i class="material-icons md-18">edit</i>
                            </a>
                            <a href="#" class="btn btn-white btn-sm">
                                <i class="material-icons md-18">email</i>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
