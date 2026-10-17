@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div style="max-width:400px; margin:80px auto; text-align:center;">
        <h1>Login</h1>
        <p>GitHub account se login karein.</p>
        <a href="{{ route('github.login') }}">Continue with GitHub</a>
    </div>
@endsection