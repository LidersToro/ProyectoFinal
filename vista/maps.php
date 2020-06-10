<!doctyp html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Get Latitude and Longitude</title>
    <script src="http://maps.google.com/maps/api/js?libraries=places&region=uk&language=en&sensor=true"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
</head>
<body>


<input id="searchTextField" type="hidden" size="50" style="text-align: left;width:357px;direction: ltr;">
<br>
            latitude:<input name="latitude" class="MapLat" value="" type="text" placeholder="Latitude" style="width: 161px;" disabled>
            longitude:<input name="longitude" class="MapLon" value="" type="text" placeholder="Longitude" style="width: 161px;" disabled>

    <div id="map_canvas" style="height: 350px;width: 500px;margin: 0.6em;"></div>




<script>
      $(function () {
          var markers = [];
          var geocoder = new google.maps.Geocoder();
        var lat = -17.749,
            lng = -63.176,
            latlng = new google.maps.LatLng(lat, lng),
            image = 'http://www.google.com/intl/en_us/mapfiles/ms/micons/blue-dot.png';
        var mapOptions = {
            center: new google.maps.LatLng(lat, lng),
            zoom: 13,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            panControl: true,
            panControlOptions: {
                position: google.maps.ControlPosition.TOP_RIGHT
            },
            zoomControl: true,
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.LARGE,
                position: google.maps.ControlPosition.TOP_left
            }
        },
            map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions),

            marker = new google.maps.Marker({
                position: latlng,
                map: map,
                icon: image,
                draggable: true,
            });
        
         var input = document.getElementById('searchTextField');
         var autocomplete = new google.maps.places.Autocomplete(input, {
             types: ["geocode"]
         });

         autocomplete.bindTo('bounds', map);
          var infowindow = new google.maps.InfoWindow();

              google.maps.event.addListener(marker, 'dragend', function () {
                  var lat = marker.getPosition().lat();
                  var lng = marker.getPosition().lng();
                  $('.MapLat').val(lat);
                  $('.MapLon').val(lng);
         });

          
        
         function moveMarker(placeName, latlng) {
             marker.setIcon(image);
             marker.setPosition(latlng);
             infowindow.setContent(placeName);
          }
     }); 

    
</script>
</body>
</html>
