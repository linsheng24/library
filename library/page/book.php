<?php
if($_SESSION['pv'] != 1){
    header("Location:./");
}

?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>管理書目</title>
  
  
  
      <link rel="stylesheet" href="./css/style.css">

  
</head>

<body>
  <div>
  <h1 class='title'>管理書目</h1><br/><hr>

<form method="POST" name="form1">
書籍ID:<br/> <input class="text" type="text" name="bookId" ><br/>
分館ID:<br/> <input class="text" type="text" name="branch" ><br/>
數量:<br/> <input class="text" type="text" name="ammount" ><br/>
<input class='button' type ="button" onclick="go('./delBook');" value="刪除書籍"></input><br>
<input class='button' type ="button" onclick="go('./addBook');" value="添加書籍"></input><br>

<hr>

新分館代號:<br/> <input class="text" type="text" name="newbranch" ><br/>
<input class='button' type ="button" onclick="go('./moveBook');" value="轉移分館"></input><br>

<hr><input class='back' type ="button" onclick="history.back();" value="上一頁"></input><br>

</form>
</div>  
  

    <script  src="js/index.js"></script>




</body>

</html>
