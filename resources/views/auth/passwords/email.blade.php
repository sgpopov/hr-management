@extends('layouts.auth')

@section('content')
    <article class="form">
        <header>
            <h1>Reset password</h1>
            <div class="heading-content">
                Enter your email address below and we will send you a link where you can enter a new password.
            </div>
        </header>

        <form role="form" method="POST" action="{{ url('/password/email') }}">
            {{ csrf_field() }}

            <section class="form-group">
                <div class="fieldset">

                    <div class="form-field">
                        <input type="email" name="email" value="{{ old('email') }}" required class="input" placeholder="Email"/>
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
                    Submit
                </button>
            </section>
        </form>
    </article>
@endsection
