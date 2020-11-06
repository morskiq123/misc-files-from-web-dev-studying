<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="style.css">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title> Universities view & edit </title>
</head>

<body>

<br/>
<div class = "backgroundContainer">
  <div class = "headerContainer">
    <ul>
      <li class="headings"><button id = "universityView"> View </button></li>
      <li class="headings"><button id = "addUniversity"> Add </button></li>
    </ul>
   </div>
</div>
<div id = "addButtons" class="addButtons">add fields</div>
<div id = "addReturn" class="addButtons">add return</div>
<br>

<div class = "viewContainer">
  <div id = "universityNames" class = "universityNames"></div>
  <div id = "buttons" class = "buttons">BUTTONS+UNI</div>
  <div id = "editInput" class = "editInput">edit INPUT</div>
</div>


<script>
// ADD BUTTON
$(document).ready(function(){
  $("#addUniversity").click(function(event){
    event.preventDefault();
    $.ajax({
      url:"universities-add-ajax.php",
      type:"POST",
      success: function(add){
        $("#addButtons").empty();
        $("#addButtons").append(add);
      }
    })
  })
  // VIEW BUTTON
  $("#universityView").click(function(event){
    $.ajax({
      url:"universities-view-ajax.php",
      type: "POST",
      success: function(view){
        $("#universityNames").empty();
        $("#universityNames").append(view);
        $(".buttonUniversity").click(function(event){
          var use_id = $(this).attr("data-id");
          console.log(use_id)
          $.ajax({
            url:"universities-buttons-ajax.php",
            data:"univerisityID="+use_id+"&action=view",
            type: "POST",
            success: function(select){
              $("#buttons").empty();
              $("#buttons").append(select);
              console.log(select)
            }
          })
        })
      }
    })
  })
});
</script>



</body>
</html>
