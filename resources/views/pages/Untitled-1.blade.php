@extends('layouts.app')
@section('content')
<style>
    #profileImage {
  width: 150px;
  height: 150px;
  border-radius: 50%;
  background: #512DA8;
  font-size: 35px;
  color: #fff;
  text-align: center;
  line-height: 150px;
  margin: 20px 0;
  
}
section{
  display: none;
}
#showProfile{
 
  display: block;
}
</style>

  <div>
    <a href="#" type="button" id="showProfile">Show Profile</a>
  </div>

<section id="profile" class="container">
<div class="card ">
    <div class="card-header">
        <figure id="profileImage">

        </figure>
        <aside>
            <span id="firstName">Kalpesh</span>
            <span id="lastName">Singh</span>
            
        </aside>
    </div>
    <hr>
    <div class="card-body"> 

    </div>
</div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
  $("#showProfile").click(function() {
    $("#profile").toggle();
  });
});

$(document).ready(function(){
  var firstName = $('#firstName').text();
  var lastName = $('#lastName').text();
  var intials = $('#firstName').text().charAt(0) + $('#lastName').text().charAt(0);
  var profileImage = $('#profileImage').text(intials);
});
</script>
@endsection