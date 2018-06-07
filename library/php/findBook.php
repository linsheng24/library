<?php
require_once("../lib/dbconfig.php");


$db=new PDO("mysql:host=localhost;
dbname=".$dsn, $user, $password,
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));


$find1 = $db->prepare("SELECT count(*) FROM book_loans, book WHERE book.BookId=book_loans.BookId AND book.Title=:title");
$find1->bindParam(':title',$_POST['bookTitle']);
$find1->execute();
$row1 = $find1->fetch(PDO::FETCH_ASSOC);

//----------------------------------------
$find2 = $db->prepare("SELECT book_copies.No_Of_Copies,book_copies.BranchId FROM book_copies, book WHERE book.BookId=book_copies.BookId AND book.Title=:title");
$find2->bindParam(':title',$_POST['bookTitle']);
$find2->execute();
$row2 = $find2->fetchAll(PDO::FETCH_ASSOC);
if(!$row2[0]){
    echo '查無逾期使用者';
}


if(!$row1){
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

書籍名稱: <?php echo $_POST['bookTitle']."<br><hr>"?>
<?php echo $row1['count(*)']."本未歸還<br><hr>"; ?>    

<?php for($i=0;$i<count($row2);$i++){ ?>    
<div>
    分館代號: <?php echo $row2[$i]['BranchId']; ?><br>
    數量: <?php echo $row2[$i]['No_Of_Copies']; ?><br>
    <hr>
</div>
<?php } ?>


</body>
</html>