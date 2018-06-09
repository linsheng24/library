<?php
if($_SESSION['pv'] != 1){
    header("Location:./");
}

?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>逾期查詢</title>
  
  
  
      <link rel="stylesheet" href="./css/style.css">

  
</head>

<body>

  <h1 class='title'>逾期查詢</h1>
<div>
<form method="POST" name="form1">
<input class='button' type ="button" onclick="go('./overUser');" value="查詢逾期人員名單"></input><br>
<hr>
分館ID:<br/> <input class="text" type="text" name="branchId" ><br/>
<input class='button' type ="button" onclick="go('./overBook');" value="查詢逾期書籍名單"></input><br>
<hr><input class='back' type ="button" onclick="history.back();" value="上一頁"></input><br>
</form>
</div>
    <script  src="js/index.js"></script>

</body>

</html>
