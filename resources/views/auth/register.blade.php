@extends('layouts.master')
@section('title', 'Register')

@php
// dd($errors);
@endphp

@section('content')
    <div class="wrapper">
        <div class="rte">
            <h1>Register</h1>
        </div>

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-fieldset">
                <input class="form-field {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ old('email') }}" type="email" name="email" placeholder="Your e-mail">
            </div>
            <div class="form-fieldset">
                <input class="form-field {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}" type="text" name="name" placeholder="Your name">
            </div>
            <div class="form-fieldset">
                <input class="form-field {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" placeholder="Password">
            </div>
            <div class="form-fieldset">
                <input class="form-field " type="password" name="password_confirmation" placeholder="Repeat password">
            </div>
            <button class="button">Submit</button>
        </form>
    </div>
@endsection
