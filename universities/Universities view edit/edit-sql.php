<?php

$universityID = intval($_POST['universityID']);
$uniPos = intval($_POST['uniPos']);
$uniName = $_POST['uniName'];
$uniName = "'".$uniName."'";



$conn = mysqli_connect('localhost', 'root', '');
if (!$conn){
    die('Could not connect: ' . mysqli_error($conn));
};

$db_selected = mysqli_select_db($conn, 'universitytable');
if (!$db_selected){
    die ("Can't use database: " . mysqli_error($conn));
};

//
//  EDIT SQL QUERY (UPDATE)
//


$sql ="UPDATE universities SET `name` = $uniName, `pos` = $uniPos
       WHERE id = $universityID";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

if ($result == true){
  echo "Edit made.";
};

?>
