<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Harjutus 14</title>
</head>
<body>
<?php
$kataloog = 'pildid';                 // piltide kataloog
$failid = array();

// loeme kataloogi ja kogume pildid
if (is_dir($kataloog)) {
    if ($dh = opendir($kataloog)) {
        while (($rida = readdir($dh)) !== false) {
            if ($rida == '.' || $rida == '..') continue;
            $ext = strtolower(pathinfo($rida, PATHINFO_EXTENSION));
            if (in_array($ext, ['jpg','jpeg','png','gif'])) {
                $failid[] = $rida;
            }
        }
        closedir($dh);
    }
}

// valime juhusliku pildi ja kuvame
if (count($failid) > 0) {
    $suvaline = $failid[array_rand($failid)];
    echo '<img src="'.$kataloog.'/'.$suvaline.'" alt="Suvaline pilt" style="max-width:100%;height:auto;">';
} else {
    echo 'Pilte ei leitud kataloogis.';
}
?>
<?php
$kataloog = 'pildid';      // kataloog, kus pisipildid asuvad
$veerge = 3;               // muutmiseks: mitu veergu
$failid = [];

// loeme pildifailid
if (is_dir($kataloog) && $dh = opendir($kataloog)) {
    while (($rida = readdir($dh)) !== false) {
        if ($rida == '.' || $rida == '..') continue;
        $ext = strtolower(pathinfo($rida, PATHINFO_EXTENSION));
        if (in_array($ext, ['jpg','jpeg','png','gif'])) {
            $failid[] = $rida;
        }
    }
    closedir($dh);
}

// kui pole faile
if (count($failid) == 0) {
    echo 'Pilte ei leitud.';
    exit;
}

// lihtne stiil: tabel veergudega (algajale lihtne)
echo '<table border="0" cellspacing="10"><tr>';

$i = 0;
foreach ($failid as $f) {
    if ($i > 0 && $i % $veerge == 0) echo '</tr><tr>'; // uus rida, kui täidetud veerud

    // kuvame pisipildi (brauser skaleerib). Lisage width/height vastavalt vajadusele.
    echo '<td align="center">';
    echo '<a href="'.$kataloog.'/'.$f.'" target="_blank">';
    echo '<img src="'.$kataloog.'/'.$f.'" alt="" style="width:150px;height:auto;display:block;">';
    echo '</a>';
    echo '</td>';

    $i++;
}

// täidame viimase rea tühjade lahtritega, et tabel välja näeks sirgjooneline
$viimased = $i % $veerge;
if ($viimased != 0) {
    for ($k = $viimased; $k < $veerge; $k++) {
        echo '<td></td>';
    }
}

echo '</tr></table>';
?>

    
</body>
</html>