<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Harjutus 6</h1>
<h2>Rida</h2>

<?php
for ($i=10; $i >= 0; $i--) {
    echo $i." ";
}



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