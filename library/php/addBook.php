<?php


$db=new PDO("mysql:host=localhost;
dbname=".$dsn, $user, $password,
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

$find = $db->prepare(" SELECT * FROM book_copies WHERE BookId=:bookId AND BranchId=:branchId ");
$find->bindParam(":bookId", $_POST['bookId']);
$find->bindParam(":branchId",$_POST['branch']);
$find->execute();
$row1 = $find->fetch(PDO::FETCH_ASSOC);

if(!$row1){
    $insert = $db->prepare("INSERT INTO book_copies (BookId, BranchId, No_Of_Copies) VALUES (:bookId,:branchId,:ammount)");
    $insert->bindParam(":ammount", $_POST['ammount']);
    $insert->bindParam(":bookId",$_POST['bookId']);
    $insert->bindParam(":branchId",$_POST['branch']);
    
    $result = $insert->execute();
    //$errorcode = $insert->errorCode();
    if($result){
        echo "新增書目成功";
    }
    else{
        echo '新增失敗';
    }
    header("refresh:3,url=./");
}

else{
    $update = $db->prepare("UPDATE book_copies SET No_Of_Copies=No_Of_Copies+:ammount WHERE BookId=:bookId AND BranchId=:branchId ");
    $update->bindParam(":ammount", $_POST['ammount']);
    $update->bindParam(":bookId", $_POST['bookId']);
    $update->bindParam(":branchId",$_POST['branch']); 
    $update->execute();

    if($update){
        echo "新增書目成功";
    }
    else{
        echo "新增失敗";
    }
    header("refresh:3,url=./");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/style.css">
    <title>加入書籍</title>
</head>
<body>
</body>
</html>