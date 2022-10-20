<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

    <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Registrarse</h2>
                        <form method="POST" class="register-form"  id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Nombre " required="" pattern= "^[a-zA-Z ]*$"/>
                            </div>
                            <p> En el campo de nombre solo nos permite poner letras</p>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="surname" id="name" placeholder="Apellido " required="" pattern= "^[a-zA-Z ]*$"/>
                            </div>
                            <p> En el campo de apellido solo nos permite poner letras</p>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="nick" id="name2" placeholder="Nick " required="" pattern="^[a-zA-Z0-9_.-]*$"/>
                            </div>
                            <p> En el campo de nick solo nos permite poner letras, números y guiones bajos</p>

                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Email " required/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" minlength="4" maxlength="8" name="pass" id="pass" placeholder="Contraseña " required/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" minlength="4" maxlength="8" name="pass2" id="pass" placeholder="Repite la contraseña " required/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Registrar" data-bs-toggle/>
                            </div>
                            
                           
                            <?php
                            include('../productes/config.php');
                            @session_start();
                                if(isset($_REQUEST["signup"])){
                                    $nombre = $_POST["name"];
                                    $apellido = $_POST["surname"];
                                    $nicks = $_POST["nick"];
                                    $email = $_POST["email"];
                                    $contraseña =md5($_POST["pass"]);
                                    $contraseña2 = md5($_POST["pass2"]);

                                    $query = "INSERT INTO usuarios (nombre, apellidos, nick, contrasenya, contrasenya2, correo) 
                                    VALUES ('$nombre', '$apellido', '$nicks ', '$contraseña', '$contraseña2', '$email')";

                                    //Validar correo electronico 
                                    

                                    //Validar que la contraseña sea la misma
                                    if($contraseña != $contraseña2){
                                        ?>
                                        <div class="alert alert-danger" role="alert">
                                            Las contraseñas no coinciden!!
                                        </div> 
                                        <?php
                                        exit();
                                    }

                                    //Verificar que el nick no sea el mismo que la base de datos
                                    $verificar_nick = mysqli_query($conexion, "SELECT * from usuarios where nick='$nicks' ");

                                    if(mysqli_num_rows($verificar_nick) > 0){
                                        //header("Location: register.php");
                                        ?>
                                        <div class="alert alert-danger" role="alert">
                                            Este nick ya esta registrado, registrate con otro nick!!
                                        </div> 
                                        <?php
                                        
                                        exit();
                                    }


                                    $ejecutar = mysqli_query($conexion, $query);

                                    if($ejecutar){
                                        ?>
                                        <div class="alert alert-success" role="alert">
                                            El usuario se ha registrado correctamente!
                                        </div> 
                                        <?php
                                        header("Location: login.php");
                                    }else{
                                        ?>
                                        <div class="alert alert-warning" role="alert">
                                            El usuario  no se ha registrado!
                                        </div> 
                                        <?php
                                        header("Location: register.php");
                                    }
                                }
                            ?>
                        
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="login.php" class="signup-image-link">Ya estoy registrado</a>
                    </div>
                    </form>
                </div>
            </div>
        </section>
        </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>