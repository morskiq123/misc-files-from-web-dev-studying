<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title> Percentage Grade - Formula </title>
</head>

<body>

<?php
$discplineID = $_GET['disciplineID'];
$universityID = $_GET['universityID'];


$conn = mysqli_connect('localhost', 'root', '');
if (!$conn){
    die('Could not connect: ' . mysqli_error($conn));
};

$db_selected = mysqli_select_db($conn, 'universitytable');
if (!$db_selected){
    die ("Can't use database: " . mysqli_error($conn));
};

$dGrades = "SELECT grade FROM students
            WHERE students.discipline_id = $discplineID";

$dResults = mysqli_query($conn, $dGrades) or die(mysqli_error($conn));
$dGradesDumped= [];

while ($row = mysqli_fetch_assoc($dResults)){
    $dGradesDumped[]=$row;
};
echo "<br/>";
var_dump($dGradesDumped);

$len = sizeof($dGradesDumped);

$gradeSum = 0;
foreach ($dGradesDumped as $i){
  $i['grade'] = intval($i['grade']);
  $gradeSum += $i['grade'];
  echo $gradeSum. "\n";
};

// average grade ↓↓

echo "<br/>";
$averageGrade = $gradeSum / $len;
echo $averageGrade;

mysqli_close($conn);

?>
</body>
</html>
