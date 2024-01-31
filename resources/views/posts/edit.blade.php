@extends("posts.layout")



@section('content1')

<div class="w3-center    w3-panel w3-card">

@if (Auth::user() && Auth::user()->can('update', $post)) 

@if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif 

  <div>
    <form action="/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data"
      class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin">

      {{ method_field('PATCH') }}
      {{ csrf_field() }}

      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

      <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
        rel="stylesheet">

      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js">
      </script>

      <h2 class="w3-center">Edit Post</h2>

      <div class="w3-row w3-section" style='width:320px; '>

        Select Type:
        <label>Post</label>
        <input type="radio" name="type" value="post" checked>
        <label>Other</label>
        <input type="radio" name="type" value="other">

      </div>


      <div class="w3-row w3-section">
        <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
        <div class="w3-rest">
          <input class="w3-input w3-border" required name="name" type="text" placeholder="Edit Name"
            value="{{ $post->name }}">
        </div>
      </div>

      <div class="w3-row w3-section">
        <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-info"></i></div>
        <div class="w3-rest">
          <textarea class="w3-input w3-border" name="description" type="text" placeholder="Post Description"
            > {{ $post->description }}</textarea>

        </div>
      </div>

      <div class="w3-row w3-section">
        <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-image"></i></div>
        <div class="w3-rest">
          <input class="w3-input w3-border" name="url" type="text" placeholder="Edit URl" value="{{ $post->url }}">
        </div>
      </div>

      <div class="w3-row w3-section">
        <input type="file" id="image" name="image" />
        <br>
      </div>
    

      <div class="w3-row w3-section">
        <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-info"></i></div>
        <div class="w3-rest">
          Seperate tags by comma
          <input class="w3-input w3-border" name="tags" type="text" placeholder="Edit Tags"
            value="@foreach($post->tags as $tag)
        {{ $tag->name . ',' }}
        @endforeach">
        <label> Current Tags in database: 
    @foreach ($tags as $tag)
    <span>{{$tag}}, </span>
      @endforeach
      </label> 
        </div>
      </div>
  </div>



  <p class="w3-center">
    <button class="w3-button w3-section w3-green w3-ripple"> Update </button>
    <a href='/posts' class="w3-button w3-section w3-blue w3-ripple"> Back </a>
  </p>
  </form>

  <form action="/posts/{{ $post->id }}" method="POST">
    @method('DELETE')
    @csrf
    <button class="w3-button w3-section w3-red w3-ripple"> Delete {{$post->name}}?</button>
  </form>


</div>
@else
<div class="w3-row w3-section">
        <p>Unable to edit this as it's not your resource</p>
      </div>

@endif

</div>
@endsection