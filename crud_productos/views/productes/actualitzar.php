<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  </style>
</head>
<body>

<h2 class="text-center pt-5 pb-3">Modificar Productes</h2>
<?php 
@session_start();
if(isset($_REQUEST["actualitza"])){
    $j = $_REQUEST["actualitza"];
    $_SESSION['id']=$j;
    $mysql=new mysqli('localhost','root','','crud1');
    if($mysql->connect_errno){
        die($mysql->connect_error);
    }
    $sql="SELECT * FROM productos WHERE id='$j'";
    $result=$mysql->query($sql);
    $row=$result->fetch_assoc();

?>
<form class="container mt-5 mb-5" action="actualitzar.php" method="post" enctype="multipart/form-data">
    <label for="">Nombre</label>
    <input class="form-control"  type="text" name="nombre" value="<?php echo $row['nombre'];?>" required><br>
    <label for="">Descripcion</label>
    <input class="form-control"  type="text" name="descripcion" value="<?php echo $row['descripcion'];?>" required><br>
    <label for="">Precio</label>
    <input class="form-control"  type="number" name="precio" value="<?php echo $row['precio'];?>" required><br>
    <Label>Foto</Label>
    <input class="form-control"  type="file" name="foto" value="<?php echo $row['foto'];}?>" required><br>
    <input class="btn btn-primary"  type="submit" name="registrar" value="Registrar">

</form>
<?php

if(isset($_REQUEST["registrar"])){
    $nombre=$_REQUEST["nombre"];
    $descripcion=$_REQUEST["descripcion"];
    $precio=$_REQUEST["precio"];
    $today = date("YmdHis");
    $extensio = substr($_FILES['foto']['name'], strpos($_FILES['foto']['name'],"."));
    $nom = substr($_FILES['foto']['name'],0, strpos($_FILES['foto']['name'],"."));
    $nomcomplet =  $nom . $today . $extensio;
    copy($_FILES['foto']['tmp_name'], "../../img/" . $nomcomplet);
    $mysql=new mysqli('localhost','root','','crud1');
    if($mysql->connect_errno){
        die($mysql->connect_error);
    }
    $sql="UPDATE productos SET nombre='$nombre', descripcion='$descripcion', precio='$precio', 
    foto='$nomcomplet' WHERE id=".$_SESSION['id'];
    $result=$mysql->query($sql);
    
    header("Location:index.php");
}
?>

<div class="mt-5 p-4 bg-dark text-white text-center">
  <p>Footer</p>
</div>

</body>
</html>