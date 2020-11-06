<?php

$uniName = $_POST['uniName'];
$uniPos = intval($_POST['uniPos']);
$uniName = "'".$uniName."'";

echo "name: " .$uniName. "\n pos: " .$uniPos;

$conn = mysqli_connect('localhost', 'root', '');
if (!$conn){
    die('Could not connect: ' . mysqli_error($conn));
};

$db_selected = mysqli_select_db($conn, 'universitytable');
if (!$db_selected){
    die ("Can't use database: " . mysqli_error($conn));
};

$sql = "INSERT INTO universities (`name`, `pos`)
        VALUES ($uniName, $uniPos)";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

if ($result == true){
  echo "Added.";
};

?>
