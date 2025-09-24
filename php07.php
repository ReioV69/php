<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Harjutus 12</title>
</head>
<body>
  <h1>Harjutus 12</h1>
<form action="" method="get">
    Alustamise aeg: <input type="time" name="start" required><br>
    Lõppaja aeg: <input type="time" name="finish" required><br>
    <input type="submit" value="Leia aeg">
</form>

<?php
if (isset($_GET["start"]) && isset($_GET["finish"])) {
    $start = strtotime($_GET["start"]);
    $finish = strtotime($_GET["finish"]);

    if ($start !== false && $finish !== false) {
        $diff = abs($start - $finish);
        $hours = intdiv($diff, 3600);
        $minutes = intdiv(($diff % 3600), 60);
        echo "Sõiduaeg: " . sprintf("%02d:%02d", $hours, $minutes);
    } else {
        echo "Aja sisestamisel tekkis viga.";
    }
}
?>

<br>

<?php
$allikas = 'tootajad.csv';
$mpalk = 0; 
$npalk = 0;
$mkokku = 0; 
$nkokku = 0;

if (($fail = fopen($allikas, 'r')) !== false) {
    while (($rida = fgetcsv($fail, 1000, ";")) !== false) {
        if (count($rida) < 3) ;
        if ($rida[1] == "m") {
            $mkokku++;
            $mpalk += (float)$rida[2];
        } else {
            $nkokku++;
            $npalk += (float)$rida[2];
        }
    }
    fclose($fail);

    if ($mkokku > 0 && $nkokku > 0) {
        $avg_m = $mpalk / $mkokku;
        $avg_n = $npalk / $nkokku;

        if ($avg_m > $avg_n) {
            echo "Naisi ahistatakse";
        } elseif ($avg_m < $avg_n) {
            echo "Mehi ahistatakse";
        } else {
            echo "Ahistamine on mõlemal sama.";
        }
    } else {
        echo "Andmeid ei leitud.";
    }
} else {
    echo "Ei leia faili!";
}
?>
