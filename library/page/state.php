<?php
session_start();
if($_SESSION['username'] == null){
    header("Location:../");
}

?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>借閱紀錄查詢</title>
  
  
  
      <link rel="stylesheet" href="../css/style.css">

  
</head>

<body>

  <h1 class='title'>借閱紀錄查詢</h1>
<div>
<form method="POST" name="form1">
書籍ID:<br/> <input class="text" type="text" name="bookId" ><br/>
<input class='button' type ="button" onclick="go('../php/bookLoan.php');" value="查詢書目借閱狀況"></input><br>
<hr>
CardNo:<br/> <input class="text" type="text" name="cardNo" ><br/>
<input class='button' type ="button" onclick="go('../php/cardLoan.php');" value="查詢讀者借閱狀況"></input><br>
<hr>
分館ID:<br/> <input class="text" type="text" name="branchId" ><br/>
<input class='button' type ="button" onclick="go('../php/branchLoan.php');" value="查詢分館借閱狀況"></input><br>
<hr><input class='back' type ="button" onclick="history.back();" value="上一頁"></input><br>
</form>
</div> 
    <script  src="js/index.js"></script>

</body>

</html>
