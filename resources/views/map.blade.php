<!DOCTYPE html>
<html>
  <head>
    <title>Map - Stray Lab</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>
      var map;
      var stores = {!! $stores !!};

      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: { lat: 23.9756500, lng: 120.97388194 },
          zoom: 8
        });

        stores.forEach(function (store) {
          new google.maps.Marker({
            position: { lat: parseFloat(store.latitude), lng: parseFloat(store.longitude) }, map: map
          });
        })
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_API_KEY')}}&callback=initMap"
    async defer></script>
  </body>
</html>
