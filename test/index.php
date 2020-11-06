<?php
$conn = mysqli_connect('localhost', 'root', '');
if (!$conn) {
    die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';

$db_selected = mysqli_select_db($conn, 'test');
if (!$db_selected){
  die ("Can't use test : " . mysqli_error($conn));
};

$sql = "SELECT * FROM testTable";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0){
  echo "not working :(";
}
  else {
    while ($row = mysqli_fetch_assoc($result)){
      print_r($row);
    };
  };

mysqli_close($conn);
?>
