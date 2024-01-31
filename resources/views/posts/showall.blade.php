@extends("posts.layout")



@section('content1')




<div class="flex flex-col justify-center  text-center ">
  <h1 class="text-4xl text">All Posts regardless of type</h1>


  @foreach ($posts as $post)

  <!-- Start Event Listing 1 -->
  <div class=" hover:bg-slate-100">@auth
    @if (Auth::user()->can('update', $post))
    <!-- The current user can update the post... -->
    <a href="/posts/{{$post->id}}/edit" class="w3-button bg-green-300 float-right">Edit</a>
    @endif
    @endauth
    <a href="/posts/{{str_replace(' ', '_',$post->name)}}" class='w3-row-padding  w3-content w3-large ' style="">
      <div class='w3-mobile w3-col  s12 flex justify-center' style="">
        <img class='w3-image' src="{{$post->url}}" style="max-height:250px;">
      </div>
      <div class='w3-mobile w3-col s12 my-4'>
        <h3 class="text-3xl"><b>{{$post->name}}</b>
        </h3>
        <h2 class="text-m font-light ">Post ID: {{$post->id}}</h2>
                      <h2 class="text-m font-light ">Post Owner ID: {{$post->owner_id}}</h2>
                      <h2 class="text-m font-light ">Current User ID: {{auth()->user() ? auth()->user()->id :
                        "Not logged in" }}</h2>
        <p class="w3-text-grey">{{$post->description}}</p>

        <p class="my-4">Tags</p>
        @foreach($post->tags as $tag)
        <a href="/tags/{{$tag->slug}}"
          class="border-4 border-indigo-300 w3-round w3-padding bg-indigo-200">{{$tag->name}}</a>
        @endforeach

        <p class='w3-small w3-text-grey my-4'>Created or Updated {{$post->updated_at->diffForHumans()}}</p>
      </div>
    </a>
    <div class="bg-white py-4 sm:py-6">
      <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <ul role="list"
          class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-0 gap-y-0 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3">
          @foreach($post->getMedia('images') as $media)
          <li>
            <ul role="list" class="mt-3 flex gap-x-3">
              <div class="m-2 space-y-2">
                <div class="text-gray group flex flex-col gap-1 rounded-lg p-5" tabindex="1">
                  <div style="width:320px;"
                    class="group relative m-0 flex h-72 w-72 rounded-xl ring-gray-900/5 sm:mx-auto sm:max-w-lg">
                    <div
                      class="z-10 h-full w-full overflow-hidden rounded-xl border border-gray-200 opacity-80 transition duration-300 ease-in-out group-hover:opacity-100 dark:border-gray-700 dark:opacity-70">
                      <a href="{{$media->getUrl()}}">
                        <img src="{{$media->getUrl()}}"
                          class="animate-fade-in block h-full w-full scale-100 transform object-cover object-center opacity-100 transition duration-300 group-hover:scale-110"
                          alt="" />
                      </a>
                    </div>
                    <div style="background-color: Gray; width:70%;"
                      class="absolute bottom-0 z-20 m-0 rounded-xl p-3 pb-4 ps-4 opacity-60 transition duration-300 ease-in-out group-hover:-translate-y-1 group-hover:translate-x-3 group-hover:scale-110 group-hover:opacity-100">
                      <h2 class="text-m font-light text-gray-200">Post ID: {{$post->id}}</h2>
                      <h2 class="text-m font-light text-gray-200">Post Owner ID: {{$post->owner_id}}</h2>
                      <h2 class="text-m font-light text-gray-200">Current User ID: {{auth()->user() ? auth()->user()->id :
                        "Not logged in" }}</h2>
                      <h1 class="text-lg font-bold text-white">{{$post->name}}</h1>
                    </div>
                  </div>
                </div>
              </div>
            </ul>
          </li>

          @endforeach
        </ul>
      </div>
    </div>

  </div>
  <!-- END Event Listing 1 -->

  <hr>


  @endforeach

</div>

@endsection