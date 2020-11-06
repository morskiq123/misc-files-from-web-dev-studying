<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="style.css">
<title> test .animate() </title>
</head>

<body>

<div class="container">
  <div class="percentage">hi</div>
</div>

<script>
$(document).ready(function(){
  $('.percentage:eq(0)').animate({width:'15%'}, 1000)
});
</script>
<br/>
<div class="container">
  <div class="percentage">hi</div>
</div>

<script>
$(document).ready(function(){
  $('.percentage:eq(1)').animate({width:'30%'}, 1000)
});
</script>
<br/>
<div class="container">
  <div class="percentage">hi</div>
</div>

<script>
$(document).ready(function(){
  $('.percentage:eq(2)').animate({width:'60%'}, 1000)
});
</script>



    GRADE 60-70: <br/>    <div class="container">
      <div class="percentage">17% </div>
    </div>
    <script>
    $(document).ready(function(){

   $('.percentage:eq(3)')  .animate({width:'17%'}, 1000)});
    </script>


        GRADE 70-80: <br/>    <div class="container">
          <div class="percentage">17% </div>
        </div>
        <script>
        $(document).ready(function(){

       $('.percentage:eq(4)')  .animate({width:'40%'}, 1000)});
        </script>


</body>
</html>
