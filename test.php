<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>readContactCSV.php</title>
</head>
<body>
 <h1>Contacts</h1>
 <div>
 <?php
  print <<< HERE
  <table border = "1">
  <tr>
   <th>Nimi</th>
   <th>Hind</th>
  </tr>
HERE;
  $data = file("products.csv");
  foreach ($data as $line){
  $lineArray = explode("t", $line);
  list($nimi, $hind,) = $lineArray;
  print <<< HERE
   <tr>
   <td>$nimi</td>
   <td>$hind</td>
   </tr>
HERE;
  } // end foreach
  //print the bottom of the table
  print "</table> n";
 ?>
 </div>
</body>
</html>