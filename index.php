<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sporta Laukumi Rīgā <?php echo htmlspecialchars($_GET['a'] ?? ''); ?></title>
    <meta name="description" content="Our first page">
    <meta name="keywords" content="html tutorial template">
    <link rel="stylesheet" type="text/css" href="css/img_style.css">
    <link rel="stylesheet" type="text/css" href="css/table_align.css">
    <link rel="stylesheet" type="text/css" href="css/website_header.css">
    <link rel="stylesheet" href="css/search-design.css">
    <style>
        body {
            font-family: 'Calibri';
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            position: relative;
            min-height: 100vh;
            background-color: #FFFFE0; 
            overflow-x: hidden
            
        }

        .header {
            background-color: #FFFACD;
            color: #000;
            text-align: center;
            padding: 20px;
        }

        .under-header {
            background-color: #FFEFD5;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        h1 {
            margin-top: 0;
            font-size: 42px;
            letter-spacing: 3px;
        }

        h2 {
            margin-top: 0;
            font-size: 30px;
            letter-spacing: 3px;
            color: #000000;
        }

        .search {
            max-width: 400px; 
            margin: 20px auto;
            padding: 10px;
            background-color: #fff; 
            border-radius: 8px; 
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1); 
        }

        .container {
            max-width: 800px; 
            margin: 20px auto;
            padding: 10px;
            background-color: #fff; 
            border-radius: 8px; 
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1); 
        }

        .table-title {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 10px;
        }

        table {
            width: 100%; 
            border-collapse: collapse;
            border: 2px solid #3498db; 
            margin-top: 20px;
            margin-bottom: 20px;
        }

        th, td {
            padding: 15px;
            text-align: center;
            border: 1px solid #3498db;
        }

        th {
            background-color: #3498db;
            color: #fff;
            font-weight: bold;
        }

        form {
            margin-top: 20px;
            text-align: center;
            font-size: 16px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"] {
            padding: 8px;
            width: 70%;
            box-sizing: border-box;
        }

        button {
            padding: 8px 20px;
            background-color: #2F4F4F;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: 	#708090;
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

        @media only screen and (max-width: 768px) {
            .container {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>SPORTA LAUKUMI RĪGĀ</h1>
        <p style="text-align: center;">Laipni lūdzam! Šis portāls ir īpaši izveidots, lai jums būtu ērti atrast informāciju par Rīgas sporta laukumiem. Šeit varat izmantot meklēšanu gan pēc nosaukuma, gan pēc kartes (skatiet zemāk). Izmantojiet to savā labā!</p>
    </div>
    <div class="under-header">
        <h2 style="margin-top: 30px;">ATRAST LAUKUMU PĒC NOSAUKUMA</h1>
    </div>
    <div class="search">
    <form action="search_results.php" method="get">
            <label for="needle">Meklēt pēc nosaukuma</label>
            <input type="text" id="needle" name="needle">
            <button type="submit">Meklēt</button>
        </form>
    </div>
    <div class="header">
        <h1 style="margin-top: 30px;">ATRAST SPORTA LAUKUMU UZ KARTES</h1>
    </div>
    <div class="container" style="margin-top: 10px;">
        <iframe src="karte.php" width="100%" height="700px" frameborder="0"></iframe>
    </div>

    <footer>
        Autors: Nikolajs Govrovs <br> 2024. gads
    </footer>
</body>
</html>
