@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div style="max-width:600px; margin:80px auto;">
        <h1>Welcome, {{ auth()->user()->name }}</h1>
        <p>Email: {{ auth()->user()->email }}</p>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
@endsection