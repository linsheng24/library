<?php
session_start();


if($_SESSION['username'] != null){
    header("Location:./page/menu.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="./css/style.css">

    <title>圖書管理系統登入</title>
</head>
<body>
<div>   
<form method="post">

帳號: <input type="text" name="id"><br/>
密碼: <input type="password" name="pass"><br/>

<button class="button" type="button" value="login" onClick="this.form.action='./php/login/login.php';this.form.submit();">登入</button><br/>
<button class="button" type="button" value="regist" onClick="this.form.action='./php/login/regist.php';this.form.submit();">申請</button>

</form>

</div>
</body>
</html>


