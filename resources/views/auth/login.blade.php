@extends('layouts.auth')

@section('content')
    <article class="form">
        <header>
            <h1>Sign in</h1>
        </header>

        <form role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}

            <section class="form-group">
                <div class="fieldset">
                    <div class="form-field">
                        <input type="email" name="email" required class="input" placeholder="Email"/>
                    </div>

                    <div class="form-field">
                        <input type="password" name="password" required class="input" placeholder="Password"/>
                    </div>
                </div>

                <div class="flex align-vertical space-between">
                    <div>
                        <label for="remember">
                            <input type="checkbox" id="remember" name="remember"/>
                            <span class="label">Remember me</span>
                        </label>
                    </div>

                    <div>
                        <a href="{{ route('password.request') }}" class="form-link">Forgot password?</a>
                    </div>
                </div>
            </section>

            <section class="form-group">
                <button type="submit" class="btn">Sign in</button>
            </section>
        </form>
    </article>
@endsection
