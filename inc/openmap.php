<center>
    <h1>Rainfall Map</h1>
    <div id="mapdiv"></div>
</center>
<script src="lib/OpenLayers.js"></script>
<script>
    <?php
    include("dataReader.php");
        echo "var stations = [";
        $stations = readDataOfAsia(date("Y-m-d"), "000000010000", 1, TRUE);
        foreach($stations as $station){
            if ($station[5]['prcp'][0] >= 1){
                echo "[" . $station[0] . ", '" . $station[1] . "', '" . $station[2] . "', " . $station[3] . "," . $station[4] . "," . $station[5]['prcp'][0] . "],";
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
                                "<a href='history.php?date=" + curday() + "&station=" + selectedFeature.attributes.stn + "&name=" + selectedFeature.attributes.name + "&country=" + selectedFeature.attributes.country + "' class='blacklink'>More info</a>",
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
        var options = {
            center: new OpenLayers.LonLat(8688138.383006, 4461476.466949)
        };

        map = new OpenLayers.Map('mapdiv', options);
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
        var feature = new OpenLayers.Feature.Vector(lonLat, {stn: value[0], name: value[1], country: value[2], rainfall: value[5]}, style);
        vectorLayer.addFeatures(feature);
    }

    function curday(){
        today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; 
        var yyyy = today.getFullYear();

        if(dd < 10) dd = '0' + dd;
        if(mm < 10) mm = '0' + mm;
        return (yyyy + "-" + mm + "-" + dd);
    }

    init();
    stations.forEach(placeRandomMarker);
    
</script>