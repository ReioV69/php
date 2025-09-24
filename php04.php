<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Harjutus 7</title>
</head>
<body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    
<?php
function vahemikus($a1, $a2, $s) {
    for($i=$a1; $i <= $a2; $i=$i+$s) {
        echo $i;
    }
}
echo"<br";

function createuser($u) {
    $lu = strtolower($u);
    echo $lu."@hkhk.edu.ee";
    echo "<br>";
    $p = substr(password_hash($lu, PASSWORD_BCRYPT),7,7);
    echo $p;
}

function rectangleS($a1, $a2) {
    return $a1 * $a2;
}
echo "<br>";

function uudiskiri(){
echo '<div class="row">
    <div class="col sm-2">
        <form action="">
            <input type="text" placeholder="Liitu uudiskirjaga">
            <input type="submit" value="Liitu" class="btn btn-success">
        </form>
    </div>
</div>';
}




?>

    <h2>Tervitus</h2>
<?php
function tervitus() {
    echo "Tere päiksekene"."<br>";
}
tervitus();
tervitus();
uudiskiri();
createuser("Reio");
vahemikus(2,20,3);
echo "<br>";

?>
<h2>ristküliku pindala</h2>
<form >
    külg 1<input type="number" name="Kylg1" value="10">
    külg 2<input type="number" name="Kylg2" value="10">
    <input type="submit" name="Arvuta pindala">

<?php
echo "Pindala ".rectangleS($_GET['Kylg1'],$_GET['Kylg2']);
// echo "Pindala ".(isset($_GET['Kylg1']) ? rectangleS($_GET['Kylg1'],$_GET['Kylg2']) : "Sisesta Küljed");
echo "<br>";
?>
<h2>Isikukood</h2>
<?php
function ik() {
    if(isset($_GET['isk'])) {
        $isk = $_GET['isk'];
    $pikkus = strlen($isk); 
    if ($pikkus == 11) {
        echo "Isikukood on õige pikkusega<br>";
        if (intval($isk[0]) % 2 == 0) {
            $vastus =  "Naine";
        } else {
             $vastus =  "Mees";
        }
    } else {
        $vastus =  "IK Vale pikkusega";
    }
$sugunumber = intval($isk[0]);
$aasta = substr($isk, 1, 2);
$kuu = substr($isk, 3, 2);
$paev = substr($isk, 5, 2);

if ($sugunumber == 1 || $sugunumber == 2) {
    $aasta = "18" . $aasta;
} elseif ($sugunumber == 3 || $sugunumber == 4) {
    $aasta = "19" . $aasta;
} elseif ($sugunumber == 5 || $sugunumber == 6) {
    $aasta = "20" . $aasta;
} else {
    $vastus = "Viga isikukoodis";
}

echo "Sünniaeg on: $paev.$kuu.$aasta<br>";
echo $vastus . "<br>";
}
}
ik();  
?>
<form method="#">
    <input type="number" name="isk" maxlength="11"><br>
    <input type="submit" value="Leia sünniaeg">
</form>

<?php
function headMotted(){
    $alused = array("Jüri", "Mari", "Uku");
    $oeldised = array("armastab", "viskab", "peeretab");
    $sihitised = array("mind", "sind", "meid");

    echo $alused[array_rand($alused)]." ".$oeldised[array_rand($oeldised)]." ".$sihitised[array_rand($sihitised)];
}
echo "<br>";
headMotted();

echo "<br>";




?>
</body>
</html>