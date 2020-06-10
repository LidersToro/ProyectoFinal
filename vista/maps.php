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
    <input type="button" id="routebtn" value="route" />

    <div id="map_canvas" style="height: 350px;width: 500px;margin: 0.6em;"></div>




<script>



    ////////////////////////////////////
    /*var map = new google.maps.Map(document.getElementById(map_canvas), {
        center: {
            lat: 27.72,
            lng: 85.36
        },
        zoom: 15
    });
    var marker = new google.maps.Marker({
        position: {
            lat: 27.72,
            lng: 85.36
        },
        map: map,
        draggable: true
    });
    google.maps.event.addListener(marker, 'dragend', function () {
        var lat = marker.getPosition().lat();
        var lng = marker.getPosition().lng();
         });
        $('#lat').val(lat);
        $('#lng').val(lng);

    });

*/

      $(function () {
          var markers = [];
          var geocoder = new google.maps.Geocoder();
         var lat = -17.749,
            lng = -63.176,
            latlng = new google.maps.LatLng(lat, lng),
            image = 'http://www.google.com/intl/en_us/mapfiles/ms/micons/blue-dot.png';

        //zoomControl: true,
        //zoomControlOptions: google.maps.ZoomControlStyle.LARGE,

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

          /////////////

//google.maps.event.addDomListener(window, 'load', initialize);


          /////////////

         //google.maps.event.addListener(autocomplete, 'place_changed', function (event) {
         //    infowindow.close();
         //    var place = autocomplete.getPlace();
         //    if (place.geometry.viewport) {
         //        map.fitBounds(place.geometry.viewport);
         //    } else {
         //        map.setCenter(place.geometry.location);
         //        map.setZoom(17);
         //    }

         //    moveMarker(place.name, place.geometry.location);
         //    $('.MapLat').val(place.geometry.location.lat());
         //    $('.MapLon').val(place.geometry.location.lng());
         //});
         //google.maps.event.addListener(map, 'click', function (event) {
         //    $('.MapLat').val(event.latLng.lat());
         //    $('.MapLon').val(event.latLng.lng());
         //    infowindow.close();
         //            var geocoder = new google.maps.Geocoder();
         //            geocoder.geocode({
         //                "latLng":event.latLng
         //            }, function (results, status) {
         //                console.log(results, status);
         //                if (status == google.maps.GeocoderStatus.OK) {
         //                    console.log(results);
         //                    var lat = results[0].geometry.location.lat(),
         //                        lng = results[0].geometry.location.lng(),
         //                        placeName = results[0].address_components[0].long_name,
         //                        latlng = new google.maps.LatLng(lat, lng);

         //                    moveMarker(placeName, latlng);
         //                    $("#searchTextField").val(results[0].formatted_address);
         //                }
         //            });
         //});
        
         function moveMarker(placeName, latlng) {
             marker.setIcon(image);
             marker.setPosition(latlng);
             infowindow.setContent(placeName);
             //infowindow.open(map, marker);
          }
         function mapLocation() {
    var directionsDisplay;
    var directionsService = new google.maps.DirectionsService();
    var map;

    function initialize() {
        directionsDisplay = new google.maps.DirectionsRenderer();
        var chicago = new google.maps.LatLng(37.334818, -121.884886);
        var mapOptions = {
            zoom: 7,
            center: chicago
        };
        map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
        directionsDisplay.setMap(map);
        google.maps.event.addDomListener(document.getElementById('routebtn'), 'click', calcRoute);
    }

    function calcRoute() {
        var start = new google.maps.LatLng(37.334818, -121.884886);
        //var end = new google.maps.LatLng(38.334818, -181.884886);
        var end = new google.maps.LatLng(37.441883, -122.143019);
        var bounds = new google.maps.LatLngBounds();
        bounds.extend(start);
        bounds.extend(end);
        map.fitBounds(bounds);
        var request = {
            origin: start,
            destination: end,
            travelMode: google.maps.TravelMode.DRIVING
        };
        directionsService.route(request, function (response, status) {
            if (status == google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(response);
                directionsDisplay.setMap(map);
            } else {
                alert("Directions Request from " + start.toUrlValue(6) + " to " + end.toUrlValue(6) + " failed: " + status);
            }
        });
    }

    google.maps.event.addDomListener(window, 'load', initialize);
}
mapLocation();




//         google.maps.event.addListener(map, 'click', function(event) {
//   placeMarker(event.latLng);
//         });


//function placeMarker(location) {
//    var marker = new google.maps.Marker({
//        position: location, 
//        map: map,
//        draggable:true,

//    });
//}


     }); 

    
</script>
</body>
</html>
