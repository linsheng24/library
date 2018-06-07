<?php
require_once("../../lib/dbconfig.php");

$db=new PDO("mysql:host=localhost;
                dbname=".$dsn, $user, $password,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$sth = $db->prepare("SELECT * FROM menber WHERE id=:id AND pass=:pass");
$sth->bindParam(':id', $_POST['id']);
$sth->bindParam(':pass', $_POST['pass']);
$sth->execute();

$row = $sth->fetch(PDO::FETCH_ASSOC);

if(!($row))
{
echo "登入失敗，三秒後轉跳登入頁面";
}
else
{
echo "登入成功，三秒後轉跳主頁面";
session_start();
$_SESSION['username'] = $_POST['id'];
$_SESSION['pv'] = $row['admin'];

}
header("refresh:3,url=../../");

?>
                
