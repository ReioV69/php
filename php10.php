<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Harjutus 14</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" ><br><br>
    <input type="submit" value="Lae üles">
</form>

<?php
$kaust = "pildid";

// üles laadimine
if (isset($_FILES["minu_fail"])) {
    $failinimi = $_FILES["minu_fail"]["name"];
    $ext = strtolower(pathinfo($failinimi, PATHINFO_EXTENSION));
    
    // lubab ainult pildifailid
    if (in_array($ext, ["jpg", "jpeg", "png", "gif"])) {
        $asukoht = $kaust . "/" . $failinimi;
        if (move_uploaded_file($_FILES["minu_fail"]["tmp_name"], $asukoht)) {
            echo "<p>Fail laeti üles!</p>";
        } else {
            echo "<p>Midagi läks valesti.</p>";
        }
    } else {
        echo "<p>Ainult JPG, PNG või GIF failid on lubatud!</p>";
    }
}

// loeb pildid kaustast
$pildid = [];
if (is_dir($kaust)) {
    $d = opendir($kaust);
    while ($fail = readdir($d)) {
        if ($fail != "." && $fail != "..") {
            $ext = strtolower(pathinfo($fail, PATHINFO_EXTENSION));
            if (in_array($ext, ["jpg", "jpeg", "png", "gif"])) {
                $pildid[] = $fail;
            }
        }
    }
    closedir($d);
}

// suvaline pilti
if (count($pildid) > 0) {
    $randompilt = rand(0, count($pildid) - 1);
    echo "<h3>Suvaline pilt</h3>";
    echo "<img src='$kaust/" . $pildid[$randompilt] . "' style='max-width:400px;'><br><br>";
}

//  pisipildid
if (count($pildid) > 0) {
    echo "<h3>pildid</h3>";
    foreach ($pildid as $pilt) {
        echo "<div style='margin: 5px; display: inline-block; text-align: center;'>
                <a href='$kaust/$pilt' target='_blank'>
                    <img src='$kaust/$pilt' width='100' style='margin:5px;'>
                </a>
                <p>$pilt</p>
              </div>";
    }
}
?>

</body>
</html>