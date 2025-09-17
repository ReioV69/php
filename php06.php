<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Harjutus 9</title>
</head>
<body>
<h1>Harjutus 9</h1>
<?php

function formatName($name) {
    $name = strtolower($name);
    return ucfirst($name); 
}


function addDots($word) {
    return implode('.', str_split(strtoupper($word)));
}


function replaceProfanity($message) {
    $profanities = ['noob', 'idiot', 'stupid', 'vittu', 'perse', 'jobi'];
    return preg_replace('/\b(' . implode('|', $profanities) . ')\b/i', '***', $message);
}


function generateEmail($firstName, $lastName) {
    $firstName = str_replace(['ä', 'ö', 'ü', 'õ'], ['a', 'o', 'y', 'o'], strtolower($firstName));
    $lastName = str_replace(['ä', 'ö', 'ü', 'õ'], ['a', 'o', 'y', 'o'], strtolower($lastName));
    return $firstName . '.' . $lastName . '@hkhk.edu.ee';
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $message = $_POST['message'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];


    $formattedName = formatName($name);
    echo "Tere, " . $formattedName . "!<br>";


    $dottedWord = addDots($message);
    echo "Tükeldatud sõna: " . $dottedWord . "<br>";

    
    $cleanMessage = replaceProfanity($message);
    echo "Sõnum: " . $cleanMessage . "<br>";


    $email = generateEmail($firstName, $lastName);
    echo "E-post: " . $email . "<br>";
}
?>

<form method="post">
    Nimi: <input type="text" name="name" required><br>
    Sõnum: <input type="text" name="message" required><br>
    Eesnimi: <input type="text" name="first_name" required><br>
    Perenimi: <input type="text" name="last_name" required><br>
    <input type="submit" value="Saada">
</form>

</body>
</html>