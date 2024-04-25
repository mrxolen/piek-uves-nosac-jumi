<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mikrorajoni</title>
    <meta name="description" content="Our first page">
    <meta name="keywords" content="html tutorial template">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js">
    <script defer src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script defer src="script2.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script defer src="script.js"></script>
    <style>
        body {
            overflow-x: hidden;
        }
        .last-link:link,
        .last-link:visited {
            border-radius: 43%;
            background-color: #fcffa4; 
            color: black;
            padding: 14px 25px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            cursor: pointer; 
        }

        .last-link:hover,
        .last-link:active {
            background-color: #fbec5d; 
            text-align: center;
        }
        footer {
            background-color: #FFFACD;
            color: #000000;
            text-align: left;
            padding: 20px;
            position: relative;
            bottom: 0;
            width: 100%;
            font-size: 16px;
            border: 2px solid #FFFFF0;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            
        }
    </style>
</head>
<body>
    <table id="example" class="table table-striped" style="width:85%" border="3" align="center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Mikrorajons</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include("config/db.php");
            $keyword = isset($_GET['needle']) ? $_GET['needle'] : '';
            $sql = "SELECT * FROM mikrorajons WHERE nosaukums LIKE '%$keyword%'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["ID"] . "</td>";
                    echo "<td><a href='sp_laukumi.php?id=" . $row["ID"] . "'>" . $row["nosaukums"] . "</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>Nav atrasti dati</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <br>
    <br>
    <div align="center">
        <a class="last-link" href="#" onclick="redirectWithinPage('index.php')">Uz sākumlapu</a>
    </div>

    <script>
        function redirectWithinPage(url) {
            window.location.href = url;
        }
    </script>
    <footer>
        Autors: Nikolajs Govrovs <br> 2024. gads
    </footer>
</body>
</html>
