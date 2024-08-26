@extends('layouts.main')
@section('isi')


<div class="z-10" style="position:relative; height: 590px; width: 100%;" id="mapid"></div>

<script>

var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '© OpenStreetMap'
});

var osmHOT = L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '© OpenStreetMap contributors, Tiles style by Humanitarian OpenStreetMap Team hosted by OpenStreetMap France'});

var satelit = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
    maxZoom: 20,
        subdomains:['mt0','mt1','mt2','mt3']
});

    
var mapid = L.map('mapid', {
    center: [4.49277106761,  96.7356360094],
    zoom: 10,
    layers: [satelit]
});

var baseMaps = {
    "OpenStreetMap": osm,
    "OpenStreetMap.HOT": osmHOT,
    "satelit": satelit,
};


var layerControl = L.control.layers(baseMaps).addTo(mapid);


var smallIcon = new L.Icon({
        iconSize: [30, 30],
        iconAnchor: [13, 27],
        popupAnchor: [1, -24],
        iconUrl: 'icon/icon.png'
    });

</script>
@endsection
