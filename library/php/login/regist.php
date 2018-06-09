<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="./css/style.css">
    
    <title>註冊頁面</title>
</head>
<body>
    <div>
    <form action="./regist" method="post">
        卡號<br> <input class="text" type="text" name="cardNo" id="cardNo" ><br><hr>
        密碼<br> <input class="text" type="password" name="pass" id="pass"><br><hr>
        姓名<br> <input class="text" type="text" name="name" id="name" ><br><hr>
        性別<br> <input type=radio name=sex value=1>男
             <input type=radio name=sex value=0 checked>女<br><hr>
        生日<br> <input class="text" type="text" name="birth" id="birth"><br><hr>
        聯絡電話<br> <input class="text" type="text" name="phone" id="phone"><br><hr>
        地址<br> <input class="text" type="text" name="address" id="address"><br><hr>
        申請管理員帳號<br> <input type=radio name=admin value=1>是
             <input type=radio name=admin value=0 checked>否<br><hr>

        <input class="button" type="submit" value="註冊"><hr>
        <input class='back' type ="button" onclick="history.back();" value="上一頁"></input><br>

    </form>
    </div>

</body>
</html>



<?php


if(isset($_POST['cardNo'])){
$db=new PDO("mysql:host=localhost;
                dbname=".$dsn, $user, $password,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

try{
	
$db->beginTransaction();

$insert = $db->prepare("INSERT INTO menber ( id, pass, name, address, birth, phone, sex, admin) VALUES (:id,:pass,:name,:address,:birth,:phone,:sex,:admin)");
$insert->bindParam(":id",$_POST['cardNo']);
$insert->bindParam(":pass",$_POST['pass']);
$insert->bindParam(":name",$_POST['name']);
$insert->bindParam(":address",$_POST['address']);
$insert->bindParam(":birth",$_POST['birth']);
$insert->bindParam(":phone",$_POST['phone']);
$insert->bindParam(":sex",$_POST['sex']);
$insert->bindParam(":admin",$_POST['admin']);


$result = $insert->execute();
$errorcode = $insert->errorCode();

if($result){
if($_POST['admin']==0){
$insert2 = $db->prepare("INSERT INTO borrower ( CardNo, Name, Address, phone) VALUES (:id,:name,:address,:phone)");
$insert2->bindParam(":id",$_POST['cardNo']);
$insert2->bindParam(":name",$_POST['name']);
$insert2->bindParam(":address",$_POST['address']);
$insert2->bindParam(":phone",$_POST['phone']);
$result = $insert2->execute();
}

    }
else{
    throw new Exception('error regist');
}
$db->commit();
header("refresh:0.5,url=./");

}
catch (Exception $e){
        
    $db->rollBack();

    echo $e->getMessage();
}



}
?>