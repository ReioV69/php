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
if ($_POST) {
    $tollid = $_POST['tollid'];
    $sentimeetrid = round($tollid * 2.54, 2);
}



?>
<form action="#" method="post">
  <label>Sisesta tollid</label>
    Tollid: <input type="number" name="tollid" step="0.01" min="0">
    <button type="submit">teisenda</button>
</form>

<?php
if (isset($sentimeetrid)) {
    echo "<p>$tollid tolli on $sentimeetrid sentimeetrit</p>";
}
?>



$kokku = 100;
$veerge = 10;
$i = 0;
?>

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
