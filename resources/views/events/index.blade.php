@extends("events.layout")



@section('content1')




<div class="flex flex-col justify-center  text-center ">
  <h1 class="text-4xl text">All Posts</h1>


  @foreach ($events as $event)

  <!-- Start Event Listing 1 -->
  <div class=" hover:bg-slate-100">
    <a href="/events/{{$event->id}}/edit" class="w3-button bg-green-300 float-right">Edit</a>
    <a href="/events/{{str_replace(' ', '_',$event->name)}}" class='w3-row-padding  w3-content w3-large ' style="">
      <div class='w3-mobile w3-col  s12 flex justify-center' style="">
        <img class='w3-image' src="{{$event->url}}" style="max-height:250px;">
      </div>
      <div class='w3-mobile w3-col s12 my-4'>
        <h3 class="text-3xl"><b>{{$event->name}}</b>
        </h3>
        <p class="w3-text-grey">{{$event->description}}</p>

        <p class="my-4">Tags</p>
        @foreach($event->tags as $tag)
        <a href="/tags/{{$tag->slug}}"
          class="border-4 border-indigo-300 w3-round w3-padding bg-indigo-200">{{$tag->name}}</a>
        @endforeach

        <p class='w3-small w3-text-grey my-4'>Created or Updated {{$event->updated_at->diffForHumans()}}</p>
      </div>
    </a>


  </div>
  <!-- END Event Listing 1 -->

  <hr>


  @endforeach

</div>

@endsection