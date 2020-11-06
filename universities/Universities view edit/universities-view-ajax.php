<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title> Universities view & edit </title>
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

//
// UNIVERSITIES SQL
//

$sql = "SELECT id, name FROM universities";
$result = mysqli_query($conn, $sql);

$uniNames = [];
while ($row = mysqli_fetch_assoc($result)){
  $uniNames[] = $row;
};

//
// DISCIPLINES SQL
//

$sql = "SELECT id, grade FROM students";
$result = mysqli_query($conn, $sql);

$discNames = [];
while ($row = mysqli_fetch_assoc($result)){
  $discNames[] = $row;
};

mysqli_close($conn);

?>


<?php
foreach($uniNames as $i){
  echo "<a href='#' data-id='".$i['id']."' class = 'buttonUniversity'>".$i['name']."</a> <br/>";
};
?>



</body>
</html>
