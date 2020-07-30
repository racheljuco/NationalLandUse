@extends('layouts.master')

@section("css")
<link rel="stylesheet" href="{{ asset('leaflet/leaflet.css') }}"/>
<style>
#mapid { height: 600px; 
         width: 700px;
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



    var map = L.map('mapid', {
          attributionControl: false,
          dragging: true,
          scrollWheelZoom: 'center',
          minZoom: 6,
          maxZoom: 13
      }).setView([-6.161184,35.745426], 8); //Tanzania Centre Coordinates

    L.control.attribution({prefix: "longitude , latitude" }).addTo(map);
    
    $.getJSON("{{ asset('leaflet/regions.geojson') }}").then(function(geoJSON) {
      var osm = new L.TileLayer.BoundaryCanvas("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        boundary: geoJSON,
        attribution: 'Map data &copy; OpenStreetMap contributors',
        trackAttribution: false
      });


      map.addLayer(osm);
      var TzLayer = L.geoJSON(geoJSON);
      map.fitBounds(TzLayer.getBounds());
   
    });

    map.on('mousemove',function(ev) {
      lat = ev.latlng.lat;
      lng = ev.latlng.lng;
      console.log(lat,lng);
    });

</script>

@endpush
