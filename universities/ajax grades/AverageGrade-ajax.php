<!DOCTYPE HTML>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title> AJAX University query </title>
<link rel="stylesheet" href="test.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<?php

$disciplineID = $_POST['disciplineIDsForGrades'];

$conn = mysqli_connect('localhost', 'root', '');
if (!$conn){
    die('Could not connect: ' . mysqli_error($conn));
};

$db_selected = mysqli_select_db($conn, 'universitytable');
if (!$db_selected){
    die ("Can't use database: " . mysqli_error($conn));
};

$dGrades = "SELECT id,	grade FROM students
            WHERE discipline_id = $disciplineID";

$dResults = mysqli_query($conn, $dGrades) or die(mysqli_error($conn));
$dGradesDumped = [];

while ($row = mysqli_fetch_assoc($dResults)){
    $dGradesDumped[] = $row;
  };

$len = sizeof($dGradesDumped);

$gradeSum = 0;
foreach($dGradesDumped as $i){
  $i['grade'] = intval($i['grade']);
  $gradeSum += $i['grade'];
};

$gradeSum = $gradeSum / $len;
echo "<p> The average grade is ".$gradeSum ."</p>";

mysqli_close($conn);

?>
