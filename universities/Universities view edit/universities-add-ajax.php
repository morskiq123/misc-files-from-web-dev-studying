<form id = "add" name = "add" method = "POST" action = "<?php echo $_SERVER['PHP_SELF']; ?>">
  University name<br/><input id = "uniName" type = "input" name="uniName"><br/>
  University position<br/><input id = "uniPos"type = "input" name="uniPos"><br/>
  <input id = "submit" type = "submit" value="Submit">
</form>

<script>
$("#submit").on("click",function(e){
  e.preventDefault();
  addUni();
})
function addUni(){
  var uniPos = document.getElementById("uniPos").value;
  var uniName = document.getElementById("uniName").value;
  $.ajax({
    type: "POST",
    url: "add-sql.php",
    data: "uniName="+uniName+"&uniPos="+uniPos,
    success: function(add){
      console.log("add works")
      $("#addReturn").empty();
      $("#addReturn").append(add);
    }
  })
}
</script>
