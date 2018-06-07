<?php
require_once("../lib/dbconfig.php");


$db=new PDO("mysql:host=localhost;
dbname=".$dsn, $user, $password,
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));


$find = $db->prepare("SELECT DISTINCT (borrower.CardNo), borrower.Name FROM book_loans, borrower WHERE borrower.CardNo=book_loans.CardNo AND DueDate<CURDATE()");
$find->execute();
$row1 = $find->fetchAll(PDO::FETCH_ASSOC);

if(!$row1[0]){
    echo '查無逾期使用者';
}

else{
     echo '<h>查詢結果</h><br><hr>';  
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php for($i=0;$i<count($row1);$i++){ ?>    
<div>
    借書證卡號: <?php echo $row1[$i]['CardNo']; ?><br>
    姓名: <?php echo $row1[$i]['Name']; ?><br>
    狀態: <?php echo '已過期'; ?><br>
    <hr>
</div>
<?php } ?>


</body>
</html>