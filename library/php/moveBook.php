<?php
require_once("../lib/dbconfig.php");

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
        echo '本館無此書目';
        header("refresh:3,url=../");
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





        
        $find = $db->prepare(" SELECT * FROM book_copies WHERE BookId=:bookId AND BranchId=:branchId ");
        $find->bindParam(":bookId", $_POST['bookId']);
        $find->bindParam(":branchId",$_POST['newbranch']);
        $find->execute();
        $row1 = $find->fetch(PDO::FETCH_ASSOC);

        if(!$row1){
            $insert = $db->prepare("INSERT INTO book_copies (BookId, BranchId, No_Of_Copies) VALUES (:bookId,:branchId,:ammount)");
            $insert->bindParam(":ammount", $_POST['ammount']);
            $insert->bindParam(":bookId",$_POST['bookId']);
            $insert->bindParam(":branchId",$_POST['newbranch']);
    
            $result = $insert->execute();
            //$errorcode = $insert->errorCode();
            if($result){
                $suc = "success";
            }
            else{
                throw new Exception('加入步驟錯誤');
            }
        }

        else{
            $update = $db->prepare("UPDATE book_copies SET No_Of_Copies=No_Of_Copies+:ammount WHERE BookId=:bookId AND BranchId=:branchId ");
            $update->bindParam(":ammount", $_POST['ammount']);
            $update->bindParam(":bookId", $_POST['bookId']);
            $update->bindParam(":branchId",$_POST['newbranch']); 
            $update->execute();
        }



        $sql =" DELETE FROM book_copies WHERE No_Of_Copies<1";

    $delete = $db->prepare($sql);
    $row3 = $delete->execute();

    $db->commit();
    echo "轉移完成";
    header("refresh:3,url=../");
    }



}

catch (Exception $e){
    $db->rollBack();
    echo $e->getMessage();
    header("refresh:3,url=../");
}

?>