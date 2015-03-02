@extends('layouts.layout')

@section('content')

<div class="yya">
    <div>
        @if(Auth::check())
            <p>Welcome to your profile page {{Auth::user()->name}} - {{Auth::user()->phone}}</p>
        @endif
    </div>
</div>

@stop