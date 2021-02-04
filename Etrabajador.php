<?php
@session_start();
if (!isset($_SESSION["user"])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rossan|ATrabajador</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/9a3779baf9.js"></script>
    <script src="https://kit.fontawesome.com/e530d88f76.js" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.2.0/mdb.min.css" rel="stylesheet" />
    <!--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/9a3779baf9.js"></script>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet"> -->
</head>
<style>
    body {
        background-color: #f6f5f5;
    }

    .navbar {
        background-color: #007aff;
    }

    .salir {
        text-align: center;
        background-color: #dc3546;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 5px;
        width: 8vw;
    }


    .salir:hover {
        text-decoration: none;
        background-color: red;
        color: white;
    }

    .textsalir {
        color: white;
        font-weight: bold;
    }

    .textsalir:hover {
        color: white;
        text-decoration: none;
    }

    .almacen {
        margin: auto;
        width: 70%;
    }

    .carda {

        border-radius: 20px;
        background-color: white;
        margin-top: 2rem;
        box-shadow: 4px 4px 13px grey;
    }
</style>

<body class="body">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="home.php"><strong>Materiales Juquilita</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

            </ul>
            <form class="form-inline my-2 my-lg-0">
                <button class="salir" type="submit"><i class="fas fa-sign-out-alt"></i> <a class="textsalir" href="Trabajadores.php">Regresar</a> </button>
            </form>
        </div>
    </nav>

    <div class="container almacen">
        <div class="carda general">
            <div class="container formulario ">
                <h3 class="my-4 mb-4 pt-3 text-center "><strong>EDITAR TRABAJADOR</strong></h3>
                <section class=" seccion p-2 text-center">

                    <form action="./controllers/model.php" method="POST">
                        <?php
                        $identificador = $_POST["ID"];
                        require("./BaseDatos/Conexion.php"); //Necesitamos el archivo en donde viene la conexión de la base de datos
                        require("./Clases/Empleados.php"); //Necesitamos el archivo en donde vienen las clases
                        //Vamos a editar empleados y traemos todos sus datos
                        $mostrarCarro = mysqli_query($conexion, "SELECT * from empleados where `id` = '" . $identificador . "' ");
                        if ($mostrarCarro->num_rows > 0) {
                            while ($row = mysqli_fetch_array($mostrarCarro)) {
                                $array = array($row["id"], $row["nombres"], $row["apellido_p"], $row["apellido_m"], $row["usuario"], $row["contraseña"], $row["cargo"], $row["turno_entrada"], $row["turno_salida"]);
                                $empleado = new empleados();

                                $empleado->set_id($array[0]);
                                $empleado->set_nombres($array[1]);
                                $empleado->set_apellido_p($array[2]);
                                $empleado->set_apellido_m($array[3]);
                                $empleado->set_usuario($array[4]);
                                $empleado->set_contraseña($array[5]);
                                $empleado->set_cargo($array[6]);
                                $empleado->set_turno_entrada($array[7]);
                                $empleado->set_turno_salida($array[8]);
                        ?>
                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="form-outline">
                                            <input type="text" id="trabajador" class="form-control mb-4" value="<?php echo $empleado->get_nombres(); ?>" name="Nombre" />
                                            <label class="form-label" for=""><i class="fas fa-user"></i> Nombre del trabajador</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-outline">
                                            <input type="text" id="" class="form-control " value="<?php echo $empleado->get_apellido_p(); ?>" name="Ap_p" />
                                            <label class="form-label" for=""><i class="fas fa-user"></i> Apellido paterno</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-outline">
                                            <input type="text" id="" class="form-control " value="<?php echo $empleado->get_apellido_m(); ?>" name="Ap_m" />
                                            <label class="form-label" for=""><i class="fas fa-user"></i> Apellido Materno</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="form-outline">
                                            <input type="text" id="" class="form-control " value="<?php echo $empleado->get_usuario(); ?>" name="User" />
                                            <label class="form-label" for=""><i class="fas fa-at"></i> Usuario</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-outline">
                                            <input type="text" id="" class="form-control" value="<?php echo $empleado->get_contraseña(); ?>" name="Pass" />
                                            <label class="form-label" for=""><i class="fas fa-key"></i> Contraseña</label>
                                        </div>
                                    </div>
                                    <?php
                                    switch ($empleado->get_cargo()) {
                                        case 1:
                                            $cargo = "Administrador";
                                            break;
                                        case 2:
                                            $cargo = "Director General";
                                            break;
                                        case 3:
                                            $cargo = "Director de departamento";
                                            break;
                                        case 4:
                                            $cargo = "Personal";
                                            break;
                                    }
                                    ?>
                                    <div class="col">
                                        <select name="puesto" class="form-control" required>
                                            <i class="fas fa-chevron-down" style="color:black"></i>
                                            <option selected value="<?php echo $empleado->get_cargo() ?>"><?php echo $cargo ?></option>
                                            <option value="1">Administrador</option>
                                            <option value="2">Director General</option>
                                            <option value="3">Director de departamento</option>
                                            <option value="4">Personal</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="row mb-4">

                                    <div class="col">
                                        <strong><label for=""><span><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                                                Horario de Entrada</label></strong>
                                        <input type="time" id="" class="form-control " name="Entrada" required value="<?php echo $empleado->get_turno_entrada(); ?>">
                                    </div>
                                    <div class="col">
                                        <strong><label for=""><span><i class="fa fa-clock-o " aria-hidden="true"></i></span>
                                                Horario de salida</label></strong>
                                        <input type="time" id="" class="form-control  mb-4 " name="Salida" required value="<?php echo $empleado->get_turno_salida(); ?>">
                                    </div>

                                </div>
                                <?php
                                if ($empleado->get_cargo() < "4") {
                                ?>
                                    <div class="row mb-4">
                                        <div class="col">
                                            <strong><label><span><i class="fas fa-cash-register"></i></span>
                                                    Encargado del departamento</label></strong><br>
                                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
                                            <div id="departamentos">
                                                <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                                    <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off" value="1" name="departamento1">
                                                    <label class="btn btn-outline-primary" for="btncheck1">Herramientas</label>

                                                    <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off" value="2" name="departamento2">
                                                    <label class="btn btn-outline-primary" for="btncheck2">Electrónicos</label>

                                                    <input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off" value="3" name="departamento3">
                                                    <label class="btn btn-outline-primary" for="btncheck3">Limpieza</label>

                                                    <input type="checkbox" class="btn-check" id="btncheck4" autocomplete="off" value="4" name="departamento4">
                                                    <label class="btn btn-outline-primary" for="btncheck4">Equipos</label>

                                                    <input type="checkbox" class="btn-check" id="btncheck5" autocomplete="off" value="5" name="departamento5">
                                                    <label class="btn btn-outline-primary" for="btncheck5">Redes</label>

                                                    <input type="checkbox" class="btn-check" id="btncheck6" autocomplete="off" value="6" name="departamento6">
                                                    <label class="btn btn-outline-primary" for="btncheck6">Software</label>
                                                </div><br>
                                                <input type="button" class="btn btn-success" id="BtnSeleccionar" value="Seleccionar todo">
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        $(document).ready(function() {
                                            selected = true;
                                            $('#BtnSeleccionar').click(function() {
                                                if (selected) {
                                                    $('#departamentos input[type=checkbox]').prop("checked", true);
                                                    $('#BtnSeleccionar').val('Deseleccionar');
                                                } else {
                                                    $('#departamentos input[type=checkbox]').prop("checked", false);
                                                    $('#BtnSeleccionar').val('Seleccionar todo');
                                                }
                                                selected = !selected;
                                            });
                                        });
                                    </script>
                                <?php   }   ?>
                                <?php
                                if ($empleado->get_cargo() == "4") {
                                ?>
                                    <div class="col">
                                        <select name="departamento" class="form-control" required>
                                            <i class="fas fa-chevron-down" style="color:black"></i>
                                            <option selected value="">Selecciona un departamento</option>
                                            <option value="1">Herramientas</option>
                                            <option value="2">Electrónicos</option>
                                            <option value="3">Limpieza</option>
                                            <option value="4">Equipos</option>
                                            <option value="5">Redes</option>
                                            <option value="6">Software</option>
                                        </select>
                                    </div><br>
                                <?php   }   ?>
                                <!-- <div class="form-outline mb-4">
              <input type="email" id="form3Example3" class="form-control" />
              <label class="form-label" for="form3Example3">Email address</label>
            </div>
            <div class="form-outline mb-4">
              <input type="password" id="form3Example4" class="form-control" />
              <label class="form-label" for="form3Example4">Password</label>
            </div> -->
                                <input type="hidden" name="Valor" value="EditarEmpleado">
                                <input type="hidden" name="ID" value="<?php echo $row["id"]; ?>">
                                <button class="btn btn-success btn-large mb-4" type="submit">
                                    <i class="fas fa-pen"></i> Editar trabajador</button>
                        <?php }
                        } ?>

                    </form>
                </section>
            </div>
        </div>
    </div>


    <!-- <div class="container my-2 px-0 ">
        <section class=" my-md-5 text-center">
            <h3 class="my-4 pb-2 text-center Title1">EDITAR TRABAJADOR</h3>
            <form class="my-5 mx-md-5" action="./controllers/model.php" method="POST">
                <div class="row">
                    <div class="col-md-4 mx-auto">
                        <div class="card">
                            <div class="card-body">
                                <form class="text-center" style="color: #757575;">
                                    <?php
                                    /*$identificador = $_POST["ID"];
                                    require("./BaseDatos/Conexion.php"); //Necesitamos el archivo en donde viene la conexión de la base de datos
                                    require("./Clases/Empleados.php"); //Necesitamos el archivo en donde vienen las clases
                                    //Vamos a editar empleados y traemos todos sus datos
                                    $mostrarCarro = mysqli_query($conexion, "SELECT * from empleados where `id` = '" . $identificador . "' ");
                                    if ($mostrarCarro->num_rows > 0) {
                                        while ($row = mysqli_fetch_array($mostrarCarro)) {
                                            $array = array($row["id"], $row["nombres"], $row["apellido_p"], $row["apellido_m"], $row["usuario"], $row["contraseña"], $row["cargo"], $row["turno_entrada"], $row["turno_salida"]);
                                            $empleado = new empleados();

                                            $empleado->set_id($array[0]);
                                            $empleado->set_nombres($array[1]);
                                            $empleado->set_apellido_p($array[2]);
                                            $empleado->set_apellido_m($array[3]);
                                            $empleado->set_usuario($array[4]);
                                            $empleado->set_contraseña($array[5]);
                                            $empleado->set_cargo($array[6]);
                                            $empleado->set_turno_entrada($array[7]);
                                            $empleado->set_turno_salida($array[8]);*/
                                    ?>
                                    <strong><label for=""><span><i class="fa fa-male" aria-hidden="true"></i></span>
                                            Nombre</label></strong>
                                    <input type="text" id="trabajador" class="form-control mb-4" value="<?php //echo $empleado->get_nombres(); 
                                                                                                        ?>" placeholder="Nombre del trabajador" name="Nombre">
                                    <strong><label for=""><span></span>
                                            Apellido paterno</label></strong>
                                    <input type="text" id="" class="form-control mb-4" placeholder="Apellido paterno" value="<?php //echo $empleado->get_apellido_p(); 
                                                                                                                                ?>" name="Ap_p">
                                    <strong><label for=""><span></span>
                                            Apellido materno</label></strong>
                                    <input type="text" id="" class="form-control mb-4" placeholder="Apellido materno" value="<?php //echo $empleado->get_apellido_m(); 
                                                                                                                                ?>" name="Ap_m">
                                    <strong><label for=""><span><i class="fa fa-user" aria-hidden="true"></i></span>
                                            Usuario</label></strong>
                                    <input type="text" id="" class="form-control mb-4" placeholder="Usuario" value="<?php //echo $empleado->get_usuario(); 
                                                                                                                    ?>" name="User">
                                    <strong><label for=""><span><i class="fas fa-lock-open"></i></span>
                                            Contraseña</label></strong>
                                    <input type="text" id="" class="form-control mb-4" placeholder="Contraseña" value="<?php //echo $empleado->get_contraseña(); 
                                                                                                                        ?>" name="Pass">
                                    <strong><label for=""><span><i class="fa fa-address-card" aria-hidden="true"></i></span>
                                            Cargo</label></strong>
                                    <select name="puesto" class="form-control mb-4" required>
                                        <option selected disabled value=""> Elige una opción </option>
                                        <option value="1">Vendedor</option>
                                        <option value="2">Administrador</option>
                                    </select>
                                    <strong><label for=""><span><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                                            Horario de Entrada</label></strong>
                                    <input type="time" id="" class="form-control mb-4" name="Entrada" required value="<?php //echo $empleado->get_turno_entrada(); 
                                                                                                                        ?>">
                                    <strong><label for=""><span><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                                            Horario de salida</label></strong>
                                    <input type="time" id="" class="form-control mb-4" name="Salida" required value="<?php //echo $empleado->get_turno_salida(); 
                                                                                                                        ?>">
                                    <input type="hidden" name="Valor" value="EditarEmpleado">
                                    <input type="hidden" name="ID" value="<?php //echo $row["id"]; 
                                                                            ?>">
                                    <button class="btn btn-info btn-block Boton8" type="submit">
                                        Editar trabajador</button>
                                    <?php //}
                                    //} 
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
</body> -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.2.0/mdb.min.js"></script>
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
 -->

</html>