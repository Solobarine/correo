@extends('layouts.app')

@section('content')
    <div>
        <div>
            <h1>Dashboard</h1>
            <p>{{ auth()->user()->name }}</p>
            <form action="{{ route('logout') }}" method="get">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    </div>
@endsection