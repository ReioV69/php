<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Harjutus 13</title>
</head>
<body>
<?php    
// Katalooge ja faile kuvamine
$kataloog = 'pildid';
$asukoht = opendir($kataloog);

while ($rida = readdir($asukoht)) {
    if ($rida != '.' && $rida != '..' && (strpos($rida, '.jpg') !== false || strpos($rida, '.jpeg') !== false)) {
        echo '<a href="'.$kataloog.'/'.$rida.'" target="_blank">'.$rida.'</a><br>';
    }
}
closedir($asukoht);

// Failide üleslaadimise vorm
?>
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="minu_fail"><br>
    <input type="submit" value="Lae üles!">
</form>

<?php
// Faili üleslaadimise töötlemine
if (!empty($_FILES['minu_fail']['name'])) {
    $faili_nimi = $_FILES['minu_fail']['name'];
    $ajutine_fail = $_FILES['minu_fail']['tmp_name'];
    $faili_tyyp = $_FILES['minu_fail']['type'];

    // Kontrollime, kas fail on JPG või JPEG
    if ($faili_tyyp == 'image/jpeg' || $faili_tyyp == 'image/jpg') {
        $kataloog = 'pildid';
        if (move_uploaded_file($ajutine_fail, $kataloog.'/'.$faili_nimi)) {
            echo 'Faili üleslaadimine oli edukas';
        } else {
            echo 'Faili üleslaadimine ebaõnnestus';
        }
    } else {
        echo 'Palun laadige üles ainult JPG või JPEG faile.';
    }
}
?>
</body>
</html>