<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title> SQL QUERY </title>
</head>

<body>
<?php

$conn = mysqli_connect('localhost', 'root', '');
if (!$conn){
    die('Could not connect: ' . mysql_error());
}

$db_selected = mysqli_select_db($conn, 'test');
if (!$db_selected){
    die ("Can't use test: " . mysqli_error($conn));
};

$sql = "SELECT `desc`
        FROM contacts
        WHERE id = 1";
$result = mysqli_query($conn, $sql);
$resultDumped = [];

if (mysqli_num_rows($result) == 0){
  echo "not working :(";
}
  else {
     ($row = mysqli_fetch_assoc($result));
      $resultDumped[]=$row;
  };

mysqli_close($conn);
?>

<div id="results">
  <?php
  var_dump($resultDumped);
  ?>
</div>

</body>
</html>
