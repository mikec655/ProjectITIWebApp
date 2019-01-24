<html>
    <body>
        <div id="mapdiv"></div>
        <script src="lib/OpenLayers.js"></script>
        <script>
            <?php
                $countries = array(
                    "AFGHANISTAN",
                    "ARMENIA",
                    "AZERBAIJAN",
                    "BAHRAIN",
                    "BANGLADESH",
                    "BHUTAN",
                    "BRUNEI",
                    "CAMBODIA",
                    "CHINA",
                    "CYPRUS",
                    "GEORGIA",
                    "INDIA",
                    "INDONESIA",
                    "IRAN",
                    "IRAQ",
                    "ISRAEL",
                    "JAPAN",
                    "JORDAN",
                    "KAZAKHSTAN",
                    "KUWAIT",
                    "KYRGYZSTAN",
                    "LAOS",
                    "LEBANON",
                    "MALAYSIA",
                    "MALDIVES",
                    "MONGOLIA",
                    "MYANMAR",
                    "NEPAL",
                    "NORTH KOREA",
                    "OMAN",
                    "PAKISTAN",
                    "PALESTINE",
                    "PHILIPPINES",
                    "QATAR",
                    "RUSSIA",
                    "SAUDI ARABIA",
                    "SINGAPORE",
                    "SOUTH KOREA",
                    "SRI LANKA",
                    "SYRIA",
                    "TAIWAN",
                    "TAJIKISTAN",
                    "THAILAND",
                    "TURKEY",
                    "TURKMENISTAN",
                    "UNITED ARAB EMIRATES",
                    "UZBEKISTAN",
                    "VIETNAM",
                    "YEMEN"
                );
                include("dataReader.php");
                echo "var stations = [";
                foreach($countries as $country){
                    $stations = readDataOfCountry("2019-01-21", $country, "000000010000", 1, TRUE);
                    foreach($stations as $station){
                        if ($station['data']['prcp'][0] >= 1){
                            echo "[" . $station['stn'] . ", '" . $station['name'] . "', '" . $country . "', " . $station['lat'] . "," . $station['long'] . "," . $station['data']['prcp'][0] . "],";
                        }
                    }
                }
                echo "[]];";
               

            ?>

            var map, mappingLayer, vectorLayer, selectMarkerControl, selectedFeature;

            var style =  {
                externalGraphic: 'img/marker.png',
                graphicWidth: 21,
                graphicHeight: 27,
                graphicYOffset: -24
            };

            function onFeatureSelect(feature) {
                selectedFeature = feature;
                popup = new OpenLayers.Popup.FramedCloud("tempId", feature.geometry.getBounds().getCenterLonLat(),
                                        null,
                                        selectedFeature.attributes.stn + ": " + selectedFeature.attributes.name + 
                                        ", Rainfall: " + Math.round(selectedFeature.attributes.rainfall, 2) + "mm " +
                                        "<a href='history.php'>More info</a>",
                                        null, true);
                feature.popup = popup;
                map.addPopup(popup);
            }

            function onFeatureUnselect(feature) {
                map.removePopup(feature.popup);
                feature.popup.destroy();
                feature.popup = null;
            }   

            function init(){
                map = new OpenLayers.Map('mapdiv');
                mappingLayer = new OpenLayers.Layer.OSM("Simple OSM Map");
                map.addLayer(mappingLayer);

                vectorLayer = new OpenLayers.Layer.Vector("Vector Layer", {projection: "EPSG:4326"}); 
                selectMarkerControl = new OpenLayers.Control.SelectFeature(vectorLayer, {onSelect: onFeatureSelect, onUnselect: onFeatureUnselect});
                map.addControl(selectMarkerControl);

                selectMarkerControl.activate();
                map.addLayer(vectorLayer);
                map.setCenter(
                    new OpenLayers.LonLat(0, 0).transform(
                        new OpenLayers.Projection("EPSG:4326"),
                        map.getProjectionObject())
                    , 1
                );    
            }

            function placeRandomMarker(value){
                var lat = value[3];
                var lon = value[4];
                var lonLat = new OpenLayers.Geometry.Point( lon, lat);
                lonLat.transform("EPSG:4326", map.getProjectionObject());
                var feature = new OpenLayers.Feature.Vector(lonLat, {stn: value[0], name: value[1], rainfall: value[5]}, style);
                vectorLayer.addFeatures(feature);
            }

            init();
            stations.forEach(placeRandomMarker);
            
        </script>
    </body>
</html>