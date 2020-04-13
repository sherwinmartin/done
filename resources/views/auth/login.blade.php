@extends('layouts.auth')

@section('content')
        <form class="form-signin">
            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
            {{ Form::label('inputEmail', 'Email Address', ['class' => 'sr-only']) }}
            {{ Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'Email address', 'required', 'autofocus', 'id' => 'inputEmail']) }}

            {{ Form::label('inputPassword', 'Password', ['class' => 'sr-only']) }}
            {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required', 'id' => 'inputPassword']) }}
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            {{ Form::submit('Sign in', ['class' => 'btn btn-lg btn-primary btn-block']) }}

            <a href="" class="btn btn-lg btn-block btn-outline-secondary mt-1">Password help</a>
            <p class="mt-5 mb-3 text-muted">{{ env('APP_NAME') }}</p>
        </form>
@endsection
