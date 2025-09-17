<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Harjutus 12</title>
</head>
<body>
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $startTime = $_POST['start_time'];
    $endTime = $_POST['end_time'];


    if (empty($startTime) || empty($endTime) || strlen($startTime) < 5 || strlen($endTime) < 5) {
        echo "Palun sisestage kehtivad ajad (hh:mm)!";
    } else {

        list($startHours, $startMinutes) = explode(':', $startTime);
        list($endHours, $endMinutes) = explode(':', $endTime);


        $startTotalMinutes = $startHours * 60 + $startMinutes;
        $endTotalMinutes = $endHours * 60 + $endMinutes;


        $durationMinutes = $endTotalMinutes - $startTotalMinutes;


        if ($durationMinutes < 0) {
            $durationMinutes += 24 * 60;
        }

        $durationHours = floor($durationMinutes / 60);
        $remainingMinutes = $durationMinutes % 60;

        echo "Sõiduaeg: " . $durationHours . " tundi ja " . $remainingMinutes . " minutit.";
    }
}
?>

<form method="post">
    Alustamise aeg (hh:mm): <input type="text" name="start_time" required><br>
    Lõppaja aeg (hh:mm): <input type="text" name="end_time" required><br>
    <input type="submit" value="Arvuta sõiduaeg">
</form>
<?php
function analyzeSalaries($filename) {
    if (!file_exists($filename) || !is_readable($filename)) {
        return "Faili ei leitud või see ei ole loetav.";
    }

    $menSalaries = [];
    $womenSalaries = [];
    
    if (($handle = fopen($filename, 'r')) !== false) {
        // Loeme CSV faili ridade kaupa
        while (($data = fgetcsv($handle, 1000, ",")) !== false) {
            $name = $data[0];
            $gender = $data[1];
            $salary = (float)$data[2];

            if ($gender === 'male') {
                $menSalaries[] = $salary;
            } elseif ($gender === 'female') {
                $womenSalaries[] = $salary;
            }
        }
        fclose($handle);
    }
}
    // Keskmiste ja kõrgeimate palkade arvutamine
    $menAverage = !empty($menSalaries) ? array_sum($menSalaries) / count($menSalaries) : 0;
    $womenAverage = !empty($womenSalaries) ? array_sum($womenSalaries) / count($womenSalaries) : 0;
    $highestMenSalary = !empty($menSalaries) ? max($menSalaries) : 0;
    $highestWomenSalary = !empty($womenSalaries) ? max($womenSalaries) : 0;

    echo "Meeste keskmine palk: " . number_format($menAverage, 2) . "<br>";
    echo "Naiste keskmine palk: " . number_format($womenAverage, 2) . "<br>";
    echo "Kõrgeim meeste palk: " . number_format($highestMenSalary, 2) . "<br>";
    echo "Kõrgeim naiste palk: " . number_format($highestWomenSalary, 2) . "<br>";

    // Diskrimineerimise kontroll
    if ($menAverage > $womenAverage) {
    }
?>
</body>
</html>