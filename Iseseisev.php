<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iseseisev</title>
</head>
<body>
    <h2>Tekst ja tingimused</h2>
    <?php
echo 'Juhan Liiv, "Ääremärkused"';
?>
<h1>Harjutus: tollid → sentimeetrid</h1>
<?php
if (!empty($_POST['tollid'])) {
    $tulemus = round((float)$_POST['tollid'] * 2.54, 2) . ' cm';
}
?>
<form method="post">
  <label>Tollid</label><br>
  <input type="number" name="tollid" step="0.01" min="0" value="<?php echo htmlspecialchars($_POST['tollid'] ?? ''); ?>" required>
  <button type="submit">Teisenda</button>
</form>

<?php if (!empty($tulemus)): ?>
  <p>Tulemus: <strong><?php echo $tulemus; ?></strong></p>
<?php endif; ?>


<h2>Redel su sitt on vedel

</h2>
<?php

function redeli_pikkus($soovitud_korgus_cm) {
    $sisemine = 15;
    $vahe = 25;

    $h = floatval($soovitud_korgus_cm);
    if ($h <= 0) return 0.00;

    $kasutatav = $h - 2 * $sisemine;
    if ($kasutatav <= 0) {
        return round($h + 2 * $sisemine, 2);
    }

    $pulki = ceil($kasutatav / $vahe) + 1;
    $kattev = ($pulki - 1) * $vahe + 2 * $sisemine;
    return round($kattev, 2);
}

$tulemus = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $korgus = $_POST['korgus'] ?? '';
    if ($korgus !== '') {
        $tulemus = redeli_pikkus($korgus) . ' cm';
    } else {
        $tulemus = 'Sisesta kõrgus.';
    }
}
?>


<div class="box">
  <form method="post" action="">
    <label>Soovitud kõrgus (cm)</label>
    <input type="number" name="korgus" step="0.1" min="0" value="<?php echo isset($_POST['korgus']) ; ?>" required>
    <button type="submit">Arvuta</button>
  </form>
</div>

<?php if ($tulemus !== ''): ?>
  <div class="results">Vajalik redeli pikkus: <strong><?php echo $tulemus; ?></strong></div>
<?php endif; ?>
<h1>Tärnid</h1>
<?php
$kokku = 100;
$veerge = 10;
$i = 0;
?>
<head>
<meta charset="utf-8">

</head>


<table>
  <tr>
<?php
for ($n = 1; $n <= $kokku; $n++) {
    echo '<td>*</td>';
    $i++;
    if ($i % $veerge == 0 && $n < $kokku) echo "</tr>\n<tr>\n";
}
?>

<?php
$nimed = ['Jüri','Mari','Kati','Mati','Juuli','Maali'];
$ajad  = [11.5,10.7,9.5,11.7,10.2,9.4];

$jooksjad = [];
for ($i=0; $i<count($nimed); $i++) {
    $jooksjad[$nimed[$i]] = $ajad[$i];
}

asort($jooksjad);

echo "<h1>Esikolmik (60 m)</h1>";
$koht = 1;
foreach ($jooksjad as $nimi => $aeg) {
    echo $koht . ". koht — " . $nimi . " (" . $aeg . " s)<br>";
    if ($koht++ == 3) break;
}
?>
<h1>Tärnid</h1>
</body>
</html>