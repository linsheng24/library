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
  <title>圖書館管理系統</title>
  
  
  
      <link rel="stylesheet" href="../css/style.css">

  
</head>

<body>
<div>
<h1 class='title'>圖書館系統</h1><br>
<hr>
<?php if($_SESSION['pv']==1) echo "<input class='button' type ='button' onclick=\"javascript:location.href='book.php'\" value='管理書目'></input><br>"; ?>
<input class='button' type ="button" onclick="javascript:location.href='state.php'" value="借閱查詢"></input><br>
<?php if($_SESSION['pv']==1) echo "<input class='button' type ='button' onclick=\"javascript:location.href='overdue.php'\" value='逾期管理'></input><br>"; ?>
<input class='button' type ="button" onclick="javascript:location.href='find.php'" value="搜尋書目"></input><br>
<input class='button' type ="button" onclick="javascript:location.href='../php/login/logout.php'" value="登出"></input><br>
</div>  
</body>

</html>
