<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sporta Laukums Details</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        #map {
            height: 400px;
            width: 85%;
            margin: 0 auto; 
            border: 5px solid orange; 
        }
        body {
            font-family: 'Arial', sans-serif;
        }

        table {
            width: 70%;
            border-collapse: collapse;
            margin: 20px auto;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        .image {
            width: 650px;
            height: 450px;
            border: 5px solid orange;
            display: block;
            margin: 20px auto; 
        }

    </style>
</head>
<body>
    <div id="map"></div>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
      
        function initMap(latitude, longitude, sp_nosaukums) {
            const map = L.map('map').setView([latitude, longitude], 16);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            L.marker([latitude, longitude]).addTo(map)
                .bindPopup('<b>' + sp_nosaukums + '</b><br>Coordinates: ' + latitude + ', ' + longitude).openPopup();
        }

       
        <?php
        include("config/db.php");

        if (isset($_GET['id_laukums'])) {
            
            $selectedId = mysqli_real_escape_string($conn, $_GET['id_laukums']);

            
            $sql = "SELECT latitude, longitude, sp_nosaukums
                    FROM sporta_laukums
                    WHERE id_laukums = '$selectedId'";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $latitude = $row['latitude'];
                $longitude = $row['longitude'];
                $sp_nosaukums = $row['sp_nosaukums'];

                echo 'initMap(' . $latitude . ', ' . $longitude . ', "' . $sp_nosaukums . '");';
            }
        }

        ?>
    </script>

    <?php
    include("config/db.php");

    if (isset($_GET['id_laukums'])) {
        // Sanitize the input to prevent SQL injection
        $selectedId = mysqli_real_escape_string($conn, $_GET['id_laukums']);

        // Fetch data for the selected id_laukums
        $sql = "SELECT sp_nosaukums, dl_vasara, dl_ziema, rotallaukums, skriesana, futbols, basketbols, tr_zona, pieejams, adrese, apraksts, privats
                FROM sporta_laukums
                WHERE id_laukums = '$selectedId'";

        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            echo "<table>";

            // Table header
            echo "<tr>";
            echo "<th>Svarīgākais</th><th>Informācija</th>";
            echo "</tr>";

            // Assuming only one row will be returned
            $row = $result->fetch_assoc();

            $attributeNames = array(
                'sp_nosaukums' => 'Laukuma Nosaukums',
                'dl_vasara' => 'Darba laiks vasarā',
                'dl_ziema' => 'Darba laiks ziemā',
                'rotallaukums' => 'Rotaļlaukums',
                'skriesana' => 'Skriešanas celiņš',
                'futbols' => 'Futbola laukums',
                'basketbols' => 'Basketbola laukums',
                'tr_zona' => 'Trenažieru zona',
                'pieejams' => 'Pieejamība',
                'adrese' => 'Adrese',
                'apraksts' => 'Apraksts',
                'privats' => 'Privāts'
            );

            // Table data
            foreach ($row as $key => $value) {
                echo "<tr>";
                echo "<td>{$attributeNames[$key]}</td><td>$value</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No data found for Sporta Laukums ID: $selectedId";
        }
        
    }
 
    $conn->close();
    ?>
</body>
</html>
