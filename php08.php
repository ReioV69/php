<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Harjutus 12</title>
</head>
<body>
    <h1>harjutus 12</h1>
    <form action="">
        start: <input type="time" name="start" id=""><br>
        finish: <input type="time" name="finish" id=""><br>
        <input type="submit" value="leia aeg">
    </form>
    <?php

    $start = strtotime($_GET["start"]);
    $finish = strtotime($_GET["finish"]);

	    $diff = abs($start - $finish)/3600*60;
        echo intdiv($diff,60).":".$diff % 60;
?>
    <br><h1>.......................</h1>

 <?php
    $allikas = 'tootajad.csv';
    $minu_csv = fopen($allikas, 'r') or die('Ei leia faili!');
    $mkokku = 0;$nkokku = 0;
    $mpalk = 0; $npalk = 0;
    while(!feof($minu_csv)){
        $rida = fgetcsv($minu_csv, filesize($allikas),';');
        

        if ($rida[1] == "m") {
                $mkokku+=1;
                $mpalk += $rida[2];
            } else {
                $nkokku+=1;
                $npalk += $rida[2];
            }
    }
    if($mpalk/$mkokku>$npalk/$nkokku){
        echo "naisi ahistatakse";
    } else if($mpalk/$mkokku<$npalk/$nkokku){
        echo "mehi ahistatakse";
    } else {
        echo "võrdsed";
    }

    fclose($minu_csv);

?>




</body>
</html>