@extends("posts.layout")



@section('content1')




<div class="flex flex-col justify-center  text-center ">
  <h1 class="text-4xl text">Med Posts</h1>


  @foreach ($posts as $post)

  <!-- Start Event Listing 1 -->
  <div class=" hover:bg-slate-100">
    <a href="/posts/{{$post->id}}/edit" class="w3-button bg-green-300 float-right">Edit</a>
    <a href="/posts/{{str_replace(' ', '_',$post->name)}}" class='w3-row-padding  w3-content w3-large ' style="">
      <div class='w3-mobile w3-col  s12 flex justify-center' style="">
        <img class='w3-image' src="{{$post->url}}" style="max-height:250px;">
      </div>
      <div class='w3-mobile w3-col s12 my-4'>
        <h3 class="text-3xl"><b>{{$post->name}}</b>
        </h3>
        <p class="w3-text-grey">{{$post->description}}</p>

        <p class="my-4">Tags</p>
        @foreach($post->tags as $tag)
        <a href="/tags/{{$tag->slug}}"
          class="border-4 border-indigo-300 w3-round w3-padding bg-indigo-200">{{$tag->name}}</a>
        @endforeach

        <p class='w3-small w3-text-grey my-4'>Created or Updated {{$post->updated_at->diffForHumans()}}</p>
      </div>
    </a>


  </div>
  <!-- END Event Listing 1 -->

  <hr>


  @endforeach

</div>

@endsection