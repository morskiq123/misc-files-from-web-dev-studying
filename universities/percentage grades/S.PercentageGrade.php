<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title> Percentage Grade - Form </title>
</head>

<body>
<?php

$conn = mysqli_connect('localhost', 'root', '');
if (!$conn){
    die('Could not connect: ' . mysqli_error($conn));
};

$db_selected = mysqli_select_db($conn, 'universitytable');
if (!$db_selected){
    die ("Can't use database: " . mysqli_error($conn));
};

$uName = "SELECT id, name FROM universities";
$uNameResults = mysqli_query($conn, $uName);

$uNameDumped = [];
while ($row = mysqli_fetch_assoc($uNameResults)){
  $uNameDumped[] = $row;
};

//var_dump($uNameDumped);

$dName = "SELECT id, name FROM disciplines";
$dNameResults = mysqli_query($conn, $dName);

$dNameDumped = [];
while ($row = mysqli_fetch_assoc($dNameResults)){
  $dNameDumped[] = $row;
};

//var_dump($dNameDumped);

mysqli_close($conn);
?>

<form name = "universities" action = "F.PercentageGrade.php" method = "GET">
  <br/>
  <p> Select university </p>
  <select name = "universityID">
  <?php
  foreach($uNameDumped as $i){
  echo "<option value=".$i['id'] . ">" .$i['name']."</option>";
  };
  ?>
  </select>
  <p> Select discipline </p>
  <select name = "disciplineID">
  <?php
  foreach($dNameDumped as $i){
  echo "<option value=".$i['id'] . ">" .$i['name']."</option>";
  };
  ?>
  </select>
  <br/>
  <input type = submit value = "Submit">

</form>




</body>
</html>
