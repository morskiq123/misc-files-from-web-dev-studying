<!DOCTYPE HTML>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title> Work HTML </title>
<link rel="stylesheet" href="test.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<?php
$conn = mysqli_connect('localhost', 'root', '');
if (!$conn){
    die('Could not connect: ' . mysql_error());
}

$db_selected = mysqli_select_db($conn, 'test');
if (!$db_selected){
    die ("Can't use test : " . mysqli_error($conn));
};

$sql = "SELECT * FROM testTable";
$result = mysqli_query($conn, $sql);
$resultDumped = [];

if (mysqli_num_rows($result) == 0){
  echo "not working :(";
}
  else {
    while ($row = mysqli_fetch_assoc($result))
      {
        $resultDumped[]=$row;
    };
  };

mysqli_close($conn);
?>

<div class = "imgContainer">
  <img src="logo.png" alt="logo" width = 20%>
</div>

<div class = "tableColor">
  <div class = "tableContainer">
    <ul class= "headings">
      <?php
      foreach($resultDumped as $i){
        echo "<li>".$i['name']."</li>";
        if($i['id'] == 4){
          echo "<li><a href='#' id=link>".$i['name']."</a></li>";
        };
      };
    ?>
   </div>
</div>

<script>
$(document).ready(function(){
  $("#link").click(function(event){
    console.log(123)
    event.preventDefault();
    $.ajax({
      url: "sqlQuery.php",
      type: "POST",
      success: function(html){
          $('#results').empty();
        $('#results').append(html);
      },
      error: function(p){
        console.log(p)
      }
    });
  });
});

</script>
<div id="results">This is where AJAX will appear</div>

<form action="sort.php" method="">
  <input type="text" name="numbers" id="numbers"> <br>
  <input type="submit" value="Submit">
</form>


</body>
</html>
