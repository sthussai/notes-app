@extends('layouts.app')


@section('title','Post Index')

@section('content')


<div class="w3-center w3-panel ">
    <div class="links w3-center w3-large w3-bar w3-padding-large">
        <a class="w3-button w3-round w3-light-blue" href="/posts">Home up</a>
        <a class="w3-button w3-round w3-light-blue " href="/posts/create">Create New Post</a>
        <a class="w3-button w3-round w3-light-blue " href="/showall">Show All Posts</a>
    </div>
</div>
@yield('content1')
</div>
<!-- END Hero Image DIv -->



@endsection