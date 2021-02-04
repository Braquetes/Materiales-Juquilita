<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rossan|Login</title>
    <!-- HOJA DE ESTILOS PERSONAL -->
    <link rel="stylesheet" href="estilos/estilos.css" />
    <!-- HOJA DE ESTILOS DE BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <script src="https://use.fontawesome.com/704bb665e3.js"></script>

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet" />

    <!-- <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/e530d88f76.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/9a3779baf9.js"></script>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet"> -->
</head>
<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: 0;
        font-family: "Roboto", sans-serif;
    }

    body {
        background-color: #f6f5f5;
    }

    .row {
        background: white;
        border-radius: 30px;
        box-shadow: 8px 8px 53px grey;
    }

    img {
        width: 100%;
        height: 500px;
        border-top-left-radius: 30px;
        border-bottom-left-radius: 30px;
    }

    .btn1 {
        border: none;
        outline: none;
        height: 50px;
        width: 100%;
        background-color: black;
        color: white;
        border-radius: 5px;
        font-weight: bold;
    }

    .btn1:hover {
        background-color: white;
        border: 1px solid;
        color: black;
    }
</style>

<body>
    <section class="form my-4 mx-4">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-5">
                    <img src="img/2.jpg" class="img-fluid" alt="" />
                </div>
                <div class="col-lg-7 px-5 pt-5">
                    <h1 class="font-weight-bold py-3">Materiales Juquilita</h1>
                    <h4>Ingresa tus datos para registrarte</h4>
                    <form action="controllers/usuariosControllers.php" method="POST">
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input type="text" placeholder="Ingrese su correo electronico" class="form-control my-3 p-4" id="user" name="user" required/>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input type="text" placeholder="Ingrese su email" class="form-control my-3 p-4" id="pass" name="email" required/>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input type="password" placeholder="Ingrese su contraseña" class="form-control my-3 p-4" id="pass" name="pass" required/>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <button type="submit" class="btn1 mt-3 mb-5">
                                    Registrarse
                                </button>
                            </div>
                        </div>
                        <p>¿Ya tienes cuenta? <a href="login.html">Inicia sesión aqui</a></p>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--   <div class="container my-2 px-0 ">
        <section class=" my-md-5 text-center">
            <h3 class="my-4 pb-2 text-center Title1">BODEGA ROSSANA</h3>
          <form class="my-5 mx-md-5" action="controllers/usuariosController.php" method="POST">
            <div class="row">
              <div class="col-md-4 mx-auto">
                <div class="card">
                  <div class="card-body">
                    <form class="text-center" style="color: #757575;">
                        <img class="img1" src="img/Login .JPG" alt="">
                        <br><br>
                        <div class="md-form">
                            <input type="text" id="user" name="user" class="form-control">
                            <label for="form1">Usuario</label>
                        </div>
                        <div class="md-form">
                            <input type="password" id="pass" name="pass" class="form-control">
                            <label for="form1">Contraseña</label>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-info Boton1" type="submit">Iniciar sesión</button>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </section>
      </div> -->
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<!-- <script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
  ></script>
  <script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"
  ></script>
  <script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"
  ></script>
  <script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"
  ></script> -->

</html>