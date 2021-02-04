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
  <title>Rossana|Trabajadores</title>
  <link rel="stylesheet" href="css/style.css">
  <script src="https://kit.fontawesome.com/e530d88f76.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <script src="https://use.fontawesome.com/9a3779baf9.js"></script>
  <link rel="icon" type="image/x-icon" href="favicon.ico">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
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

  .agregarb {
    background-color: #01c851;
    padding: 5px;
    border: none;
    border-radius: 5px;
  }

  .agregart {
    color: white;
    font-weight: bold;
  }

  .agregart:hover {
    color: white;
    text-decoration: none;

  }



  .table {
    background-color: white;
  }


  .encabezadot {
    text-align: center;
    background-color: RGB(0, 122, 255);
    font-weight: bold;
    color: white;
  }

  .tr_op4 {
    width: 300px !important;
  }

  .tr_op5 {
    width: 150px !important;
  }

  .tr_op6 {
    width: 50px !important;
  }

  /*Boton flotante*/
  .btn-flotante {
    font-size: 10px;
    /* Cambiar el tamaño de la tipografia */
    text-transform: uppercase;
    /* Texto en mayusculas */
    /*font-weight: bold;*/
    /* Fuente en negrita o bold */
    color: #ffffff;
    /* Color del texto */
    border-radius: 5px;
    /* Borde del boton */
    letter-spacing: 2px;
    /* Espacio entre letras */
    background-color: #E91E63;
    /* Color de fondo */
    padding: 18px 30px;
    /* Relleno del boton */
    position: fixed;
    bottom: 40px;
    right: 40px;
    transition: all 300ms ease 0ms;
    box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
    z-index: 99;
    text-decoration: none !important;
    border-color: white !important;
    border-style: none !important;
  }

  .btn-flotante:hover {
    background-color: #2c2fa5;
    /* Color de fondo al pasar el cursor */
    box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.3);
    transform: translateY(-7px);
    text-decoration: none !important;
  }

  .editar {
    background-color: #01c851;
    width: 100px;
    padding: 10px;
    margin-bottom: 5px;
    border: none;
    color: white;
    font-weight: bold;
  }

  .eliminar {
    background-color: red;
    width: 100px;
    padding: 10px;
    margin-bottom: 5px;
    border: none;
    color: white;
    font-weight: bold;
  }

  @media only screen and (max-width: 600px) {
    .btn-flotante {
      font-size: 14px;
      padding: 12px 20px;
      bottom: 20px;
      right: 20px;
      text-decoration: none !important;
    }
  }

  .chica{
    font-size: small;
  }
</style>

<body>
  <!--Navbar-->

  <nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="home.php"><strong>Materiales Juquilita</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
          <a class="nav-link" href="home.php">Inicio </a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <button class="salir" type="submit"><i class="fas fa-sign-out-alt"></i> <a class="textsalir" href="controllers/logout.php">Salir</a> </button>
      </form>
    </div>
  </nav>
  <!-- **********NAVBAR USANDO MDB BOOTSTRAP -->
  <!-- <nav class="mb-1 navbar navbar-expand-lg navbar-dark primary-color">
    <a class="navbar-brand" href="home.php">Bodega Rossana</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333" aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="inventario.php">Inventario</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto nav-flex-icons">
        <li class="nav-item dropdown">
          <a class="nav-link " id="navbarDropdownMenuLink-333" href="controllers/logout.php">
            <i class="fas fa-sign-out-alt"></i>
          </a>
        </li>
      </ul>
    </div>
  </nav> -->
  <!--Navbar-->
  <!--Inicio-->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 pt-4   ">
        <div class="row">
          <div class="col text-center">
            <h1><strong>Lista de trabajadores</strong></h1>
            <!-- <strong><label for="">Trabajadores</label></strong> -->
          </div>
          <div class="container text-right pb-3">

            <button type="button" class="agregarb" data-toggle="modal" data-target="#modalPoll-1">
              <a class="agregart" href="Atrabajador.php"><i class="fas fa-plus"></i> Agregar Trabajador </a></button>

          </div>
        </div>

        <div class="table-responsive">
          <!--Clientes-->
          <!-- <table id="example" class="table table-bordered  display" cellspacing="0" width="100%">
 -->
          <table id="example" class="table  " cellspacing="0" width="100%">
            <thead class="thead">
              <tr class="encabezadot">
                <th><strong>Id</strong></th>
                <th><strong>Nombre</strong></th>
                <th><strong>Apellido paterno</strong></th>
                <th><strong>Apellido materno</strong></th>
                <th><strong>Usuario</strong></th>
                <th><strong>Contraseña</strong></th>
                <th><strong>Cargo</strong></th>
                <th><strong>Horario</strong></th>
                <th><strong>Encargado</strong></th>
                <th><strong>Opciones</strong></th>
              </tr>
            </thead>

            <tbody>
              <?php
              require("./BaseDatos/Conexion.php"); //Muestra el historial de los productos en venta por cada uno
              //Muestra los datos de los empleados
              $mostrarEmpleados = mysqli_query($conexion, "SELECT * FROM `empleados` INNER JOIN puesto on `puesto`.`Id_puesto` = `empleados`.`cargo`");
              if ($mostrarEmpleados->num_rows > 0) {
                while ($row  = mysqli_fetch_array($mostrarEmpleados)) {
              ?>
                  <tr class="tr">

                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["nombres"]; ?></td>
                    <td><?php echo $row["apellido_p"]; ?></td>
                    <td><?php echo $row["apellido_m"]; ?></td>
                    <td><?php echo $row["usuario"]; ?></td>
                    <td><?php echo $row["correo"]; ?></td>
                    <td><?php echo $row["Puesto"]; ?></td>
                    <td>
                    <label>Entrada</label>
                      <input type="time" value="<?php echo $row["turno_entrada"]; ?>" disabled style="width: 110px;">
                      <label>Salida</label>
                      <input type="time" value="<?php echo $row["turno_salida"]; ?>" disabled style="width: 110px;">
                    </td>
                    <td class="chica">
                    <?php
                        $most = mysqli_query($conexion, "SELECT * FROM empleado_departamento inner join tipo on Id_departamento=id WHERE Id_empleado =".$row["id"]);
                    if ($most->num_rows > 0) {
                      while ($rows  = mysqli_fetch_array($most)) {
                          if($rows["Id_departamento"]){
                            echo $rows["tipo"]; echo"<br>";
                          }
                        }
                      }
                    ?>
                    </td>
                    <td>
                      <form action="Etrabajador.php" method="POST">
                        <input type="hidden" value="<?php echo $row["id"]; ?>" name="ID">
                        <button class=" editar" type="submit"><i class="fas fa-edit"></i> Editar
                          <span> </span></button>
                      </form>
                      <form action="./controllers/model.php" method="POST">
                        <input type="hidden" name="Valor" value="EliminarEmpleado">
                        <input type="hidden" value="<?php echo $row["id"]; ?>" name="ID">
                        <button class=" eliminar" type="submit"><span>
                            <i class="fa fa-eraser" aria-hidden="false"></i> Eliminar</span>
                        </button>
                      </form>
                    </td>

                  </tr>
              <?php }
              } ?>
            </tbody>

            <!--  <tfoot class="thead">
              <tr>
                <th class="tr_op6">Id</th>
                <th class="tr_op">Nombre</th>
                <th class="tr-op">Apellido paterno</th>
                <th class="tr-op">Apellido materno</th>
                <th class="tr-op">Usuario</th>
                <th class="tr-op">Contraseña</th>
                <th class="tr-op">Cargo</th>
                <th class="tr-op">Entrada</th>
                <th class="tr-op">Salida</th>
                <th class="tr-op">Opciones</th>
              </tr>
            </tfoot> -->
          </table>
          <!--Clientes-->
        </div>
      </div>
    </div>

  </div>
  <div class="container">

  </div>

  <!--Inicio-->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#example').DataTable({
        responsive: true,
        "language": {
          "lengthMenu": "Mostrar _MENU_ registros",
          "zeroRecords": "No se encontraron resultados",
          "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
          "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
          "infoFiltered": "(filtrado de un total de _MAX_ registros)",
          "sSearch": "Buscar: ",
          "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
          },
          "sProcessing": "Procesando...",
        }
      });
    });
  </script>
</body>

</html>