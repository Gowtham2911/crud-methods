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
 <form id="demo">
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
      <button type="submit"  class="btn btn-primary">Get distance</button>
      </div>
      </div>
 </form>
  </div>
<p id="distance"></p>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGX6aGjOeMptlBNc0WF3vh/m0SPMl1vNBE&callback=myMap"></script>
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
        $("#demo").submit(function(event) {
            event.preventDefault();
            var lat3 = $('#lat').val()
            var lng3 = $('#lng').val()
            var lat4 = $('#lat1').val()
            var lng4 = $('#lng1').val()
            console.log(lat3)
            console.log(lng3)
            console.log(lat4)
            console.log(lng4)

            calcCrow(lat3, lng3, lat4, lng4)

        });

        function calcCrow(lat3, lng3, lat4, lng4) {
            var R = 6371; // km
            var dLat = toRad(lat4 - lat3);
            var dLon = toRad(lng4 - lng3);
            var lat3 = toRad(lat3);
            var lat4 = toRad(lat4);

            var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                Math.sin(dLon / 2) * Math.sin(dLon / 2) * Math.cos(lat3) * Math.cos(lat4);
            var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
            var d = R * c;
            alert(d);
            $('#distance').html(d);
        }

        function toRad(Value) {
            return Value * Math.PI / 180;
        }
  
  
  </script>
</body>
</html>