<script type="text/javascript">
  function confirmation(){
    var conf = confirm("Delete this university?");
    if (conf == true){
      <?php
      //
      //DELETE BUTTON FUNCTIONALITY
      //

      $sql = "DELETE FROM universities
              WHERE id = $universityID;";
      $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

      ?>
    }
    else{
      console.log("no delete :)");
    };
  };
</script>
