<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="style.css">
<title> Percentage Grade - Formula </title>
</head>

<body>

<?php

$discplineID = $_GET['disciplineID'];


$conn = mysqli_connect('localhost', 'root', '');
if (!$conn){
    die('Could not connect: ' . mysqli_error($conn));
};

$db_selected = mysqli_select_db($conn, 'universitytable');
if (!$db_selected){
    die ("Can't use database: " . mysqli_error($conn));
};

$sql = "SELECT grade FROM students
        WHERE discipline_id = $discplineID";
$result = mysqli_query($conn, $sql);

$grades = [];
while ($row = mysqli_fetch_assoc($result)){
    $grades[] = $row;
};

var_dump($grades);
$len = sizeof($grades);

foreach($grades as $i){

  if ($i['grade'] >= 1 && $i['grade'] <= 10){
    $oneTen += 1;
  };
  if ($i['grade'] >= 10 && $i['grade'] <= 20){
    $tenTwenty += 1;
  };
  if ($i['grade'] >= 20 && $i['grade'] <= 30){
    $twentyThirty += 1;
  };
  if ($i['grade'] >= 30 && $i['grade'] <= 40){
    $thirtyFourty += 1;
  };
  if ($i['grade'] >= 40 && $i['grade'] <= 50){
    $fourtyFifty += 1;
  };
  if ($i['grade'] >= 50 && $i['grade'] <= 60){
    $fiftySixty += 1;
  };

  if ($i['grade'] >= 60 && $i['grade'] <= 70){
      $sixtySeventy += 1;
  };
  if ($i['grade'] >= 70 && $i['grade'] <= 80){
      $seventyEighty += 1;
  };
  if ($i['grade'] >= 80 && $i['grade'] <= 90){
      $eightyNinety += 1;
  };
  if ($i['grade'] >= 90 && $i['grade'] <= 100){
      $ninetyHundred += 1;
  };
  };
  ?>
  <!-- ANIMATIONS -->

  <?php
  $count = 0;
  if($oneTen > 0){
    $oneTen = $oneTen / $len;
    $oneTenPercents = round($oneTen,2) * 100;
    echo "GRADE 0-10: <br/>";
    ?>
    <div class="container">
      <div class="percentage"><?php echo $oneTenPercents ."%"; ?> </div>
    </div>
    <script>
    $(document).ready(function(){
   $('.percentage:eq(<?php echo $count; ?>)')  <?php echo ".animate({width:"."'$oneTenPercents" ."%'"."}".", 1000)";?>});
    </script>
    <?php
    $count += 1;
  };

  if($tenTwenty > 0){
    $tenTwenty = $tenTwenty / $len;
    $tenTwentyPercents = round($tenTwenty,2) * 100;
    echo "GRADE 10-20: <br/>";
    ?>
    <div class="container">
      <div class="percentage"><?php echo $tenTwentyPercents ."%"; ?> </div>
    </div>
    <script>
    $(document).ready(function(){
   $('.percentage:eq(<?php echo $count; ?>)') <?php echo ".animate({width:"."'$tenTwentyPercents" ."%'"."}".", 1000)";?>});
    </script>

    <?php
    $count += 1;
  };
  if($twentyThirty > 0){
    $twentyThirty = $twentyThirty / $len;
    $twentyThirtyPercents = round($twentyThirty,2) * 100;
    echo "GRADE 20-30: <br/>";
    ?>
    <div class="container">
      <div class="percentage"><?php echo $twentyThirtyPercents ."%"; ?> </div>
    </div>
    <script>
    $(document).ready(function(){

   $('.percentage:eq(<?php echo $count; ?>)')  <?php echo ".animate({width:"."'$twentyThirtyPercents" ."%'"."}".", 1000)";?>});
    </script>

    <?php
    $count += 1;
  };
  if($thirtyFourty > 0){
    $thirtyFourty = $thirtyFourty / $len;
    $thirtyFourtyPercents = round($thirtyFourty,2) * 100;
    echo "GRADE 30-40: <br/>";
    ?>
    <div class="container">
      <div class="percentage"><?php echo $thirtyFourtyPercents ."%"; ?> </div>
    </div>
    <script>
    $(document).ready(function(){

   $('.percentage:eq(<?php echo $count; ?>)')  <?php echo ".animate({width:"."'$thirtyFourtyPercents" ."%'"."}".", 1000)";?>});
    </script>

    <?php
    $count += 1;
  };
  if($fourtyFifty > 0){
    $fourtyFifty = $fourtyFifty / $len;
    $fourtyFiftyPercents = round($fourtyFifty,2) * 100;
    echo "GRADE 40-50: <br/>";
    ?>
    <div class="container">
      <div class="percentage"><?php echo $fourtyFiftyPercents ."%"; ?> </div>
    </div>
    <script>
    $(document).ready(function(){

   $('.percentage:eq(<?php echo $count; ?>)')  <?php echo ".animate({width:"."'$fourtyFiftyPercents" ."%'"."}".", 1000)";?>});
    </script>

  <?php
  $count += 1;
  };
  if($fiftySixty > 0){
    $fiftySixty = $fiftySixty / $len;
    $fiftySixtyPercents = round($fiftySixty,2) * 100;
    echo "GRADE 50-60: <br/>";
    ?>
    <div class="container">
      <div class="percentage"><?php echo $fiftySixtyPercents ."%"; ?> </div>
    </div>
    <script>
    $(document).ready(function(){

   $('.percentage:eq(<?php echo $count; ?>)')  <?php echo ".animate({width:"."'$fiftySixtyPercents" ."%'"."}".", 1000)";?>});
    </script>

    <?php
    $count += 1;
  };
  if($sixtySeventy > 0){
    $sixtySeventy = $sixtySeventy / $len;
    $sixtySeventyPercents = round($sixtySeventy,2) * 100;
    echo "GRADE 60-70: <br/>";
    ?>
    <div class="container">
      <div class="percentage"><?php echo $sixtySeventyPercents ."%"; ?> </div>
    </div>
    <script>
    $(document).ready(function(){

   $('.percentage:eq(<?php echo $count; ?>)')  <?php echo ".animate({width:"."'$sixtySeventyPercents" ."%'"."}".", 1000)";?>});
    </script>

    <?php
    $count += 1;
  };
  if($seventyEighty > 0){
    $seventyEighty = $seventyEighty / $len;
    $seventyEightyPercents = round($seventyEighty,2) * 100;
    echo "GRADE 70-80: <br/>";
    ?>
    <div class="container">
      <div class="percentage"><?php echo $seventyEightyPercents ."%"; ?> </div>
    </div>
    <script>
    $(document).ready(function(){

   $('.percentage:eq(<?php echo $count; ?>)')  <?php echo ".animate({width:"."'$seventyEightyPercents" ."%'"."}".", 1000)";?>});
    </script>

    <?php
    $count += 1;
  };
  if($eightyNinety > 0){
    $eightyNinety = $eightyNinety / $len;
    $eightyNinetyPercents = round($eightyNinety,2) * 100;
    echo "GRADE 80-90: <br/>";
    ?>
    <div class="container">
      <div class="percentage"><?php echo  $eightyNinetyPercents ."%"; ?> </div>
    </div>
    <script>
    $(document).ready(function(){

   $('.percentage:eq(<?php echo $count; ?>)')  <?php echo ".animate({width:"."'$eightyNinetyPercents" ."%'"."}".", 1000)";?>});
    </script>

    <?php
    $count += 1;
  };
  if($ninetyHundred > 0){
    $ninetyHundred = $ninetyHundred / $len;
    $ninetyHundredPercents = round($ninetyHundred,2) * 100;
    echo "GRADE 90-100: <br/> ";
    ?>
    <div class="container">
      <div class="percentage"><?php echo $ninetyHundredPercents ."%"; ?> </div>
    </div>
    <script>
    $(document).ready(function(){

   $('.percentage:eq(<?php echo $count; ?>)')  <?php echo ".animate({width:"."'$ninetyHundredPercents" ."%'"."}".", 1000)";?>});
    </script>
    <?php
    $count += 1;
  };
?>





</body>
</html>
