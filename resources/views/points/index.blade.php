@extends('layouts.app')

@section('content')
<div class="card" style="width: 1920px;">
    <div class="row justify-content-left" id="mapid" style="width: 1920px;"></div>
</div>
@endsection

@section('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
    integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
    crossorigin=""/>

<style>
    #mapid { min-height: 900px; width:1080px; height: 900px; }
</style>
@endsection
@push('scripts')
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
    integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
    crossorigin=""></script>

<script>
    var map = L.map('mapid').setView([{{ config('leaflet.map_center_latitude') }}, {{ config('leaflet.map_center_longitude') }}], {{ config('leaflet.zoom_level') }});
    var baseUrl = "{{ url('/') }}";

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    /*
    var greenIcon = L.icon({
    iconUrl: 'screenshots/camara.png',
    shadowUrl: 'screenshots/camara.png',
    iconSize:     [30, 30], // size of the icon
    shadowSize:   [30, 30], // size of the shadow
    iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
    shadowAnchor: [4, 62],  // the same for the shadow
    popupAnchor:  [0, 0], // point from which the popup should open relative to the iconAnchor
    tooltipAnchor: [0, 0]
    });
    */
    axios.get('{{ route('api.points.index', ['id' => $id]) }}')
    .then(function (response) {
        console.log('./13.png');
        L.geoJSON(response.data, {
            pointToLayer: function(geoJsonPoint, latlng) {
                var greenIcon = new L.Icon({
                    iconUrl: "../leaflet/public/screenshots/13.png",
                    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                    iconSize: [25, 41],
                    iconAnchor: [12, 41],
                    popupAnchor: [1, -34],
                    shadowSize: [41, 41]
                });
                var myIcon = L.icon({
                    iconUrl: `storage/app/public/${response.data.features[0].properties.layer_id}.jpeg`,
                    iconSize: [38, 95],
                    iconAnchor: [22, 94],
                    popupAnchor: [-3, -76],
                    shadowSize: [68, 95],
                    shadowAnchor: [22, 94]
                });
                var smallIcon = new L.Icon({
                    iconSize: [27, 27],
                    iconAnchor: [13, 27],
                    popupAnchor:  [1, -24],
                    iconUrl: `c:/xampp/htdocs/COM/leaflet/storage/app/public/${response.data.features[0].properties.layer_id}.png`
                });
                return L.marker(latlng,{icon: greenIcon} ); //{icon: greenIcon}
            }
        })
        .bindPopup(function (layer) {
            return layer.feature.properties.map_popup_content;
        }).addTo(map);
    })
    .catch(function (error) {
        console.log(error);
    });
    

    @can('create', new App\Outlet)
    var theMarker;
    @endcan
</script>
@endpush
