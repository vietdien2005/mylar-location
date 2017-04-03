<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" />
    <title>Location</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ mix('css/home.css') }}" type="text/css" rel="stylesheet" media="screen,projection" />
</head>

<body class="menubar-hoverable header-fixed">
    <header id="header" >
        <div class="headerbar">
            <div class="headerbar-left">
                <ul class="header-nav header-nav-options">
                    <li class="header-nav-brand" >
                        <div class="brand-holder">
                            <a href="{{ url('/') }}">
                                <span class="text-lg text-bold text-primary">Location</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="headerbar-right">
                <ul class="header-nav header-nav-options">
                    <li>
                        <form class="navbar-search" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control" name="headerSearch" placeholder="Enter your keyword">
                            </div>
                            <button type="submit" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-search"></i></button>
                        </form>
                    </li>
                </ul>
                <ul class="header-nav header-nav-toggle" style="display: none;">
                    <li>
                        <a class="btn btn-icon-toggle btn-default pull-right" id="offcanvas-detail" href="#canvas-detail" data-toggle="offcanvas" data-backdrop="false">
                            <i class="fa fa-ellipsis-v"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    
    <div id="base">
        <div class="offcanvas"></div>

        <div id="content">
            <div class="box">
                <div id="map" style="width: 100%; height: 100%; margin: 0 0 0 0;"></div>
            </div>
        </div>
        
        <div class="offcanvas">
            <div id="canvas-detail" class="offcanvas-pane style-info width-10">
                <div class="offcanvas-head">
                    <header class="marker-name"></header>
                    <div class="offcanvas-tools">
                        <a id="close-canvas" class="btn btn-icon-toggle btn-default-light pull-right" data-dismiss="offcanvas">
                            <i class="md md-close"></i>
                        </a>
                    </div>
                </div>
                <div class="offcanvas-body">
                    <p class="marker-address"></p>
                    <p>&nbsp;</p>
                    <h4>Some details</h4>
                    {{-- <ul class="list-divided">
                        <li><strong>Width</strong><br/><span class="opacity-75">400px</span></li>
                        <li><strong>Height</strong><br/><span class="opacity-75">100%</span></li>
                        <li><strong>Body scroll</strong><br/><span class="opacity-75">disabled</span></li>
                        <li><strong>Background color</strong><br/><span class="opacity-75">Default</span></li>
                    </ul> --}}
                </div>
            </div>
        </div>
    </div>
    
    <script src="{{ mix('js/home.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDOPQ3xsbMrjvwr77CrIYJPi-xzx6uU6Yk"></script>
    <script>
    var json = [];
    var image = {
        url: "{{ url('img/icon-home.png') }}",
        size: new google.maps.Size(32, 32),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(0, 32)
    };
    var myLatLng = {lat: 10.7820021, lng: 106.6736315};
    var linkmakers = "{{ route('getMarkers') }}";

    $.getJSON(linkmakers, function(json) {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12,
            center: myLatLng
        });
        $.each(json, function(key, data) {
            var latLng = new google.maps.LatLng(data.loc_lat, data.loc_lng); 
            var marker = new google.maps.Marker({
                position: latLng,
                map: map,
                title: data.loc_name,
                icon: image,
                title: data.loc_name,
                animation: google.maps.Animation.DROP,
                zIndex: 100
            });
            var contentString = '<div id="content">'+
            '<div id="siteNotice">'+'</div>'+
                '<h3 id="firstHeading" class="firstHeading">'+data.loc_name+'</h3>'+
                '<div id="bodyContent">'+
                    '<p><b>'+data.loc_address+'</b></p>'+
                    '<p>Link <a target="_blank" href="https://google.com.vn">'+data.loc_name+'</a>'+'</p>'+
                '</div>'+
            '</div>';
            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });
            marker.addListener('click', function () {
                toggleBounce();
                // infowindow.open(map, marker);
                setTimeout(toggleBounce, 1500);
                $('.marker-name').text(data.loc_name);
                $('.marker-address').text(data.loc_address);
                if (!$('#canvas-detail').hasClass('active')) {
                    $('#offcanvas-detail').click();
                }
            });
            marker.addListener('mouseover', function () {
                // infowindow.open(map, marker);
            });
            marker.addListener('mouseout', function () {
                // infowindow.close(map, marker);
            });
            function toggleBounce() {
                if (marker.getAnimation() != null) {
                    marker.setAnimation(null);
                } else {
                    marker.setAnimation(google.maps.Animation.BOUNCE);
                }
            }
        });
    });

    </script>
</body>
</html>
