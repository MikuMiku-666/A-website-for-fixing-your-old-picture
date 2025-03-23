if (document.getElementById('map')) {
    mapboxgl.accessToken = 'pk.eyJ1IjoiaG9hbmdoYW5kbiIsImEiOiJjbHp3YnUyc2cwMTl3MmtweWo1MjU0cnQ3In0.kJvlxTy_K1nVvwR8y5O8xA';
    const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/light-v10',
        center: [-118.2437, 34.0522],
        zoom: 14,
        cooperativeGestures: true,
    });

    const geojson = {
        type: 'FeatureCollection',
        features: [
            {
                type: 'Feature',
                geometry: {
                    type: 'Point',
                    coordinates: [-118.2437, 34.0522]
                }
            }
        ]
    };

    for (const feature of geojson.features) {
        // create a HTML element for each feature
        const el = document.createElement('div');
        el.className = 'marker';

        // make a marker for each feature and add to the map
        new mapboxgl.Marker(el).setLngLat(feature.geometry.coordinates).addTo(map);
    }


    var markers = [
        { coordinates: [-118.2437, 34.0522] },
        { coordinates: [-118.2100, 34.0540] },
        { coordinates: [-118.2300, 34.0590] },
        { coordinates: [-118.2700, 34.0600] },
        { coordinates: [-118.2550, 34.0450] },

    ];

    markers.forEach(function (marker) {
        var el = createMarkerElement();
        new mapboxgl.Marker({ element: el })
            .setLngLat(marker.coordinates)
            .setPopup(new mapboxgl.Popup({ offset: 25 }).setHTML('<img src="image/section/map-1.jpg" class="lazyload" data-src="image/section/map-1.jpg" alt="Marker image"> <div class="map-content"><div class="text-body-3"><svg width="20" height="20" viewBox="0 0 24 28" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M21 14C21 21 12 27 12 27C12 27 3 21 3 14C3 11.6131 3.94821 9.32387 5.63604 7.63604C7.32387 5.94821 9.61305 5 12 5C14.3869 5 16.6761 5.94821 18.364 7.63604C20.0518 9.32387 21 11.6131 21 14Z" stroke="#64666C" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" /> <path d="M12 17C13.6569 17 15 15.6569 15 14C15 12.3431 13.6569 11 12 11C10.3431 11 9 12.3431 9 14C9 15.6569 10.3431 17 12 17Z" stroke="#64666C" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" /> </svg> Los Anglese</div><h6 class="title fw-6"><a href="#">Ahungalla, Southern Province, Sri Lanka.</a></h6><div class="date-map caption-1">Nov. 10 - 15</div></div> </div>'))
            .addTo(map);
    });

    function createMarkerElement() {
        var el = document.createElement('div');
        el.className = 'marker';
        return el;
    }
}

if (document.getElementById('map1')) {
    mapboxgl.accessToken = 'pk.eyJ1IjoiaG9hbmdoYW5kbiIsImEiOiJjbHp3YnUyc2cwMTl3MmtweWo1MjU0cnQ3In0.kJvlxTy_K1nVvwR8y5O8xA';
    const map1 = new mapboxgl.Map({
        container: 'map1',
        style: 'mapbox://styles/mapbox/light-v11',
        center: [-0.108968, 51.492933],
        zoom: 14,
        cooperativeGestures: true,
    });

    const geojson1 = {
        type: 'FeatureCollection',
        features: [
            {
                type: 'Feature',
                geometry: {
                    type: 'Point',
                    coordinates: [-0.108968, 51.492933]
                }
            }
        ]
    };

    for (const feature of geojson1.features) {
        // create a HTML element for each feature
        const el = document.createElement('div');
        el.className = 'marker';

        // make a marker for each feature and add to the map
        new mapboxgl.Marker(el).setLngLat(feature.geometry.coordinates).addTo(map1);
    }
    var markers = [
        { coordinates: [-118.2437, 34.0522] },

    ];

    function createMarkerElement() {
        var el = document.createElement('div');
        el.className = 'marker';
        return el;
    }
}

if (document.getElementById('map2')) {
    mapboxgl.accessToken = 'pk.eyJ1IjoiaG9hbmdoYW5kbiIsImEiOiJjbHp3YnUyc2cwMTl3MmtweWo1MjU0cnQ3In0.kJvlxTy_K1nVvwR8y5O8xA';
    const map2 = new mapboxgl.Map({
        container: 'map2',
        style: 'mapbox://styles/mapbox/light-v11',
        center: [-0.108968, 51.492933],
        zoom: 14,
        cooperativeGestures: true,
    });

    const geojson2 = {
        type: 'FeatureCollection',
        features: [
            {
                type: 'Feature',
                geometry: {
                    type: 'Point',
                    coordinates: [-0.108968, 51.492933]
                }
            }
        ]
    };

    for (const feature of geojson2.features) {
        // create a HTML element for each feature
        const el = document.createElement('div');
        el.className = 'marker';

        // make a marker for each feature and add to the map
        new mapboxgl.Marker(el).setLngLat(feature.geometry.coordinates).addTo(map2);
    }
}
if (document.getElementById('map3')) {
    mapboxgl.accessToken = 'pk.eyJ1IjoiaG9hbmdoYW5kbiIsImEiOiJjbHp3YnUyc2cwMTl3MmtweWo1MjU0cnQ3In0.kJvlxTy_K1nVvwR8y5O8xA';
    const map = new mapboxgl.Map({
        container: 'map3',
        style: 'mapbox://styles/mapbox/light-v10',
        center: [-118.2437, 34.0522],
        zoom: 14,
        cooperativeGestures: true,
    });

    const geojson = {
        type: 'FeatureCollection',
        features: [
            {
                type: 'Feature',
                geometry: {
                    type: 'Point',
                    coordinates: [-118.2437, 34.0522]
                }
            }
        ]
    };

    for (const feature of geojson.features) {
        // create a HTML element for each feature
        const el = document.createElement('div');
        el.className = 'marker';

        // make a marker for each feature and add to the map
        new mapboxgl.Marker(el).setLngLat(feature.geometry.coordinates).addTo(map);
    }


    var markers = [
        { coordinates: [-118.2437, 34.0522] },

    ];

    markers.forEach(function (marker) {
        var el = createMarkerElement();
        new mapboxgl.Marker({ element: el })
            .setLngLat(marker.coordinates)
            .setPopup(new mapboxgl.Popup({ offset: 25 }).setHTML('<img src="image/section/map-1.jpg" class="lazyload" data-src="image/section/map-1.jpg" alt="Marker image"> <div class="map-content"><div class="text-body-3"><svg width="20" height="20" viewBox="0 0 24 28" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M21 14C21 21 12 27 12 27C12 27 3 21 3 14C3 11.6131 3.94821 9.32387 5.63604 7.63604C7.32387 5.94821 9.61305 5 12 5C14.3869 5 16.6761 5.94821 18.364 7.63604C20.0518 9.32387 21 11.6131 21 14Z" stroke="#64666C" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" /> <path d="M12 17C13.6569 17 15 15.6569 15 14C15 12.3431 13.6569 11 12 11C10.3431 11 9 12.3431 9 14C9 15.6569 10.3431 17 12 17Z" stroke="#64666C" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" /> </svg> Los Anglese</div><h6 class="title fw-6"><a href="#">Ahungalla, Southern Province, Sri Lanka.</a></h6><div class="date-map caption-1">Nov. 10 - 15</div></div> </div>'))
            .addTo(map);
    });

    function createMarkerElement() {
        var el = document.createElement('div');
        el.className = 'marker';
        return el;
    }
     // Thêm điều khiển zoom và xoay vào bản đồ
     var nav = new mapboxgl.NavigationControl();
     map.addControl(nav, 'bottom-left'); // Thêm vào góc trên bên trái
}
