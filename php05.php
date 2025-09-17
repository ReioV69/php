<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Harjutus 8</title>
</head>
<body>
    <h1>Harjutus 8</h1>

    <?php

$date = new DateTime('2023-03-20 17:31');


echo "Kuupäev ja kellaaeg: " . $date->format('d.m.Y H:i') . "<br>";

$birthDate = new DateTime('2008-04-06');
$age = $date->diff($birthDate)->y;
echo "Kasutaja vanus: " . $age . " aastat<br>";


$schoolYearEnd = new DateTime('2023-06-30'); 
$daysUntilEnd = $date->diff($schoolYearEnd)->days;
echo "Kooliaasta lõpuni on jäänud: " . $daysUntilEnd . " päeva!<br>";


$month = (int)$date->format('m');
if ($month >= 3 && $month <= 5) {
    $season = "kevad";
    $image = "pildid/kevad.jpg"; // Pilt kevade kohta
} elseif ($month >= 6 && $month <= 8) {
    $season = "suvi";
    $image = "pildid/suvi.jpg"; // Pilt suve kohta
} elseif ($month >= 9 && $month <= 11) {
    $season = "sügis";
    $image = "pildid/sügis.jpg"; // Pilt sügise kohta
} else {
    $season = "talv";
    $image = "pildid/talv.jpg"; // Pilt talve kohta
}

echo "Aastaeg: " . $season . "<br>";
echo "<img src='$image' alt='$season' />";
?>


</body>
</html>