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
  <title>Rossana|Clientes</title>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet" />
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <script src="https://use.fontawesome.com/9a3779baf9.js"></script>
  <link rel="icon" type="image/x-icon" href="favicon.ico">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.2.0/mdb.min.css" rel="stylesheet" /> -->
  <script src="https://kit.fontawesome.com/e530d88f76.js" crossorigin="anonymous">
  </script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <script src="https://use.fontawesome.com/9a3779baf9.js"></script>
  <link rel="icon" type="image/x-icon" href="favicon.ico">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
</head>
<style>
  body {
    background-color: #f6f5f5;
    font-family: "Roboto", sans-serif;
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

  table {
    background-color: white;
  }

  th {
    background-color: #007aff;
    text-align: center;
    font-weight: 900;
    color: white;
  }

  .C-delete {
    background-color: #ec4646 !important;
    color: white !important;
  }

  .C-delete:hover {
    border-color: #F15353 !important;
    background-color: red !important;
    color: white !important;
  }

  .tr_op4 {
    width: 300px !important;
  }

  .tr_op5 {
    width: 50px !important;
  }

  .tr_op6 {
    width: 50px !important;
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
        <li class="nav-item ">
          <a class="nav-link" href="inventario.php">Inventario </a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <button class="salir" type="submit"><i class="fas fa-sign-out-alt"></i> <a class="textsalir" href="controllers/logout.php">Salir</a> </button>
      </form>
    </div>
  </nav>
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
      <div class="col-lg-12 p-5">
        <div class="row">
          <div class="col text-center">
            <h3><strong>Lista de prestamos</strong></h3>
          </div>
        </div>
        <div class="table table-responsive">
          <!--Clientes-->
          <table id="example" class="table table-bordered  display nowrap" cellspacing="0" width="100%">
            <thead class="thead">
              <tr>
                <th>Nombre</th>
                <th>Código</th>
                <th>Cantidad</th>
                <th>Persona</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
              require("./BaseDatos/Conexion.php"); //Necesitamos el archivo en donde viene la conexión de la base de datos
              require("./Clases/Clientes.php"); //Necesitamos el archivo en donde vienen las clases
              //Selecciona los clientes y muestra una tabla

              $most = mysqli_query($conexion, "SELECT * FROM empleado_departamento inner join tipo on Id_departamento=id WHERE Id_empleado =" . $_SESSION["id"]);
              if ($most->num_rows > 0) {
                while ($rows  = mysqli_fetch_array($most)) {
                  if ($rows["Id_departamento"] == "1") {
                    $tip = 1;
                    $mostrarClientes = mysqli_query($conexion, "SELECT * FROM `codigo` inner join productos on codigo.Id_producto = productos.id inner join venta on venta.Id_producto=codigo.Id_producto WHERE tipo =" . $tip);
                    if ($mostrarClientes->num_rows > 0) {
                      while ($row  = mysqli_fetch_array($mostrarClientes)) {
                        $array = array($row["nombre"], $row["codigo"]);
                        $cliente = new clientes();

                        $cliente->set_id($array[0]);
                        $cliente->set_nombre($array[1]);
                        $codigo = $row["Id_producto"];
                        $cantidad = $row["Cantidad"];
                        $clientee = $row["Cliente"];
                        $ven = $row["id_ven"];
              ?>
                        <tr class="tr">
                          <td><?php echo $cliente->get_id(); ?></td>
                          <td><?php echo $cliente->get_nombre(); ?></td>
                          <td><?php echo $cantidad; ?></td>
                          <td><?php echo $clientee; ?></td>
                          <td class="text-center">
                            <form action="./controllers/model.php" method="POST">
                              <input type="hidden" id="id_cliente" name="Id_cliente" value="<?php echo $codigo ?>">
                              <input type="hidden" id="id_ven" name="id_ven" value="<?php echo $ven ?>">
                              <input type="hidden" name="Valor" value="EliminarCliente">
                              <input class="btn btn-md m-0 px-3 py-2 z-depth-0 C-delete" type="submit" value="Eliminar">
                            </form>
                          </td>
                        </tr>
                      <?php }
                    }
                  }
                  if ($rows["Id_departamento"] == "2") {
                    $tip = 2;
                    $mostrarClientes = mysqli_query($conexion, "SELECT * FROM `codigo` inner join productos on codigo.Id_producto = productos.id inner join venta on venta.Id_producto=codigo.Id_producto WHERE tipo =" . $tip);
                    if ($mostrarClientes->num_rows > 0) {
                      while ($row  = mysqli_fetch_array($mostrarClientes)) {
                        $array = array($row["nombre"], $row["codigo"]);
                        $cliente = new clientes();

                        $cliente->set_id($array[0]);
                        $cliente->set_nombre($array[1]);
                        $codigo = $row["Id_producto"];
                        $cantidad = $row["Cantidad"];
                        $clientee = $row["Cliente"];
                        $ven = $row["id_ven"];
                      ?>
                        <tr class="tr">
                          <td><?php echo $cliente->get_id(); ?></td>
                          <td><?php echo $cliente->get_nombre(); ?></td>
                          <td><?php echo $cantidad; ?></td>
                          <td><?php echo $clientee; ?></td>
                          <td class="text-center">
                            <form action="./controllers/model.php" method="POST">
                              <input type="hidden" id="id_cliente" name="Id_cliente" value="<?php echo $codigo ?>">
                              <input type="hidden" id="id_ven" name="id_ven" value="<?php echo $ven ?>">
                              <input type="hidden" name="Valor" value="EliminarCliente">
                              <input class="btn btn-md m-0 px-3 py-2 z-depth-0 C-delete" type="submit" value="Eliminar">
                            </form>
                          </td>
                        </tr>
                      <?php }
                    }
                  }
                  if ($rows["Id_departamento"] == "3") {
                    $tip = 3;
                    $mostrarClientes = mysqli_query($conexion, "SELECT * FROM `codigo` inner join productos on codigo.Id_producto = productos.id inner join venta on venta.Id_producto=codigo.Id_producto WHERE tipo =" . $tip);
                    if ($mostrarClientes->num_rows > 0) {
                      while ($row  = mysqli_fetch_array($mostrarClientes)) {
                        $array = array($row["nombre"], $row["codigo"]);
                        $cliente = new clientes();

                        $cliente->set_id($array[0]);
                        $cliente->set_nombre($array[1]);
                        $codigo = $row["Id_producto"];
                        $cantidad = $row["Cantidad"];
                        $clientee = $row["Cliente"];
                        $ven = $row["id_ven"];
                      ?>
                        <tr class="tr">
                          <td><?php echo $cliente->get_id(); ?></td>
                          <td><?php echo $cliente->get_nombre(); ?></td>
                          <td><?php echo $cantidad; ?></td>
                          <td><?php echo $clientee; ?></td>
                          <td class="text-center">
                            <form action="./controllers/model.php" method="POST">
                              <input type="hidden" id="id_cliente" name="Id_cliente" value="<?php echo $codigo ?>">
                              <input type="hidden" id="id_ven" name="id_ven" value="<?php echo $ven ?>">
                              <input type="hidden" name="Valor" value="EliminarCliente">
                              <input class="btn btn-md m-0 px-3 py-2 z-depth-0 C-delete" type="submit" value="Eliminar">
                            </form>
                          </td>
                        </tr>
                      <?php }
                    }
                  }
                  if ($rows["Id_departamento"] == "4") {
                    $tip = 4;
                    $mostrarClientes = mysqli_query($conexion, "SELECT * FROM `codigo` inner join productos on codigo.Id_producto = productos.id inner join venta on venta.Id_producto=codigo.Id_producto WHERE tipo =" . $tip);
                    if ($mostrarClientes->num_rows > 0) {
                      while ($row  = mysqli_fetch_array($mostrarClientes)) {
                        $array = array($row["nombre"], $row["codigo"]);
                        $cliente = new clientes();

                        $cliente->set_id($array[0]);
                        $cliente->set_nombre($array[1]);
                        $codigo = $row["Id_producto"];
                        $cantidad = $row["Cantidad"];
                        $clientee = $row["Cliente"];
                        $ven = $row["id_ven"];
                      ?>
                        <tr class="tr">
                          <td><?php echo $cliente->get_id(); ?></td>
                          <td><?php echo $cliente->get_nombre(); ?></td>
                          <td><?php echo $cantidad; ?></td>
                          <td><?php echo $clientee; ?></td>
                          <td class="text-center">
                            <form action="./controllers/model.php" method="POST">
                              <input type="hidden" id="id_cliente" name="Id_cliente" value="<?php echo $codigo ?>">
                              <input type="hidden" id="id_ven" name="id_ven" value="<?php echo $ven ?>">
                              <input type="hidden" name="Valor" value="EliminarCliente">
                              <input class="btn btn-md m-0 px-3 py-2 z-depth-0 C-delete" type="submit" value="Eliminar">
                            </form>
                          </td>
                        </tr>
                      <?php }
                    }
                  }
                  if ($rows["Id_departamento"] == "5") {
                    $tip = 5;
                    $mostrarClientes = mysqli_query($conexion, "SELECT * FROM `codigo` inner join productos on codigo.Id_producto = productos.id inner join venta on venta.Id_producto=codigo.Id_producto WHERE tipo =" . $tip);
                    if ($mostrarClientes->num_rows > 0) {
                      while ($row  = mysqli_fetch_array($mostrarClientes)) {
                        $array = array($row["nombre"], $row["codigo"]);
                        $cliente = new clientes();

                        $cliente->set_id($array[0]);
                        $cliente->set_nombre($array[1]);
                        $codigo = $row["Id_producto"];
                        $cantidad = $row["Cantidad"];
                        $clientee = $row["Cliente"];
                        $ven = $row["id_ven"];
                      ?>
                        <tr class="tr">
                          <td><?php echo $cliente->get_id(); ?></td>
                          <td><?php echo $cliente->get_nombre(); ?></td>
                          <td><?php echo $cantidad; ?></td>
                          <td><?php echo $clientee; ?></td>
                          <td class="text-center">
                            <form action="./controllers/model.php" method="POST">
                              <input type="hidden" id="id_cliente" name="Id_cliente" value="<?php echo $codigo ?>">
                              <input type="hidden" id="id_ven" name="id_ven" value="<?php echo $ven ?>">
                              <input type="hidden" name="Valor" value="EliminarCliente">
                              <input class="btn btn-md m-0 px-3 py-2 z-depth-0 C-delete" type="submit" value="Eliminar">
                            </form>
                          </td>
                        </tr>
                      <?php }
                    }
                  }
                  if ($rows["Id_departamento"] == "6") {
                    $tip = 6;
                    $mostrarClientes = mysqli_query($conexion, "SELECT * FROM `codigo` inner join productos on codigo.Id_producto = productos.id inner join venta on venta.Id_producto=codigo.Id_producto WHERE tipo =" . $tip);
                    if ($mostrarClientes->num_rows > 0) {
                      while ($row  = mysqli_fetch_array($mostrarClientes)) {
                        $array = array($row["nombre"], $row["codigo"]);
                        $cliente = new clientes();

                        $cliente->set_id($array[0]);
                        $cliente->set_nombre($array[1]);
                        $codigo = $row["Id_producto"];
                        $cantidad = $row["Cantidad"];
                        $clientee = $row["Cliente"];
                        $ven = $row["id_ven"];
                      ?>
                        <tr class="tr">
                          <td><?php echo $cliente->get_id(); ?></td>
                          <td><?php echo $cliente->get_nombre(); ?></td>
                          <td><?php echo $cantidad; ?></td>
                          <td><?php echo $clientee; ?></td>
                          <td class="text-center">
                            <form action="./controllers/model.php" method="POST">
                              <input type="hidden" id="id_cliente" name="Id_cliente" value="<?php echo $codigo ?>">
                              <input type="hidden" id="id_ven" name="id_ven" value="<?php echo $ven ?>">
                              <input type="hidden" name="Valor" value="EliminarCliente">
                              <input class="btn btn-md m-0 px-3 py-2 z-depth-0 C-delete" type="submit" value="Eliminar">
                            </form>
                          </td>
                        </tr>
              <?php }
                    }
                  }
                }
              }

              ?>
            </tbody>
          </table>
          <!--Clientes-->
        </div>
      </div>
    </div>
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
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.2.0/mdb.min.js"></script>
 -->

</html>