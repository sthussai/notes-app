<button onclick="openSettingsMenu()"
  class="w3-bar-item w3-button w3-white w3-right w3-hide-small w3-padding-large w3-hover-grey" title="Settings"><i
    class="fa fa-gear"></i></button>

<div class="w3-sidebar w3-padding w3-bar-block w3-text-black w3-card w3-animate-right"
  style="width:350px;display:none;right:0;" id="SettingsMenu">
  <a href="#" onclick="closeSettingsMenu()" class=" w3-right w3-medium w3-padding w3-hover-grey" title="close menu">
    <i class="fa fa-remove"></i>
  </a>
  <h3>Change Background Image</h3>
  <img onclick="changeBgImage1();closeSettingsMenu(); " src="https://www.w3schools.com/w3images/nature.jpg"
    style="max-width:100px;min-height:70px" class="w3-button w3-round"><br><br>
  <img onclick="changeBgImage2();closeSettingsMenu();" src="https://www.w3schools.com/w3images/forestbridge.jpg"
    style="max-width:100px;min-height:70px" class="w3-button w3-round"><br><br>
  <img onclick="changeBgImage3();closeSettingsMenu();" src="https://www.w3schools.com/w3images/mountains.jpg"
    style="max-width:100px;min-height:70px" class="w3-button w3-round"><br><br>
  <button id="highLightBtn" class="w3-bar-item w3-round w3-button">Highlight Divs</button>
  <a href="#" class="w3-bar-item w3-button">Link 2</a>
  <a href="#" class="w3-bar-item w3-button">Link 3</a>
  <a href="#" class="w3-bar-item w3-button">Link 4</a>
</div>


<script>
  function openSettingsMenu() {
    document.getElementById("SettingsMenu").style.display = "block";
    $("#SettingsMenu").animate({right: '0px'});
  }

  function closeSettingsMenu() {
    console.log('working');
    $("#SettingsMenu").animate({right: '-350px'}); 
  }

  function changeBgImage1() {
    $("div.bgimg-1").css("background-image", "url(https://www.w3schools.com/w3images/nature.jpg)");
  }

  function changeBgImage2() {
    $("div.bgimg-1").css("background-image", "url(https://www.w3schools.com/w3images/forestbridge.jpg)");
  }

  function changeBgImage3() {
    $("div.bgimg-1").css("background-image", "url(https://www.w3schools.com/w3images/mountains.jpg)");
  }

  $("#highLightBtn").on("click", function() {
                    $("div").toggleClass("highlightDiv");
                  }); 


</script>