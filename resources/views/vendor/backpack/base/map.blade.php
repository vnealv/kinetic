@extends('backpack::layout')

@section('header')

    <section class="content-header">
        <h1>
            Map
            <small>Test Page</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url(config('backpack.base.route_prefix')) }}">{{ config('backpack.base.project_name') }}</a>
            </li>
            <li class="active">Maps</li>
        </ol>
    </section>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="box-title">Map</div>
                </div>

                <div class="box-body" id="map" style="height: 600px;">Map tp go here</div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="box-title">fields</div>
                </div>

                <div class="box-body">
                    <div class="form-group">
                        <label>Latitude:</label>
                        <input type="text" class="form-control" id="lat">
                    </div>
                    <div class="form-group">
                        <label>Longitude:</label>
                        <input type="text" class="form-control" id="long">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCS46YNEDDw30FHTSVLDcCVx1ElH43DTQY"></script>
    <script>
        // In this example, we center the map, and add a marker, using a LatLng object
        // literal instead of a google.maps.LatLng object. LatLng object literals are
        // a convenient way to add a LatLng coordinate and, in most cases, can be used
        // in place of a google.maps.LatLng object.

        var map;
        function initialize() {
            var mapOptions = {
                zoom: 8,
                center: {lat: 3.132505, lng: 101.665433}
            };
            map = new google.maps.Map(document.getElementById('map'),
                    mapOptions);

            var marker = new google.maps.Marker({
                // The below line is equivalent to writing:
                // position: new google.maps.LatLng(-34.397, 150.644)
                position: {lat: 3.132505, lng: 101.665433},
                map: map,
                draggable: true
            });


            google.maps.event.addListener(marker, 'dragend', function (evt) {

                document.getElementById('lat').value = evt.latLng.lat().toFixed(3);
                document.getElementById('long').value = evt.latLng.lng().toFixed(3);
            });
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
@endsection
