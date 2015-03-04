@extends('layouts.layout')

@section('content')

<div>
    @if(Auth::check())
        <p>{{Lang::get('strings.welcome_profile')}}, {{Auth::user()->name}}!</p>
    @else 
    	<p>{{Lang::get('strings.need_login')}}</p>
    @endif
</div>

@stop