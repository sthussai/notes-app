@extends("posts.layout")



@section('content1')

<div class="w3-center    w3-panel w3-card">
  


  <div class='w3-content'>

    <h1 class='text-3x1'>{{ $post->name }}
    </h1>
            <h2 class="text-m font-light ">Post ID: {{$post->id}}</h2>
        <h2 class="text-m font-light ">Post Owner ID: {{$post->owner_id}}</h2>
        <h2 class="text-m font-light ">Current User ID: {{auth()->user() ? auth()->user()->id :
          "Not logged in" }}</h2>

    <div class="w3-row w3-section">
      <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
      <div class="w3-rest"> Cost: $
        {{ $post->cost }}
      </div>
    </div>

    <div class="w3-row w3-section">
      <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
      <div class="w3-rest">Description:
        {{ $post->description }}
      </div>
    </div>

    <div class="w3-row w3-section">
      <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-envelope-o"></i></div>
      <div class="w3-rest">
        {{ $post->start_date }}
      </div>
    </div>
    <figure>
      <img class="w3-image" src="{{$post->url}}">
    </figure>

    <div class='w3-container'>Tags
    <ul
          class="flex mt-4 flex-wrap justify-center p[items-center justify-start gap-2 gap-y-3 [&>li]:border-2 [&>li]:border-[#2f2a47] [&>li]:px-3 [&>li]:py-1 [&>li]:rounded-[4px] [&>li]:transition-all [&>li]:duration-150 [&>li]:ease-in [&>li:hover]:scale-105 [&>li:hover]:cursor-pointer">
          @foreach($post->tags as $tag)
          <li>{{$tag->name}}</li>
          @endforeach
        </ul>
      <hr>

    </div>

    <a href="/posts/{{str_replace(' ', '_', $previousPost)}}" class="w3-button    w3-blue-grey">Previous</a>
    @auth
    @if (Auth::user()->can('update', $post))
    <!-- The current user can update the post... -->
    <a href="/posts/{{$post->id}}/edit" class="w3-button w3-green ">Edit</a>
    @endif
    @endauth
    <a href="/posts/{{str_replace(' ', '_', $nextPost)}}" class="w3-button w3-blue-grey">Next</a>
    <div class='w3-margin-top'><a href="/posts" class="w3-button w3-light-grey">Home</a></div>
  </div>

</div>
@endsection