@extends("events.layout")



@section('content1')


<div class="w3-center    w3-panel w3-card">


  <div class='w3-content'>

    <h1 class='w3-large'>{{ $event->name }}
    </h1>

    <div class="w3-row w3-section">
      <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
      <div class="w3-rest"> Cost: $
        {{ $event->cost }}
      </div>
    </div>

    <div class="w3-row w3-section">
      <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
      <div class="w3-rest">Description:
        {{ $event->description }}
      </div>
    </div>

    <div class="w3-row w3-section">
      <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-envelope-o"></i></div>
      <div class="w3-rest">
        {{ $event->start_date }}
      </div>
    </div>
    <figure>
      <img class="w3-image" src="{{$event->url}}">
    </figure>

    <div class='w3-container'>Tags
    <ul
          class="flex mt-4 flex-wrap justify-center p[items-center justify-start gap-2 gap-y-3 [&>li]:border-2 [&>li]:border-[#2f2a47] [&>li]:px-3 [&>li]:py-1 [&>li]:rounded-[4px] [&>li]:transition-all [&>li]:duration-150 [&>li]:ease-in [&>li:hover]:scale-105 [&>li:hover]:cursor-pointer">
          @foreach($event->tags as $tag)
          <li>{{$tag->name}}</li>
          @endforeach
        </ul>
      <hr>

    </div>

    <a href="/events/{{str_replace(' ', '_', $previousEvent)}}" class="w3-button    w3-blue-grey">Previous</a>
    <a href="/events/{{$event->id}}/edit" class="w3-button w3-green ">Edit</a>
    <a href="/events/{{str_replace(' ', '_', $nextEvent)}}" class="w3-button w3-blue-grey">Next</a>
    <div class='w3-margin-top'><a href="/events" class="w3-button w3-light-grey">Home</a></div>
  </div>

</div>
@endsection