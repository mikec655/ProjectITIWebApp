<html>
    <body>
        <div id="mapdiv"></div>
        <script src="http://www.openlayers.org/api/OpenLayers.js"></script>
        <script>
          map = new OpenLayers.Map("mapdiv");
          map.addLayer(new OpenLayers.Layer.OSM());

          var lonLat = new OpenLayers.LonLat( 77.216721,28.644800)
                .transform(
                  new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
                  map.getProjectionObject() // to Spherical Mercator Projection
                );

          var zoom=5;

          var markers = new OpenLayers.Layer.Markers( "Markers" );
          map.addLayer(markers);

          markers.addMarker(new OpenLayers.Marker(lonLat));

          map.setCenter (lonLat, zoom);
        </script>
    </body>
</html>