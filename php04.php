<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Harjutus 7</title>
</head>
<body>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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

    <H1>harjutus 7</H1>
    <h2>Tervitus</h2>
<?php
function tervitus() {
    echo "Tere päiksekene"."<br>";
}
tervitus();
tervitus();
tervitus();
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
</form>

<?php
// echo "Pindala ".rectangleS($_GET['Kylg1'],$_GET['Kylg2']);
echo "Pindala ".(isset($_GET['Kylg1'])) ? rectangleS($_GET['Kylg1'],$_GET['Kylg2']) : "Sisesta Küljed";
echo "<br>";

function ik($ik) {
    $pikkus = strlen($ik); 
    if ($pikkus == 11) {
        if (intval($ik[0]) % 2 == 0) {
            $vastus =  "Naine";
        } else {
             $vastus =  "Mees";
        }
    } else {
        $vastus =  "Vale pikkusega";
    }
    return $vastus;
}
echo ik("50804064215");
echo "<br>";


function headMotted(){
    $alused = array("Jüri", "Mari", "Uku");
    $oeldised = array("armastab", "viskab", "peeretab");
    $sihitised = array("mind", "sind", "meid");

    echo array_rand($alused)." ".$oeldised[array_rand($oeldised)]." ".$sihitised[array_rand($sihitised)];
}
headMotted();
headMotted();
headMotted();
headMotted();
headMotted();

?>
</body>
</html>