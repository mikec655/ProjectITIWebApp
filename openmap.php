<html>
    <body>
        <div id="mapdiv"></div>
        <script src="http://www.openlayers.org/api/OpenLayers.js"></script>
        <script>
            map = new OpenLayers.Map("mapdiv");
            map.addLayer(new OpenLayers.Layer.OSM());

            var lonLat = new OpenLayers.LonLat(77.216721, 28.644800)
                    .transform(
                            new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
                            map.getProjectionObject() // to Spherical Mercator Projection
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
                                new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
                                map.getProjectionObject() // to Spherical Mercator Projection
                                );
                markers.addMarker(new OpenLayers.Marker(newlonLat));
                i++;
            var lon =+ lon + 1;
            var lat =+ lat + 1;
            }





//            /// marker popup
//
//
//            var map;
//            function init() {
//
//                // The overlay layer for our marker, with a simple diamond as symbol
//                var overlay = new OpenLayers.Layer.Vector('Overlay', {
//                    styleMap: new OpenLayers.StyleMap({
//                        externalGraphic: '../img/marker.png',
//                        graphicWidth: 20, graphicHeight: 24, graphicYOffset: -24,
//                        title: '${tooltip}'
//                    })
//                });
//
//                // The location of our marker and popup. We usually think in geographic
//                // coordinates ('EPSG:4326'), but the map is projected ('EPSG:3857').
//                var myLocation = new OpenLayers.Geometry.Point(10.2, 48.9)
//                        .transform('EPSG:4326', 'EPSG:3857');
//
//                // We add the marker with a tooltip text to the overlay
//                overlay.addFeatures([
//                    new OpenLayers.Feature.Vector(myLocation, {tooltip: 'OpenLayers'})
//                ]);
//
//                // A popup with some information about our location
//                var popup = new OpenLayers.Popup.FramedCloud("Popup",
//                        myLocation.getBounds().getCenterLonLat(), null,
//                        '<a target="_blank" href="http://openlayers.org/">We</a> ' +
//                        'could be here.<br>Or elsewhere.', null,
//                        true // <-- true if we want a close (X) button, false otherwise
//                        );
//
//                // Finally we create the map
//                map = new OpenLayers.Map({
//                    div: "map", projection: "EPSG:3857",
//                    layers: [new OpenLayers.Layer.OSM(), overlay],
//                    center: myLocation.getBounds().getCenterLonLat(), zoom: 15
//                });
//                // and add the popup to it.
//                map.addPopup(popup);
//            }

        </script>
    </body>
</html>