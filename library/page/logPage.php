
<?php



if($_SESSION['username'] != null){
    header("Location:./menu");
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

帳號: <input class="text" type="text" name="id"><br/>
密碼: <input class="text" type="password" name="pass"><br/>

<button class="button" type="button" value="login" onClick="this.form.action='./login';this.form.submit();">登入</button><br/>
<button class="button" type="button" value="regist" onClick="this.form.action='./regist';this.form.submit();">申請</button>

</form>

</div>
</body>
</html>


