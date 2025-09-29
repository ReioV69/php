<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Harjutus 14</title>
</head>
<body>

<?php
$kaust = "pildid";

// pisipildid

$images = scandir($kaust);
$ignore = Array(".", "..");
foreach($images as $curimg){ //https://stackoverflow.com/questions/11903289/pull-all-images-from-a-specified-directory-and-then-display-them
    if(!in_array($curimg, $ignore)) {
        echo "<img src='pildid/$curimg' style='max-width:200px;'><br>\n";
        echo '<a href= "' . $kaust . '/' . '" target="_blank">' . $curimg . '</a><br>';
    }
}

//suvaline pilt
function RandImg($kaust)
{
    $images = glob($kaust . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
    $randomImage = $images[array_rand($images)];
    echo "<h3>Suvaline pilt</h3>"; //https://www.daniweb.com/programming/web-development/threads/93565/display-random-images-from-folder
    echo "<img src='" . $randomImage . "' style='max-width:400px;'><br>";
}
RandImg("pildid/");








?>

</body>
</html>