@extends('layouts.auth')

@section('content')
    <article class="form">
        <header>
            <h1>Reset password</h1>
        </header>

        <form role="form" method="POST" action="{{ url('/password/email') }}">
            {{ csrf_field() }}

            {{-- Reset link token --}}
            <input type="hidden" name="token" value="{{ $token }}">

            <section class="form-group">
                <div class="fieldset">
                    <div class="form-field">
                        <input type="email" name="email" value="{{ old('email') }}" required class="input" placeholder="Email"/>
                    </div>
                    <div class="form-field">
                        <input type="password" name="password" required class="input" placeholder="Password"/>
                    </div>
                    <div class="form-field">
                        <input type="password" name="password_confirmation" required class="input" placeholder="Confirm password"/>
                    </div>
                </div>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </section>

            <section class="form-group">
                <button type="submit" class="btn">
                    Reset Password
                </button>
            </section>
        </form>
    </article>
@endsection
