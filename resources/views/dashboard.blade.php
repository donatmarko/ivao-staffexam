@extends('layouts.app')

@section('content')
    <div class="card">
        <header class="card-header">
            <h2 class="card-header-title">Dashboard</h2>
        </header>
        <div class="card-content">
            <p>You are logged in, <strong>{{Auth::user()->name}}</strong>!</p>
            <p>You are {{Auth::user()->staff}} with VID of {{Auth::user()->username}} and email of  {{Auth::user()->email}}</p>
        </div>
    </div>
@endsection
