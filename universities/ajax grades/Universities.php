<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title> Average Grade - Formula </title>
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

$uName = "SELECT id, name FROM universities";
$uNameResults = mysqli_query($conn, $uName);

$uNameDumped = [];
while ($row = mysqli_fetch_assoc($uNameResults)){
  $uNameDumped[] = $row;
};

//var_dump($uNameDumped);

$dName = "SELECT id, name FROM disciplines";
$dNameResults = mysqli_query($conn, $dName);

$dNameDumped = [];
while ($row = mysqli_fetch_assoc($dNameResults)){
  $dNameDumped[] = $row;
};

//var_dump($dNameDumped);

mysqli_close($conn);
?>

<form name = "universities" method = "POST">

  <p> Select university </p>
    <select id = university name = "universityID">
    <?php
    foreach($uNameDumped as $i){
      echo "<option value= ".$i['id'] . ">" .$i['name']."</option>";
    };
    ?>
    </select>
  <br/>

  <div id = discipline> </div>

  <div id= averageGrade> </div>

  </form>

<script>
$(document).ready(function(){
  $("#university").change (function(event){
    $.ajax({
      url:"UniversitiesDisplay-ajax.php",
      data: "universityID="+$(this).val(),
      type: "POST",
      success: function(html){
        $('#discipline').empty();
      $('#discipline').append(html)
      $("#disciplinesForGrades").change (function(event){
        $.ajax({
          url: "AverageGrade-ajax.php",
          data: "disciplineIDsForGrades="+$(this).val(),
          type: "POST",
          success: function(calc){
            console.log(calc)
            $('#averageGrade').empty();
            $('#averageGrade').append(calc);

          }
        });
      }
    )
    }
  });
});
});

</script>



</body>
</html>
