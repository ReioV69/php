<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Tüdrukud</h2>
<?php

$t = array("juuli", "Anna", "kati");
$p = array("Mihkel", "siim", "marko");

for ($i=0; $i < count ($t); $i++) {
    echo $t[$i]."-".$p[$i]."<br>";
}

?>
<h2>100ga jagunevad</h2>
<?php

    for ($i = 1; $i <= 100; $i++) {
        if ($i % 3 == 0) {
            echo $i . " ";
            echo "<br>";
        }
    }
?>
<h1>Harjutus 6</h1>
<h2>Rida</h2>

<?php
for ($i=10; $i >= 0; $i--) {
    echo $i."\n ";
}
echo "<br>"


?>

<?php

for ($i=1; $i <= 100 ; $i++) {
    echo "*";
    if ($i%10==0)
        echo "<br>";
}
echo "<br>";
?>

<?php
for ($i=1; $i <= 10 ; $i++) {
    echo "*<br>";
}

?>



<?php
for ($i=1; $i <= 10 ; $i++) {
    echo "*";
}

?>













<h1>Harjutus 6</h1>    
<h2>Genereeri</h2>
<?php
    for($i=1;  $i <= 100; $i++) {
    echo $i.".";
    if ($i%10==0) {
        echo "<br>";
    }
}

?>
</body>
</html>