<?php 
if(isset($_REQUEST["elimina"])){
    $j = $_REQUEST["elimina"];
    $mysql=new mysqli('localhost','root','','crud1');
    if($mysql->connect_errno){
        die($mysql->connect_error);
    }
    $sql="DELETE FROM productos WHERE id='$j'";
    $result=$mysql->query($sql);
    header("Location:index.php");
}
?>