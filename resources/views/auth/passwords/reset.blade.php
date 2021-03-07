
@extends('layouts.master')
@section('title', 'Reset password')

@section('content')
    <div class="wrapper">
        <div class="rte">
            <h1>Reset password</h1>
        </div>

        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-fieldset">
                <input class="form-field {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email"
                       placeholder="Your e-mail" value="{{ old('email') }}">
            </div>
            <div class="form-fieldset">
                <input class="form-field {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password"
                       name="password" placeholder="New password">
            </div>
            <div class="form-fieldset">
                <input class="form-field {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password"
                       name="password_confirmation" placeholder="Repeat new password">
            </div>
            <button class="button">Change password</button>
        </form>
    </div>
@endsection

