<!doctype html>
<html lang="et">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Harjutus 10</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php
        include("menu.php");
        if (!empty($_GET['leht'])) {
            $leht = htmlspecialchars($_GET['leht']);
            if (is_file($leht . '.php')) {
                include($leht . '.php');
            } else {
                echo '404 Ei eksisteeri';
            }
        } else {
    ?>
        <h1>Avaleht</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus nam sint rerum veniam similique culpa minima voluptates cupiditate, vitae perspiciatis perferendis asperiores eum sequi quis non illum est odit provident?</p>
    <?php
        }
    ?>
</body>
</html>

