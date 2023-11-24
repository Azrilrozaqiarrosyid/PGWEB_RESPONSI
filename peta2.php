<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Peta Desa Klasifikasi Wisata</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    <!-- Marker Cluster -->
    <link rel="stylesheet" href="assets/plugins/leaflet-markercluster/MarkerCluster.css" />
    <link rel="stylesheet" href="assets/plugins/leaflet-markercluster/MarkerCluster.Default.css" />
    <!-- Routing -->
    <link rel="stylesheet" href="assets/plugins/leaflet-routing/leaflet-routing-machine.css" />
    <!-- Search CSS Library -->
    <link rel="stylesheet" href="assets/plugins/leaflet-search/leaflet-search.css" />
    <!-- Geolocation CSS Library for Plugin -->
    <link rel="stylesheet"
        href="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-locatecontrol/v0.43.0/L.Control.Locate.css" />
    <!-- Leaflet Mouse Position CSS Library -->
    <link rel="stylesheet" href="assets/plugins/leaflet-mouseposition/L.Control.MousePosition.css" />
    <!-- Leaflet Measure CSS Library -->
    <link rel="stylesheet" href="assets/plugins/leaflet-measure/leaflet-measure.css" />
    <!-- EasyPrint CSS Library -->
    <link rel="stylesheet" href="assets/plugins/leaflet-easyprint/easyPrint.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <style>
        html,
        body,
        #map {
            height: 100%;
            width: 100%;
            margin: 0px;
        }

        /* Background pada Judul */
        *.info {
            padding: 6px 8px;
            font: 14px/16px Arial, Helvetica, sans-serif;
            background: white;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            text-align: center;
        }

        .info h2 {
            margin: 0 0 5px;
            color: #777;
        }
    </style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <div class="b-example-divider"></div>
    <div id="map"></div>

    <!-- Include your GeoJSON data -->
    <script src="./data.js"></script>

    <!-- Leaflet and Plugins -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="assets/plugins/leaflet-markercluster/leaflet.markercluster.js"></script>
    <script src="assets/plugins/leaflet-markercluster/leaflet.markercluster-src.js"></script>
    <script src="assets/plugins/leaflet-routing/leaflet-routing-machine.js"></script>
    <script src="assets/plugins/leaflet-routing/leaflet-routing-machine.min.js"></script>
    <script src="assets/plugins/leaflet-search/leaflet-search.js"></script>
    <script src="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-locatecontrol/v0.43.0/L.Control.Locate.min.js"></script>
    <script src="assets/plugins/leaflet-mouseposition/L.Control.MousePosition.js"></script>
    <script src="assets/plugins/leaflet-measure/leaflet-measure.js"></script>
    <script src="assets/plugins/leaflet-easyprint/leaflet.easyPrint.js"></script>

    <script>
        // Initialize the map
        var map = L.map("map").setView([-7.7956, 110.3695], 10);

        // Title
        var title = new L.Control();
        title.onAdd = function (map) {
            this._div = L.DomUtil.create("div", "info");
            this.update();
            return this._div;
        };
        title.update = function () {
            this._div.innerHTML =
                "<h4> Data Persebaran Sentra Industri Terdaftar di Kabupaten Sleman </h4>Berdasarkan Data Pemerintah Kabupaten Sleman";
        };
        title.addTo(map);

        // Watermark 
        L.Control.Watermark = L.Control.extend({
            onAdd: function (map) {
                var container = L.DomUtil.create("div", "leaflet-control-watermark");
                var img = L.DomUtil.create("img", "watermark-image");
                img.src = "assets/img/logo/LOGO_SIG_BLUE.png";
                img.style.width = "120px";
                container.appendChild(img);
                return container;
            },
        });
        L.control.watermark = function (opts) {
            return new L.Control.Watermark(opts);
        };

        L.control.watermark({ position: "bottomleft" }).addTo(map);

        // Basemaps
        var basemap1 = L.tileLayer(
            "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
            {
                maxZoom: 19,
                attribution:
                    'Map data © <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            }
        );
        basemap1.addTo(map);

        // Plugin EasyPrint
        L.easyPrint({
            title: "Print",
        }).addTo(map);

        // Plugin Geolocation
        var locateControl = L.control
            .locate({
                position: "topleft",
                drawCircle: true,
                follow: true,
                setView: true,
                keepCurrentZoomLevel: false,
                markerStyle: {
                    weight: 1,
                    opacity: 0.8,
                    fillOpacity: 0.8,
                },
                circleStyle: {
                    weight: 1,
                    clickable: false,
                },
                icon: "fas fa-crosshairs",
                metric: true,
                strings: {
                    title: "Click for Your Location",
                    popup: "You're here. Accuracy {distance} {unit}",
                    outsideMapBoundsMsg: "Not available",
                },
                locateOptions: {
                    maxZoom: 16,
                    watch: true,
                    enableHighAccuracy: true,
                    maximumAge: 10000,
                    timeout: 10000,
                },
            })
            .addTo(map);

        // Plugin Mouse Position Coordinate
        L.control
            .mousePosition({
                position: "bottomright",
                separator: ",",
                prefix: "Point Coodinate: ",
            })
            .addTo(map);

        // Plugin Routing
        L.Routing.control({
            waypoints: [
                L.latLng(-7.590700061386111, 110.42768787014823),
                L.latLng(-7.78910508484698, 110.36342969381099),
            ],
            routeWhileDragging: true,
        }).addTo(map);

        <?php
        // Sesuaikan dengan setting MySQL
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "pgweb_responsi";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM tabel_sentra";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $lat = $row["Latitude"];
                $long = $row["Longitude"];
                $info = $row["Nama_Sentra"];
                echo "L.marker([$lat, $long]).addTo(map).bindPopup('$info');";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    

        
    </script>
</body>

</html>

