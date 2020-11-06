<?php

$universityID = $_POST['universityID'];
echo "university id:".$universityID;
$action = htmlspecialchars(trim($_POST["action"]), ENT_QUOTES);


if ( $action == "edit"){

    $conn = mysqli_connect('localhost', 'root', '');
    if (!$conn){
        die('Could not connect: ' . mysqli_error($conn));
    };

    $db_selected = mysqli_select_db($conn, 'universitytable');
    if (!$db_selected){
        die ("Can't use database: " . mysqli_error($conn));
    };

    $sql = "SELECT `name`, pos FROM universities
            WHERE id = $universityID;";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    $uniNames = [];
    while ($row = mysqli_fetch_assoc($result)){
      $uniNames[] = $row;
    };

    foreach($uniNames as $i){
      $selectedUni = $i['name'];
      $selectedPos = $i['pos'];
    };

};
?>

<form id = "edit" name = "edit" method = "POST" action = "edit-sql.php">
  University name<br/><input id = "uniName" type = "input" name="uniName" value="<?php echo $selectedUni; ?>"><br/>
  University position<br/><input id = "uniPos" type = "input" name="uniPos" value="<?php echo $selectedPos; ?>"><br/>
  University ID<input id = "universityID" type = "hidden" name  = "universityID" value="<?php echo $universityID; ?>">
  <input id = "submit" type = "submit" value="Submit">

</form>

<script>

$("#submit").on("click",function(e){
  e.preventDefault();
  editNamePos();
})
function editNamePos(){
  var universityID = document.getElementById("universityID").value;
  var uniPos = document.getElementById("uniPos").value;
  var uniName = document.getElementById("uniName").value;
  $.ajax({
    type: "POST",
    url: "edit-sql.php",
    data: "universityID="+universityID+"&uniName="+uniName+"&uniPos="+uniPos,
    success: function(edit){
      $("#editInput").empty();
      $("#editInput").append(edit);
    }
  })
}

</script>
