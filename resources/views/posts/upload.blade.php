@extends('posts.layout')
@section('header')
<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    {{ __('Media Upload') }}
</h2>
@endsection
<!-- page -->

@section('content' )

<!-- main content page -->
<div class="w-full p-12 m-8 bg-white text-gray-900  overflow-hidden shadow-sm sm:rounded-lg">
    <p class='text-3x1'>
    All Posts Media 
    </p>
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif



    <form action="{{ route('media.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" id="id" name="id" placeholder="Enter Post ID for Image" />
        <input type="file" id="image" name="image" />
        <br>
        <x-primary-button type="submit">Upload</x-primary-button>
    </form>



    @foreach($posts as $post)
    
    
    
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
                      <h2 class="text-m font-light text-gray-200">Current User: {{auth()->user() ? auth()->user()->id :
                        "Not logged in" }}</h2>
                      <h1 class="text-lg font-bold text-white">{{$post->name}}</h1>
                    </div>
                  </div>
                  <form action="{{ route('media.destroy', $media->id) }}" method="POST" enctype="multipart/form-data">
        <input type="text" name="id" value="{{ $media->id }}" hidden>
        @csrf
        @method('DELETE')
        <x-primary-button type="submit" class="w3-red ">Delete</x-primary-button>

    </form> 
                </div>
              </div>
            </ul>
          </li>

          @endforeach
        </ul>
      </div>
    </div>
    
   

    
    <hr>

    
    
    @endforeach




</div>


@endsection