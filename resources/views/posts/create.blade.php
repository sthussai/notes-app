@extends("posts.layout")



@section('content1')


<div class="w3-center    w3-panel w3-card">
  <div class="links w3-center w3-large w3-bar w3-padding-large">
    <a class="w3-btn" href="/posts">Home</a>
    <a class="w3-btn " href="/posts/create">Create New Post</a>

  </div>


  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
    rel="stylesheet">

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

  <form action="/posts" method='POST' class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin">
    {{ csrf_field() }}

    <h2 class="w3-center"> Create New Post</h2>

    <div class="w3-row w3-section" style='width:320px; '>

      Select Type:
      <label>Post</label>
      <input type="radio" name="type" value="post" checked>
      <label>Other/Misc</label>
      <input type="radio" name="type" value="other">

    </div>

    <div class="w3-row w3-section">
      <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
      <div class="w3-rest">
        <input class="w3-input w3-border" required name="name" type="text" placeholder="Post Name">
      </div>
    </div>

    <div class="w3-row w3-section">
      <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-info"></i></div>
      <div class="w3-rest">
        <textarea class="w3-input w3-border" name="description" type="textbox" placeholder="Post Description">
</textarea>
      </div>
    </div>

    <div class="w3-row w3-section">
      <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-image"></i></div>
      <div class="w3-rest">
        <input class="w3-input w3-border" name="url" type="text" placeholder="Post URl">
      </div>
    </div>


    <label>Seperate tags by comma:
      <input list="tags" name="tags" /></label>
      <br>
      <label> Current Tags in database: 
    @foreach ($tags as $tag)
    <span>{{$tag}}, </span>
      @endforeach
      </label>
      

      
</div>


</div>



<p class="w3-center">
  <button class="w3-button w3-section w3-blue w3-ripple"> Create Post </button>
</p>
</form>

</div>

@endsection

