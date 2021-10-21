<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<div class="container" style="padding-top: 5%;">
    <div class="card-body col-md-12">

<div class="row">
 <form id="demo" method="post">
   @csrf
      <div class="col-md-12">

 <div class="form-group">
  <label for="formGroup">From</label>
  <input type="text" class="form-control" name="fromplace" id="place" placeholder="From">
  </div>
  <div class="form-group">
    <label for="formGroup">To</label>
    <input type="text" class="form-control" name="toplace" id="place1" placeholder="To">
  </div><br>
  <input type="hidden" name="lat" id="lat">
  <input type="hidden" name="lat1" id="lat1">
  <input type="hidden" name="lng" id="lng">
  <input type="hidden" name="lng1" id="lng1">

      <div class="left">
      <button type="button" id="test" class="btn btn-primary">Get distance</button>
      </div>
      </div>
 </form>
  </div>
<input id="distance">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGX6aGjOeMptlBNc0WF3vhm0SPMl1vNBE&libraries=places&callback=initMap">
</script>
<script>
  function initMap() {
            const input = document.getElementById("place");
            const input1 = document.getElementById("place1");

            const autocomplete = new google.maps.places.Autocomplete(input);
            const autocomplete1 = new google.maps.places.Autocomplete(input1);

            autocomplete.addListener("place_changed", () => {
                const place = autocomplete.getPlace();
                console.dir(place);
                const lat = place.geometry.location.lat();
                console.log(lat)
                const lng = place.geometry.location.lng();
                console.log(lng)
                document.getElementById('lat').value = lat;
                document.getElementById('lng').value = lng;
            });
            autocomplete1.addListener("place_changed", () => {
                const place1 = autocomplete1.getPlace();
                console.dir(place1);
                const lat1 = place1.geometry.location.lat();
                console.log(lat1)
                const lng1 = place1.geometry.location.lng();
                console.log(lng1)
                document.getElementById('lat1').value = lat1;
                document.getElementById('lng1').value = lng1;
            });
        }
</script>
</body>
<script>

$('#test').on('click',function(e){
  //e.preventDefault();
   
  var datas = $('form').serialize();
$.ajax({
  url:"/calculate",
  type : 'post',
  data : datas,
  success : function(data){
    $('#distance').val(data.message);
  }

});
  });
    


</script>
</html>