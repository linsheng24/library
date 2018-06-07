<?php
require_once("../lib/dbconfig.php");


$db=new PDO("mysql:host=localhost;
dbname=".$dsn, $user, $password,
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));


$find = $db->prepare("SELECT * FROM book_loans WHERE BookId=:bookId");
$find->bindParam(":bookId", $_POST['bookId']);
$find->execute();
$row1 = $find->fetchAll(PDO::FETCH_ASSOC);

if(!$row1[0]){
    echo '本館無此書目';
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