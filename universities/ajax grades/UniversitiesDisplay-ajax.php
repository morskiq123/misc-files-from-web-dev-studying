<!DOCTYPE HTML>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title> AJAX University query </title>
<link rel="stylesheet" href="test.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

<?php
//             \\
// DISCIPLINES \\
//             \\

$universityID = $_POST['universityID'];

$conn = mysqli_connect('localhost', 'root', '');
if (!$conn){
    die('Could not connect: ' . mysqli_error($conn));
};

$db_selected = mysqli_select_db($conn, 'universitytable');
if (!$db_selected){
    die ("Can't use database: " . mysqli_error($conn));
};

$dNames = "SELECT id, `name`
FROM disciplines WHERE	university_id = $universityID";

$dResults = mysqli_query($conn, $dNames) or die(mysqli_error($conn));
$dNamesDumped = [];

while ($row = mysqli_fetch_assoc($dResults)){
    $dNamesDumped[]=$row;
  };

mysqli_close($conn);

?>

<p> Select discipline </p>
  <form name = disciplines method = "POST">
  <select id = "disciplinesForGrades" name = "disciplineIDsForGrades">

<?php
      foreach($dNamesDumped as $i){
        echo "<option value=".$i['id'] . ">" .$i['name']."</option>";
      };

?>

  </form>
</body>
</html>
