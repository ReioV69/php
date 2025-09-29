<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Harjutus 13</title>
</head>
<body>
<?php    
// kataloogi ja kuvamine
$kataloog = 'pildid';
$asukoht = opendir($kataloog);


if ($asukoht) {
    while (($rida = readdir($asukoht)) !== false) {
        if ($rida != '.' && $rida != '..') {
            $imageFileType = strtolower(pathinfo($rida, PATHINFO_EXTENSION));
            if ($imageFileType == "jpg" || $imageFileType == "jpeg") { //https://www.w3schools.com/php/php_file_upload.asp
             echo $kataloog . "/" . $rida . "<br>";
            }
        }
    }
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="minu_fail"><br>
    <input type="submit" value="Lae üles!">
</form>

<?php
// faili üleslaadimise töötlemine
if (!empty($_FILES['minu_fail']['name'])) {
    $faili_nimi = $_FILES['minu_fail']['name'];  //https://gist.github.com/taterbase/2688850
    $ajutine_fail = $_FILES['minu_fail']['tmp_name'];
    $faili_tyyp = $_FILES['minu_fail']['tmp_name'];
    $faili_tyyp = strtolower(pathinfo($faili_nimi, PATHINFO_EXTENSION));

    
    // kontrollime, kas fail on JPG või JPEG
    if ($faili_tyyp == 'jpeg' || $faili_tyyp == 'jpg') {
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
echo "<br><br>";


  $files = glob("pildid/*.*");
for ($i=1; $i<count($files); $i++)
{    // https://gist.github.com/projectxcappe/1220777/9ec6a7e62fb9d7c9a93bd834fb434d7ae25ed6f5
	$num = $files[$i];
    echo '<a href="'.$num.'" target="_blank"><img src="'.$num.'" alt="random image" width=150 height=100></a>'; //https://meta.stackoverflow.com/questions/309971/on-click-open-image-link-to-the-next-tab
}
	
?>
</body>
</html>