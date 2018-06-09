<?php
if($_SESSION['username'] == null){
    header("Location:./");
}


?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>圖書館管理系統</title>
  
  
  
      <link rel="stylesheet" href="./css/style.css">

  
</head>

<body>
<div>
<h1 class='title'>圖書館系統</h1><br>
<hr>
<?php if($_SESSION['pv']==1) echo "<input class='button' type ='button' onclick=\"javascript:location.href='./book'\" value='管理書目'></input><br>"; ?>
<input class='button' type ="button" onclick="javascript:location.href='./state'" value="借閱查詢"></input><br>
<?php if($_SESSION['pv']==1) echo "<input class='button' type ='button' onclick=\"javascript:location.href='./overdue'\" value='逾期管理'></input><br>"; ?>
<input class='button' type ="button" onclick="javascript:location.href='./find'" value="搜尋書目"></input><br>
<input class='button' type ="button" onclick="javascript:location.href='./logout'" value="登出"></input><br>
</div>  
</body>

</html>
