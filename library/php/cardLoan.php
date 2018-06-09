<?php

$db=new PDO("mysql:host=localhost;
dbname=".$dsn, $user, $password,
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));


$find = $db->prepare("SELECT * FROM book_loans WHERE CardNo=:cardNo");
$find->bindParam(":cardNo", $_POST['cardNo']);
$find->execute();
$row1 = $find->fetchAll(PDO::FETCH_ASSOC);

if(!$row1[0]){
    echo '無此卡號紀錄';
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

    <title>書籍追蹤</title>
</head>
<body>
<?php for($i=0;$i<count($row1);$i++){ ?>    
<div>
    書號: <?php echo $row1[$i]['BookId']; ?><br>
    分館代號: <?php echo $row1[$i]['BranchId']; ?><br>
    借書證卡號: <?php echo $row1[$i]['CardNo']; ?><br>
    借書日期: <?php echo $row1[$i]['DateOut']; ?><br>
    到期日期: <?php echo $row1[$i]['DueDate']; ?><br>
    狀態: <?php echo ( strtotime($row1[$i]['DueDate'])<time() ) ? '已過期':'未過期'; ?><br>
    <hr>
</div>
<?php } ?>


</body>
</html>