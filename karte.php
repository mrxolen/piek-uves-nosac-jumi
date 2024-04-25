<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Sporta Laukums</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css" />
    <style>
        #map {
            height: 600px;
            width: 85%;
            margin: 0 auto;
            border: 5px solid orange;
        }
    </style>
</head>
<body>
    <div id="map"></div>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>
    <script>
        // Function to initialize the map with markers
        function initMap() {
            const map = L.map('map').setView([56.9496, 24.1052], 12); // Set initial view to a location in your city

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            <?php
            include("config/db.php");

            $sql = "SELECT sp_nosaukums, latitude, longitude, id_laukums FROM sporta_laukums";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id_laukums = $row['id_laukums'];
                    $latitude = $row["latitude"];
                    $longitude = $row["longitude"];
                    $sp_nosaukums= $row["sp_nosaukums"];

                    // Use json_encode to ensure correct handling of special characters
                    $encoded_sp_nosaukums = json_encode($sp_nosaukums);

                    // Echo the JavaScript code without line breaks to avoid potential issues
                    echo "L.marker([$latitude, $longitude]).addTo(map)"
                        . ".bindPopup('<b>' + $encoded_sp_nosaukums + '</b><br><a href=\"apraksts.php?id_laukums=$id_laukums\">Lasīt vairāk</a>')";

                    // Add a line break for better readability
                    echo ";\n";
                }
            } else {
                echo "No data found for Sporta Laukums";
            }

            $conn->close();
            ?>
        }

        // Call the function to initialize the map with markers
        initMap();
    </script>
</body>
</html>
