<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meklēšanas Rezultāti</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="css/alignment.css"> 
    <script defer src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
</head>
<body>
    <div class="container">
        <table id="example" class="table table-striped" border="3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Sporta Laukums</th>
                    <th>Apraksts</th>
                    <th>Info</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("config/db.php");

                // Get search keyword from the form
                $keyword = isset($_GET['needle']) ? $_GET['needle'] : '';

                $sql = "SELECT * FROM sporta_laukums WHERE sp_nosaukums LIKE '%$keyword%'";
                $result = $conn->query($sql);

                if ($result === false) {
                    die("Error executing query: " . $conn->error);
                }

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id_laukums"] . "</td>";
                        echo "<td>" . $row["sp_nosaukums"] . "</td>";
                        echo "<td>" . $row["apraksts"] . "</td>";
                        echo "<td><a href='apraksts.php?id_laukums=" . $row["id_laukums"] . "'>Lasīt vairāk</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No results found.</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
        <div align="center">
            <a class="last-link" href="#" onclick="redirectWithinPage('index.php')">Uz sākumlapu</a>
            <a class="last-link" href="#" onclick="redirectWithinPage('mikrorajoni.php')">Meklēt pēc mikrorajona</a>
        </div>
    </div>
    <footer>
        Autors: Nikolajs Govrovs <br> 2024. gads
    </footer>
    <script>
        function redirectWithinPage(url) {
            window.location.href = url;
        }
    </script>
</body>
</html>
