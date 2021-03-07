@extends('layouts.master')
@section('title', 'Reset password')

@section('content')
    <div class="wrapper">
        <div class="rte">
            <h1>Reset password</h1>
        </div>

        <form action="{{ route('password.email') }}" method="POST">
            @csrf
            <div class="form-fieldset">
                <input class="form-field {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email"
                       placeholder="Your e-mail" value="{{ old('email') }}">
            </div>
            <button class="button">Submit</button>
        </form>
    </div>
@endsection
