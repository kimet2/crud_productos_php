<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="p-5 bg-primary text-white text-center">
  <h1>Afegir productes</h1>
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="../../index.php">Index</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="mostrar.php">Mostrar productes</a>
      </li>
    </ul>
  </div>
</nav>


<form class="container mt-5 mb-5" action="afegir.php" method="post" enctype="multipart/form-data">
       <label for="">Nombre</label>
    <input class="form-control"  type="text" name="nombre" id="" required><br>
    <label for="">Descripcion</label>
    <input class="form-control"  type="text" name="descripcion" id="" required><br>
    <label for="">Precio</label>
    <input class="form-control"  type="number" name="precio" id="" required><br>
    <Label>Foto</Label>
    <input class="form-control"  type="file" name="foto" id="" required><br>
    <input class="btn btn-primary"  type="submit" name="registrar" value="Afegir">

<!-- sdasdasdasda -->
</form>
<?php
@session_start();
if(isset($_REQUEST["registrar"])){
    $nombre=$_REQUEST["nombre"];
    $descripcion=$_REQUEST["descripcion"];
    $precio=$_REQUEST["precio"];
    //$_SESSION['total']=$_REQUEST["preu"]*$_REQUEST["nombreplaces"];
    $today = date("YmdHis");
    $extensio = substr($_FILES['foto']['name'], strpos($_FILES['foto']['name'],"."));
    $nom = substr($_FILES['foto']['name'],0, strpos($_FILES['foto']['name'],"."));
    $nomcomplet =  $nom . $today . $extensio;
    copy($_FILES['foto']['tmp_name'], "../../img/" . $nomcomplet);
    $mysql=new mysqli('localhost','root','','crud1');
    if($mysql->connect_errno){
        die($mysql->connect_error);
    }
    $sql="INSERT INTO productos (nombre, descripcion, precio, foto) VALUES ('$nombre', '$descripcion', '$precio', '$nomcomplet')";
    $result=$mysql->query($sql);
    
    header("Location:mostrar.php");
}
?>
<div class="mt-5 p-4 bg-dark text-white text-center">
  <p>Footer</p>
</div>
</body>
</html>

