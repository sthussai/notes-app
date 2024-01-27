<style>
  /* The overlay effect with black background */
  .overlay {
    height: 100%;
    width: 100%;
    display: none;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    overflow: auto;
    background-color: rgb(0, 0, 0);
    background-color: rgba(0, 0, 0, 0.7);
    /* Black with a little bit see-through */
  }

  /* The content */
  .overlay-content {
    position: relative;
    top: 140px;
    max-width: 50%;
    text-align: center;
    margin-top: 20px;
    margin: auto;
    overflow: auto;
    border: solid 2px white;
  }

  /* Close button */
  .overlay .closebtn {
    position: absolute;
    top: 20px;
    right: 45px;
    font-size: 60px;
    cursor: pointer;
    color: white;
  }

  .overlay .closebtn:hover {
    color: #ccc;
  }

  /* Style the search field */
  .overlay input[type=text] {
    padding: 15px;
    font-size: 17px;
    border: solid;
    background: white;
    width: 100%;
  }

  .overlay input[type=text]:hover {
    background: #f1f1f1;
  }

  .overlay input[type=text]:focus {
    border-width: 5px;
    border-color: lightskyblue;

  }

  @media only screen and (max-width: 800px) {
    .overlay-content {
      max-width: 90%;
    }
  }
</style>
<button onclick="openSearch()"
  class="w3-bar-item w3-button w3-right w3-white w3-hide-small w3-padding-large w3-hover-grey" title="Search"><i
    class="fa fa-search"></i></button>
<div id="myOverlay" title="Close Overlay" class="overlay w3-animate-right">
  <span class="closebtn" onclick="" title="Close Overlay">x</span>
  <div class="overlay-content">
    <input id="search" autocomplete="off" type="text" placeholder="Search users" name="search"
      class="w3-mobile" autofocus>
    <div id="results" style="overflow:auto" class="w3-content w3-white"></div>
  </div>

</div>

<!--START Script for AJAX Search Function -->
<script>
  // Open the full screen search box
  function openSearch() {

    $('#myOverlay').toggle("fast", function () {
      $('#search').focus();
    });
    $(window).scroll(function () {
      return false;
    });
  }

  function closeSearch() {
    $('#myOverlay').toggle("fast", function () {
      $('#search').val("");
      ajaxSearch();
    });
  }

  //function to close search After pressing 'ESc'

  $("#myOverlay").keydown(function (event) {
    if (event.which == 27) { //27 == Key Code for ESc
      closeSearch();
    }
  });

  //function to open search After pressing Keys 'Tab' and 'S'
  var map = {
    9: false, //Key code fo Tab
    83: false //Key code fo s
  };
  $(document).keydown(function (e) {
    if (e.keyCode in map) {
      map[e.keyCode] = true;
      if (map[9] && map[83]) {
        openSearch();
      }
    }
  }).keyup(function (e) {
    if (e.keyCode in map) {
      map[e.keyCode] = false;
    }
  });

  $('div.overlay:not(.overlay-content)').click(function () {
    closeSearch();
  });
  // stop child click bubbling up to parent
  $('div.overlay-content').click(function (e) {
    e.stopPropagation();
  });



  // Close the full screen search box


  function ajaxSearch() {
    $value = $("#search").val();
    $.ajax({
      type: 'get',
      url: '/search',
      data: {
        'search': $value
      }, error: function (xhr, error) {

        console.debug(xhr); console.debug(error);
      },
      success: function (data) {
        $('#results').html(data);
      }
    });
  }

  $('#search').on('keyup', function () {
    ajaxSearch();
  });
</script>

<script type="text/javascript">
  $.ajaxSetup({
    headers: {
      'csrftoken': '{{ csrf_token() }}'
    }
  });
</script>
<!--END Script for AJAX Search Function -->