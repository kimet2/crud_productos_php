<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  <script src="https://kit.fontawesome.com/9ddb4510e0.js" crossorigin="anonymous"></script><body>
</head>
<body background="../../img/fons.png">
<div class="p-5 bg-danger text-white text-center">
  <h1>Productes</h1>
  <p>Pràctica de productes amb mysql</p>
</div>
<?php
@session_start();
?>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <ul class="navbar-nav">
    
      <li class="nav-item">
        <a class="nav-link" href="">Mi carrito</a>
      </li>
     <li class="nav-item">
        <a class="nav-link" href="afegir.php">Afegir productes</a>
      </li>
    </ul>
  </div>
  <div class="nav-item dropdown">
      <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
          <img class="rounded-circle me-lg-2" src="../../img/user.jpg" alt="" style="width: 40px; height: 40px;">
          <span class="d-none d-lg-inline-flex"><?php echo($_SESSION['nick'])?></span>
      </a>
      <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
          <a href="#" class="dropdown-item">My Profile</a>
          <a href="#" class="dropdown-item">Settings</a>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Log out</button>
      </div>
  </div>
</nav>
<div class="container mt-5 mb-5">


<form action="index.php" method="post" enctype="multipart/form-data">
  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">LOG OUT</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <h6 class="modal-sbody" id="exampleModalLabel">Estas seguro de que quieres cerrar session?</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <input type="submit" name="logout" id="logout" class="form-submit" value="Log out"/>
          <?php
          if(isset($_REQUEST['logout'])){
            @session_destroy();
            header("location:../usuari/login.php");
          }
          ?>
        </button>
      </div>
    </div>
  </div>
</div>
        </form>

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    
</body>
    </html>