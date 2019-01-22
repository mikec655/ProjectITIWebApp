<html>
    <body>
        <div id="mapdiv"></div>
        <script src="http://www.openlayers.org/api/OpenLayers.js"></script>
        <script>
            map = new OpenLayers.Map("mapdiv");
            map.addLayer(new OpenLayers.Layer.OSM());

            var lonLat = new OpenLayers.LonLat(77.216721, 28.644800)
                    .transform(
                            new OpenLayers.Projection("EPSG:4326"),
                            map.getProjectionObject()
                            );

            var zoom = 5;

            var markers = new OpenLayers.Layer.Markers("Markers");
            map.addLayer(markers);

            markers.addMarker(new OpenLayers.Marker(lonLat));

            map.setCenter(lonLat, zoom);

            var i = 0;
            var lon = 76.216721;
            var lat = 27.644800;
            while (i < 10) {
                var newlonLat = new OpenLayers.LonLat(lon, lat)
                        .transform(
                                new OpenLayers.Projection("EPSG:4326"),
                                map.getProjectionObject()
                                );
                markers.addMarker(new OpenLayers.Marker(newlonLat));
                i++;
                var lon = +lon + 1;
                var lat = +lat + 1;
            }
        </script>
    </body>
</html>