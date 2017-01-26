@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col-sm-10 col-sm-push-1 col-md-6 col-md-push-3 col-lg-3 col-lg-push-4">
            <h2 class="text-primary center m-a-2">
                <i class="material-icons">person</i>
                <span class="icon-text">Sign In</span>
            </h2>

            <div class="card-group">
                <div class="card">
                    <div class="card-block center">
                        <p class="text-muted"></p>

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" placeholder="Email" required autofocus>
                            </div>

                            <div class="form-group">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                            </div>

                            <button type="submit" class="btn btn-primary btn-rounded">Sign in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
