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

$synnikuupaev = new DateTime('2008-05-01');
$tana = new DateTime();   //https://www.designcise.com/web/tutorial/how-to-calculate-age-from-birthdate-in-php
$diff = $tana->diff($synnikuupaev);
$vanus = (int) $diff->format('%y');

 $today = new \DateTime('today');
        $lastDayOfYear = new \DateTime(date('Y-12-31'));
        $daysLeft = (int) $lastDayOfYear->format('z') - (int) $today->format('z');
        $isLeapYear = (bool) $today->format('L');

        echo "<br>";
//https://www.strangebuzz.com/en/snippets/calculating-the-number-of-days-until-the-end-of-the-year-with-php EI OLE AI SEE ON INTERNETIST LEITUD PHP CODE!!!!!
        echo "There are $daysLeft day(s) until the end of year!";
        echo "<br>";


echo "$vanus.Aastat vana" ;
echo "<br>";
?>
<?php
$month = (int)$date->format('m');
if ($month >= 3 && $month <= 5) {
    $season = "kevad";
    $image = "pildid/kevad.jpg";
} elseif ($month >= 6 && $month <= 8) {
    $season = "suvi";
    $image = "pildid/suvi.jpg";
} elseif ($month >= 9 && $month <= 11) {
    $season = "sügis";
    $image = "pildid/sügis.jpg";
} else {
    $season = "talv";
    $image = "pildid/talv.jpg"; 
}

echo "Aastaeg: " . $season . "<br>";
echo "<img src='$image' alt='$season' />";
?>


</body>
</html>