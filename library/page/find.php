<?php
if($_SESSION['username'] == null){
    header("Location:./");
}
?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>尋找書目</title>
  
  
  
      <link rel="stylesheet" href="./css/style.css">
      
    
</head>

<body>

<h1 class='title'>尋找書目</h1>
<div>
<form method="POST" name="form1">
書籍名稱:<br/> <input class="text" type="text" id="t1" name="bookTitle" ><br/>
  
<input class='button' type ="button" onclick="go('./findBook');" value="尋找書目"></input><br>
<hr><input class='back' type ="button" onclick="history.back();" value="上一頁"></input><br>
</form> 
</div>
    <script  src="js/index.js"></script>

</body>

</html>
