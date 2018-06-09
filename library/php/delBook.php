<?php

$db=new PDO("mysql:host=localhost;
dbname=".$dsn, $user, $password,
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

try{
$db->beginTransaction();

$find = $db->prepare(" SELECT * FROM book_copies WHERE BookId=:bookId AND BranchId=:branchId ");
$find->bindParam(":bookId", $_POST['bookId']);
$find->bindParam(":branchId",$_POST['branch']);
$find->execute();
$row1 = $find->fetch(PDO::FETCH_ASSOC);

if(!$row1){
    echo '無此書目紀錄';
    header("refresh:3,url=./");
}

else{

        $find2 = $db->prepare(" SELECT * FROM book_copies WHERE BookId=:bookId AND BranchId=:branchId AND No_Of_Copies<:ammount");
        $find2->bindParam(":ammount", $_POST['ammount']);
        $find2->bindParam(":bookId", $_POST['bookId']);
        $find2->bindParam(":branchId",$_POST['branch']);
        $find2->execute();
        $row1 = $find2->fetch(PDO::FETCH_ASSOC);
        if($row1){
            throw new Exception('館藏數量不足');
        }


        $update = $db->prepare("UPDATE book_copies SET No_Of_Copies=No_Of_Copies-:ammount WHERE BookId=:bookId AND BranchId=:branchId ");
        $update->bindParam(":ammount", $_POST['ammount']);
        $update->bindParam(":bookId", $_POST['bookId']);
        $update->bindParam(":branchId",$_POST['branch']); 
        $row2 = $update->execute();
        if(!$row2){
            throw new Exception('更新步驟錯誤');
        }

        $sql =" DELETE FROM book_copies WHERE No_Of_Copies<1";
        $delete = $db->prepare($sql);
        $row3 = $delete->execute();
        $db->commit();
        header("refresh:3,url=./");
        echo "刪除完成";

    }
}

catch (Exception $e){
    $db->rollBack();
    echo $e->getMessage();
    header("refresh:3,url=./");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
    <title>加入書籍</title>
</head>
<body>
</body>
</html>