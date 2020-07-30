@extends('layouts.master')

@section("css")
<link rel="stylesheet" href="{{ asset('leaflet/leaflet.css') }}"/>
<style>
#mapid { height: 550px; 
         width: 550x;
      }
</style>
@endsection

@section('content')
<div class="row justify-content-center">
<div class="col-md-2">

</div>
<div class="col-md-8">
    
    <div id="mapid" style="text-align:center;"></div>
    <script src="{{ asset('leaflet/leaflet.js') }}"></script>
    <script src="{{ asset('leaflet/BoundaryCanvas.js') }}"></script>
    </div>

<div class="col-md-2">

</div>
<!-- col -->
</div>
<!-- row -->
@endsection

@push("script")
<script>

    var map = L.map('mapid').setView([-6.161184,35.745426], 8); //Tanzania Centre Coordinates
   
    $.getJSON("{{ asset('leaflet/regions.geojson') }}").then(function(geoJSON) {
      var osm = new L.TileLayer.BoundaryCanvas("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        boundary: geoJSON,
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
      });
      map.addLayer(osm);
      var ukLayer = L.geoJSON(geoJSON);
      map.fitBounds(ukLayer.getBounds());
    });


//     L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
//         attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
//     }).addTo(map);

//     L.marker([-5.1054, 35.8072]).addTo(map)
//         .bindPopup('Kelema.')
//         .openPopup();

    // load GeoJSON from an external file
  $.getJSON("{{ asset('leaflet/moro.json') }}",function(data){
    // add GeoJSON layer to the map once the file is loaded
    
    L.geoJson(data ,{
          onEachFeature: function(feature, featureLayer) {
            //featureLayer.bindPopup(feature.properties.NAME_1);
          }
      }).addTo(map);
 });

</script>

@endpush
