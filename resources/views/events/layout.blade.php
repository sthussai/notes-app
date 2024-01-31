@extends('layouts.app')


@section('title','Event Index')

@section('content')


<div class="w3-center w3-panel ">
    <div class="links w3-center w3-large w3-bar w3-padding-large">
        <a class="w3-button w3-round w3-light-blue" href="/events">Home</a>
        <a class="w3-button w3-round w3-light-blue " href="/events/create">Create New Event</a>
    </div>
</div>
@yield('content1')
</div>
<!-- END Hero Image DIv -->


@endsection
