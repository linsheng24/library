<?php

$db=new PDO("mysql:host=localhost;
dbname=".$dsn, $user, $password,
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));


$find = $db->prepare("SELECT book.BookId, book_loans.BranchId, book.Title FROM book_loans, book WHERE book.BookId=book_loans.BookId AND book_loans.DueDate<CURDATE() AND book_loans.BranchId=:branchId");
$find->bindParam(':branchId',$_POST['branchId']);
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
    <title>逾期查詢</title>
</head>
<body style="font-size:30">
<?php for($i=0;$i<count($row1);$i++){ ?>    
<div>
    借書證卡號: <?php echo $row1[$i]['BookId']; ?><br>
    書名: <?php echo $row1[$i]['Title']; ?><br>
    分館代號: <?php echo $row1[$i]['BranchId']; ?><br>
    狀態: <?php echo '已過期'; ?><br>
    <hr><br>
</div>
<?php } ?>


</body>
</html>