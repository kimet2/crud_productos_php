<?php
@session_start();
if(!empty($_POST['signin'])){
    if(empty($_POST["nick"]) and empty($_POST["pass"])){
        ?>
            <div class="alert alert-warning" role="alert">
                RELLENA LOS CAMPOS!
            </div> 
            <?php
    }else{
        $user = $_POST["nick"];
        $passw = md5($_POST["pass"]);
        $sql=$conexion->query("select nick, contrasenya from usuarios where nick='$user' and contrasenya='$passw' ");
        if($datos=$sql->fetch_object()){
            $_SESSION['nick'] = $user;
            header("location:../productes/index.php");
        }else{
            ?>
            <div class="alert alert-warning" role="alert">
                El usuario no se ha registrado!
            </div> 
            <?php
            //print_r($datos);
        }
    }
}
?>