<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/9ddb4510e0.js" crossorigin="anonymous"></script><body>

<div class="p-5 bg-warning text-white text-center">
  <h1>Mostrar productes</h1>
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="afegir.php">Afegir productes</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="../index.php">Index</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container mt-5 mb-5">




<table class="table table-dark table-hover">
    <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Precio</th>
        <th>Foto</th>
        <th>Actualitzar</th>
        <th>Eliminar</th>
    </tr>

<?php

    $mysql = new mysqli('localhost','root','','crud1');
    if($mysql->connect_errno){
        die($mysql->connect_error);
    }
    $sql = "SELECT * FROM productos";
    $result=$mysql->query($sql);
    if($result){

        while($row=$result->fetch_assoc()){
            echo "<tr>"; //crea fila
                echo "<td>" .$row['id']."</td>"; //primera columna
                echo "<td>" . $row['nombre'] . "</td>"; //segona
                echo "<td>" . $row['descripcion']."</td>"; //tercera
                echo "<td>" . $row['precio']."</td>";
                echo "<td><img src='../../img/".$row['foto']."' width='100'></td>";                
                echo "<td><a href=\"actualitzar.php?actualitza=".$row['id']."\"><i class='fa-sharp fa-solid fa-rotate-right'></i></a></td>";
                echo "<td><a href=\"eliminar.php?elimina=".$row['id']."\"><i class='fa-solid fa-trash'></i></a></td>";
                echo "</tr>"; //tanco fila
        }
    }

?>
</table>
<div class="mt-5 p-4 bg-dark text-white text-center">
  <p>Footer</p>
</div>
</body>
</html>
