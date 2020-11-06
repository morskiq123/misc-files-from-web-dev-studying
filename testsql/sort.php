<!DOCTYPE HTML>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title> Sorting algorithm </title>
<link rel="stylesheet" href="test.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

<?php

$conn = mysqli_connect('localhost', 'root', '');
if (!$conn){
    die('Could not connect: ' . mysqli_error($conn));
};

$db_selected = mysqli_select_db($conn, 'universitytable');
if (!$db_selected){
    die ("Can't use test : " . mysqli_error($conn));
};

$getValue = $_GET['numbers'];
echo $getValue;

if (is_numeric($getValue)){
  $getValue = intval($getValue);
  $insert = "INSERT INTO numbers(value) VALUES ($getValue)";
  $result = mysqli_query($conn, $insert) or die(mysqli_error());

};

else{
  echo " is an invalid type value";
};

$tableValues=[];

$selectValues = "SELECT value FROM numbers";
$selectValuesResult = mysqli_query($conn, $selectValues) or die(mysqli_error());


while ($row = mysqli_fetch_assoc($selectValuesResult))
  {
    $tableValues[]=$row;
};

echo "<br/>";
print_r($tableValues);


?>

</body>
</html>
