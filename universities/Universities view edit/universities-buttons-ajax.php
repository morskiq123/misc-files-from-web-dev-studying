
<?php
  function dbg($str){
    print("<pre>");
    print_r($str);
    print("</pre>");
  }
  $conn = mysqli_connect('localhost', 'root', '');
  if (!$conn){
      die('Could not connect: ' . mysqli_error($conn));
  };

  $db_selected = mysqli_select_db($conn, 'universitytable');
  if (!$db_selected){
      die ("Can't use database: " . mysqli_error($conn));
  };

//
// SELECTED UNIVERSITY : UNI NAME
//

$universityID = $_POST['univerisityID'];
$action = htmlspecialchars(trim($_POST["action"]), ENT_QUOTES);

if ( $action == "view"){

  $sql = "SELECT `name` FROM universities
          WHERE id = $universityID;";
  $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

  $uniNames = [];
  while ($row = mysqli_fetch_assoc($result)){
    $uniNames[] = $row;
  };

  foreach($uniNames as $i){
    $selectedUni = $i['name'];
  };

  echo "SELECTED UNIVERSITY: ".$selectedUni."<br/>";
  ?>



  <button id = "buttonEdit"> Edit </button>
  <button id = "buttonDelete"> Delete </button>

  <!-- DELETE BUTTON SCRIPT -->

  <script>
    $("#buttonDelete").on("click",function(){
        confirmation()
    })
    function confirmation(){
      console.log("universityID=<?php echo $universityID;?>&action=delete");
      if (confirm("Are you sure you want to delete <?php echo $selectedUni."?";?>")){
        $.ajax({
          type: "POST",
          url: "universities-buttons-ajax.php",
          data: "universityID=<?php echo $universityID;?>&action=delete",
          success: function(html){
            console.log(html);
          }
        });

      };
    };
  </script>
<?php
}
?>
<?php
  //
  // DELETE BUTTON SQL
  //


  if ( $action == "delete" ){
    $universityDeleteID = $_POST['universityID'];
    var_dump($universityDeleteID);
    $sql = "DELETE FROM universities WHERE id = $universityDeleteID;";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
  }
?>
<!-- EDIT BUTTON SCRIPT -->

  <script>

  $("#buttonEdit").on("click",function(){
    beginEdit()
  })
  function beginEdit(){
    var universityID = "<?php echo $_POST['univerisityID']; ?>";
    console.log(universityID)
    $.ajax({
      type: "POST",
      url: "universities-edit-ajax.php",
      data: "universityID="+universityID+"&action=edit",
      success: function(edit){
        $("#editInput").empty();
        $("#editInput").append(edit);
      }
    })
  }

  </script>
