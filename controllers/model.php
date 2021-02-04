<?php
//Aquí se encuentran todas las funciones utilizadas en el sistema

$opcion = "agregar";    //Comenzamos con un declarar la variable opcion donde se guardará la acción que haremos
if (isset($_POST['Valor'])) {   //Al enviar por metodo POST, si viene la variable con nombre "Valor" entrará a este If
    $opcion = $_POST['Valor'];  //Pasamos por metodo POST dato con nombre "Valor" y su valor que será la funcion que activará
}
switch ($opcion) {    //El switch busca el case que coincida  y llama a la funcion
    case "Actualizar": //Entra al case dependiendo que valor trae $opcion
        actualizarProducto();   //Llama a la función en cuestión
        error();    //Si falla la primera función entra en la segunda función que es de error
        break;
    case "Eliminar":
        eliminarProducto();
        error();
        break;
    case "Agregar":
        agregarProducto();
        error();
        break;
    case "Listamenos":
        quitarProductodeLista();
        error();
        break;
    case "Llenarlista":
        agregarItemLista();
        error();
        break;
    case "CancelarVenta":
        CancelarVenta();
        error();
        break;
    case "AgregarCliente":
        agregarCliente();
        error();
        break;
    case "EliminarCliente":
        eliminarCliente();
        error();
        break;
    case "AgregarEmpleado":
        agregarEmpleado();
        error();
        break;
    case "EditarEmpleado":
        editarEmpleado();
        error();
        break;
    case "EliminarEmpleado":
        eliminarEmpleado();
        error();
        break;
    case "ActualizarTicket":
        actualizarTicket();
        error();
        break;
}


//Declaramos la funcion que utilizaremos cuando se actualiza el producto
function actualizarProducto()
{
    @session_start();
    $nombre = $_POST["nombre"]; //Por metodo POST se reciben los datos que utilizaremos
    $Precio = $_POST["precio"];
    $Tamaño = $_POST["tamaño"];
    $Cantidad = $_POST["cantidad"];
    $tipo = $_POST["Tipo"];
    $id = $_POST["id"];
    $descripcion = $_POST["descripcion"];
    $empleado = $_POST["empleado"];
    $codigo = $_POST["codigo"];

    require("../BaseDatos/Conexion.php"); //Necesitamos el archivo en donde viene la conexión de la base de datos
    $most = mysqli_query($conexion, "SELECT * FROM empleado_codigo WHERE empleado =" . $_SESSION["id"]);
    if ($most->num_rows > 0) {
        while ($row = mysqli_fetch_array($most)) {
            $codigoBase = $row["codigo"];
            if ($codigo == $codigoBase) {
                $actualizarProducto = mysqli_query($conexion, "UPDATE `productos` SET `nombre` = '" . $nombre . "',`precio` = '" . $Precio . "', `cantidad_existente` = `cantidad_existente` + '" . $Cantidad . "', `tipo` = '" . $tipo . "', `Tamaño` = '" . $Tamaño . "' WHERE `productos`.`id` = " . $id);
                //If la consulta es correcta enviará esta ventana emergente
                if ($actualizarProducto) {
                    $anotarDescripcion = mysqli_query($conexion, "INSERT INTO `actualizaciones` (`descripcion`, `producto`, `nombre_empleado`, `fecha`) VALUES ('" . $descripcion . "', '" . $id . "', '" . $empleado . "',now());");
                    if ($anotarDescripcion) {
                        echo "<script type=\"text/javascript\"> alert (\"Producto Actualizado\"); </script>";
                        echo "<script type='text/javascript'>

    window.location='../inventario.php';

    </script>";
                    }
                }
            } else {
                echo "<script type=\"text/javascript\"> alert (\"No coinciden los códigos\"); </script>";
                echo "<script type='text/javascript'>

    window.location='../inventario.php';

    </script>";
            }
        }
    }
}

//Declaramos la funcion que utilizaremos cuando se actualiza el producto
function eliminarProducto()
{
    @session_start();
    $nombre = $_POST["descripcion"];
    $empleado = $_POST["empleado"];
    $id = $_POST["id"]; //Por metodo POST se reciben los datos que utilizaremos
    $codigo = $_POST["codigo"];
    require("../BaseDatos/Conexion.php"); //Necesitamos el archivo en donde viene la conexión de la base de datos
    $most = mysqli_query($conexion, "SELECT * FROM empleado_codigo WHERE empleado =" . $_SESSION["id"]);
    if ($most->num_rows > 0) {
        while ($row = mysqli_fetch_array($most)) {
            $codigoBase = $row["codigo"];
            if ($codigo == $codigoBase) {
                $eliminarProducto = mysqli_query($conexion, "DELETE FROM `productos` WHERE `productos`.`id` =" . $id);

                $registroEliminado = mysqli_query($conexion, "INSERT INTO `eliminados` (`descripcion`, `producto`, `nombre_empleado`, `fecha`) VALUES ('" . $nombre . "', '" . $id . "', '" . $empleado . "',now());");
                if ($registroEliminado) {
                    if ($eliminarProducto) {
                        echo "<script type=\"text/javascript\"> alert (\"Produto eliminado\"); </script>";
                        echo "<script type='text/javascript'>

            window.location='../inventario.php';

            </script>";
                    }
                }
            }else {
                echo "<script type=\"text/javascript\"> alert (\"No coinciden los códigos\"); </script>";
                echo "<script type='text/javascript'>

            window.location='../inventario.php';

            </script>";
            }
        }
    }
}

//Declaramos la funcion que utilizaremos cuando se agrega un producto
function agregarProducto()
{
    @session_start();
    $nombre = $_POST["nombre"]; //Por metodo POST se reciben los datos que utilizaremos
    $Precio = $_POST["precio"];
    $Tamaño = $_POST["tamaño"];
    $Cantidad = $_POST["cantidad"];
    $tipo = $_POST["tipo"];
    $codigo = $_POST["codigo"];

    require("../BaseDatos/Conexion.php"); //Necesitamos el archivo en donde viene la conexión de la base de datos
    $most = mysqli_query($conexion, "SELECT * FROM empleado_codigo WHERE empleado =" . $_SESSION["id"]);
    if ($most->num_rows > 0) {
        while ($row = mysqli_fetch_array($most)) {
            $codigoBase = $row["codigo"];
            if ($codigo == $codigoBase) {
                //Insertar productos en la tabla productos con los parametros que recibimos de la ventana agregar producto
                $agregarProducto = mysqli_query($conexion, "INSERT INTO `productos` (`id`, `nombre`, `precio`, `cantidad_existente`, `tipo`, `Tamaño`) VALUES (NULL, '" . $nombre . "', '" . $Precio . "', '" . $Cantidad . "', '" . $tipo . "', '" . $Tamaño . "');");
                //If la consulta es correcta enviará esta ventana emergente
                if ($agregarProducto) {

                    echo "<script type=\"text/javascript\"> alert (\"Producto Agregado\"); </script>";
                    echo "<script type='text/javascript'>

    window.location='../Pagregar.php';

    </script>";
                }
            } else {
                echo "<script type=\"text/javascript\"> alert (\"No coinciden los códigos\"); </script>";
                echo "<script type='text/javascript'>

    window.location='../Pagregar.php';

    </script>";
            }
        }
    }
}

//Declaramos la funcion que utilizaremos cuando se quita un producto de la lista o carro de compras
function quitarProductodeLista()
{
    $id = $_POST["id_carro"]; //Por metodo POST se reciben los datos que utilizaremos
    $idp = $_POST["id_producto"];
    $Cantidad = $_POST["cantidad"];
    require("../BaseDatos/Conexion.php"); //Necesitamos el archivo en donde viene la conexión de la base de datos
    //Elimina un producto del carro de compras donde el Id que recibimos sea igual al Id de la tabla carro
    $eliminarProducto = mysqli_query($conexion, "DELETE FROM `carrito` WHERE `carrito`.`Id_carro`=" . $id);
    //If la consulta es correcta enviará esta ventana emergente
    if ($eliminarProducto) {

        echo "<script type=\"text/javascript\"> alert (\"Producto eliminado de la lista\"); </script>";
        echo "<script type='text/javascript'>

    window.location='../Geventa.php';

    </script>";
    }
    cantidadPlus($Cantidad, $idp); //Llamamos a la funcion cantidadPlus para recuperar la resta del producto de la tabla
}

//Declaramos la funcion que utilizaremos para recuperar la cantitdad de items borrado
function cantidadPlus($Cantidad, $idp)
{
    require("../BaseDatos/Conexion.php"); //Necesitamos el archivo en donde viene la conexión de la base de datos
    //Cuando quitamos un producto de la lista, recuperamos esa cantidad y la sumamos a su antiguo para valor para dejarla con su valor anterior
    $actualizarCantidadplus = mysqli_query($conexion, "UPDATE `productos` SET `cantidad_existente` = `cantidad_existente` + '" . $Cantidad . "' WHERE `productos`.`id` =" . $idp);
    if ($actualizarCantidadplus) {
    }
}

//Declaramos la funcion que utilizaremos cuando agregamos un item al carrito
function agregarItemLista()
{

    $id = $_POST["ID"]; //Por metodo POST se reciben los datos que utilizaremos
    $Precio = $_POST["precio"];
    $Cantidad = $_POST["cantidad"];
    $vendedor = $_POST["idVendedor"];
    $fecha = $_POST["fecha"];
    $cliente = $_POST["cliente"];
    $numero = $_POST["numero"];

    require("../BaseDatos/Conexion.php"); //Necesitamos el archivo en donde viene la conexión de la base de datos
    //Agregar al carrito los items antes de generar la factura
    $sql = "INSERT INTO `carrito` (`Id_carro`, `Id_producto`, `Cantidad`, `Precio`, `Vendedor`, `Fecha`,`Cliente`,`ID`) VALUES (NULL, '" . $id . "', '" . $Cantidad . "', '" . $Precio . "','" . $vendedor . "','" . $fecha . "','" . $cliente . "','" . $numero . "');";
    $actualizarProducto = mysqli_query($conexion, $sql);
    //If la consulta es correcta enviará esta ventana emergente
    if ($actualizarProducto) {
        cantidad($Cantidad, $id); //LLamamos a la función cantidad para eliminar la cantidad de items en el inventario e ir restando

        echo "<script type=\"text/javascript\"> alert (\"Producto Agregado\"); </script>";
        echo "<script type='text/javascript'>

    window.location='../Geventa.php';

    </script>";
    }
}

//Declaramos la funcion que utilizaremos cuando vamos a eliminar los items
function cantidad($Cantidad, $id)
{
    require("../BaseDatos/Conexion.php"); //Necesitamos el archivo en donde viene la conexión de la base de datos
    //Actualizamos la cantidad existente en la tabla productos y así restar lo que ya se vendió
    $actualizarCantidad = mysqli_query($conexion, "UPDATE `productos` SET `cantidad_existente` = `cantidad_existente` - '" . $Cantidad . "' WHERE `productos`.`id` =" . $id);
    if ($actualizarCantidad) {
    }
}

//Declaramos la funcion que utilizaremos cuando se cancela la venta para eliminar todos los datos de carrito
function cancelarVenta()
{
    $idp = $_POST["Id_producto"]; //Por metodo POST se reciben los datos que utilizaremos
    $Cantidad = $_POST["Cantidad"];
    require("../BaseDatos/Conexion.php"); //Necesitamos el archivo en donde viene la conexión de la base de datos
    //La consulta elimina todos los registros, solo dejamos uno que lleva el control de numero de ventas
    $actualizarProducto = mysqli_query($conexion, "DELETE FROM carrito where `Id_carro` > 59");
    //If la consulta es correcta enviará esta ventana emergente
    if ($actualizarProducto) {

        echo "<script type=\"text/javascript\"> alert (\"Venta cancelada\"); </script>";
        echo "<script type='text/javascript'>

    window.location='../Geventa.php';

    </script>";
    }
    cantidadPlus($Cantidad, $idp);
}

//Declaramos la funcion que utilizaremos cuando agregamos un cliente
function agregarCliente()
{
    $cliente = $_POST["cliente"]; //Por metodo POST se reciben los datos que utilizaremos

    require("../BaseDatos/Conexion.php"); //Necesitamos el archivo en donde viene la conexión de la base de datos
    //Inserta clientes en su tabla
    $agregarCliente = mysqli_query($conexion, "INSERT INTO `clientes` (`id`, `nombre`) VALUES (NULL, '" . $cliente . "');");
    //If la consulta es correcta enviará esta ventana emergente
    if ($agregarCliente) {

        echo "<script type=\"text/javascript\"> alert (\"Cliente Agregado\"); </script>";
        echo "<script type='text/javascript'>

    window.location='../clientes.php';

    </script>";
    }
}

//Declaramos la funcion que utilizaremos cuando eliminamos un cliente
function eliminarCliente()
{
    $id = $_POST["Id_cliente"]; //Por metodo POST se reciben los datos que utilizaremos
    $ven = $_POST["id_ven"];
    require("../BaseDatos/Conexion.php"); //Necesitamos el archivo en donde viene la conexión de la base de datos
    $devolverCliente = mysqli_query($conexion,  "SELECT * FROM `codigo` inner join productos on codigo.Id_producto ='" . $id . "' inner join venta on venta.Id_producto=codigo.Id_producto");
    if ($devolverCliente->num_rows > 0) {
        while ($row = mysqli_fetch_array($devolverCliente)) {
            $cantidad = $row["Cantidad"];
            $venta = $row["codigo"];
            $producto = $row["Id_producto"];
        }
        cantidadPlus($cantidad, $id);
    }
    //Elimina el cliente donde el id recibido es igual al de la tabla de clientes
    $eliminarCliente = mysqli_query($conexion,  "DELETE FROM `codigo` WHERE Id_producto =" . $id);
    //If la consulta es correcta enviará esta ventana emergente
    if ($eliminarCliente) {
        $eliminarVenta = mysqli_query($conexion,  "DELETE FROM `venta` WHERE Id_venta ='" . $ven . "' AND Id_producto =" . $id);
        if ($eliminarVenta) {
            echo "<script type=\"text/javascript\"> alert (\"Producto devuelto\"); </script>";
            echo "<script type='text/javascript'>

    window.location='../Clientes.php';

    </script>";
        }
    }
}

//Declaramos la funcion que utilizaremos cuando agregamos empleados
function agregarEmpleado()
{
    $nombre = $_POST["nombre"]; //Por metodo POST se reciben los datos que utilizaremos
    $ap_p = $_POST["ap_p"];
    $ap_m = $_POST["ap_m"];
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    $puesto = $_POST["puesto"];
    $entrada = $_POST["Entrada"];
    $salida = $_POST["Salida"];

    require("../BaseDatos/Conexion.php"); //Necesitamos el archivo en donde viene la conexión de la base de datos
    //Inserta los datos de un empleado a su tabla correspondiente
    $agregarEmpleado = mysqli_query($conexion, "INSERT INTO `empleados` (`id`, `nombres`, `apellido_p`, `apellido_m`, `usuario`, `contraseña`, `cargo`, `turno_entrada`, `turno_salida`)
    VALUES (NULL, '" . $nombre . "', '" . $ap_p . "', '" . $ap_m . "', '" . $user . "', '" . $pass . "', '" . $puesto . "', '" . $entrada . "', '" . $salida . "');");
    //If la consulta es correcta enviará esta ventana emergente
    if ($agregarEmpleado) {

        echo "<script type=\"text/javascript\"> alert (\"Empleado Agregado\"); </script>";
        echo "<script type='text/javascript'>

    window.location='../Trabajadores.php';

    </script>";
    }
}

//Declaramos la funcion que utilizaremos cuando editamos empleados
function editarEmpleado()
{
    $id = $_POST["ID"]; //Por metodo POST se reciben los datos que utilizaremos
    $nombre = $_POST["Nombre"];
    $ap_p = $_POST["Ap_p"];
    $ap_m = $_POST["Ap_m"];
    $user = $_POST["User"];
    $pass = $_POST["Pass"];
    $puesto = $_POST["puesto"];
    $entrada = $_POST["Entrada"];
    $salida = $_POST["Salida"];

    require("../BaseDatos/Conexion.php"); //Necesitamos el archivo en donde viene la conexión de la base de datos
    $insert = mysqli_query($conexion, "DELETE FROM empleado_departamento WHERE Id_empleado =" . $id);

    if (isset($_POST["departamento"])) {
        $departamento = $_POST["departamento"];
        $insert = mysqli_query($conexion, "INSERT INTO `empleado_departamento` (`Id_departamento`, `Id_empleado`) VALUES ('" . $departamento . "', '" . $id . "');");
    }

    if (isset($_POST["departamento1"])) {
        $departamento = $_POST["departamento1"];
        $insert = mysqli_query($conexion, "INSERT INTO `empleado_departamento` (`Id_departamento`, `Id_empleado`) VALUES ('" . $departamento . "', '" . $id . "');");
    }
    if (isset($_POST["departamento2"])) {
        $departamento = $_POST["departamento2"];
        $insert = mysqli_query($conexion, "INSERT INTO `empleado_departamento` (`Id_departamento`, `Id_empleado`) VALUES ('" . $departamento . "', '" . $id . "');");
    }
    if (isset($_POST["departamento3"])) {
        $departamento = $_POST["departamento3"];
        $insert = mysqli_query($conexion, "INSERT INTO `empleado_departamento` (`Id_departamento`, `Id_empleado`) VALUES ('" . $departamento . "', '" . $id . "');");
    }
    if (isset($_POST["departamento4"])) {
        $departamento = $_POST["departamento4"];
        $insert = mysqli_query($conexion, "INSERT INTO `empleado_departamento` (`Id_departamento`, `Id_empleado`) VALUES ('" . $departamento . "', '" . $id . "');");
    }
    if (isset($_POST["departamento5"])) {
        $departamento = $_POST["departamento5"];
        $insert = mysqli_query($conexion, "INSERT INTO `empleado_departamento` (`Id_departamento`, `Id_empleado`) VALUES ('" . $departamento . "', '" . $id . "');");
    }
    if (isset($_POST["departamento6"])) {
        $departamento = $_POST["departamento6"];
        $insert = mysqli_query($conexion, "INSERT INTO `empleado_departamento` (`Id_departamento`, `Id_empleado`) VALUES ('" . $departamento . "', '" . $id . "');");
    }

    //Actualiza los datos de un empleado a su tabla correspondiente
    if ($insert) {
        $editarEmpleado = mysqli_query($conexion, "UPDATE `empleados` SET `nombres` = '" . $nombre . "', `apellido_p` = '" . $ap_p . "', `apellido_m` = '" . $ap_m . "', `usuario` = '" . $user . "', `contraseña` = '" . $pass . "', `cargo` = '" . $puesto . "', `turno_entrada` = '" . $entrada . "', `turno_salida` = '" . $salida . "' WHERE `empleados`.`id` =" . $id);
        //If la consulta es correcta enviará esta ventana emergente
        if ($editarEmpleado) {

            echo "<script type=\"text/javascript\"> alert (\"Empleado Editado\"); </script>";
            echo "<script type='text/javascript'>

    window.location='../Trabajadores.php';

    </script>";
        }
    }
}

//Declaramos la funcion que utilizaremos cuando eliminamos empleados
function eliminarEmpleado()
{
    $id = $_POST["ID"]; //Por metodo POST se reciben los datos que utilizaremos

    require("../BaseDatos/Conexion.php"); //Necesitamos el archivo en donde viene la conexión de la base de datos
    //Elimina empleado que tiene el mismo id
    $eliminarCliente = mysqli_query($conexion, "DELETE FROM `empleados` WHERE `empleados`.`id` =" . $id);
    //If la consulta es correcta enviará esta ventana emergente
    if ($eliminarCliente) {

        echo "<script type=\"text/javascript\"> alert (\"Empleado Eliminado\"); </script>";
        echo "<script type='text/javascript'>

    window.location='../Trabajadores.php';

    </script>";
    }
}

//Declaramos la funcion que utilizaremos cuando actualiza el ticket
function actualizarTicket()
{
    $bodega = $_POST["bodega"]; //Por metodo POST se reciben los datos que utilizaremos
    $direccion = $_POST["direccion"];
    $horario = $_POST["horario"];
    $horario2 = $_POST["horario2"];
    $telefono = $_POST["telefono"];
    $saludo = $_POST["saludo"];
    $saludo2 = $_POST["saludo2"];
    require("../BaseDatos/Conexion.php"); //Necesitamos el archivo en donde viene la conexión de la base de datos
    //Actualiza los datos del ticket o factura
    $actualizarTicket = mysqli_query($conexion, "UPDATE `ticket` set `nombre` = '" . $bodega . "', `direccion` = '" . $direccion . "', `horario_apertura` = '" . $horario . "', `horario_cierre` = '" . $horario2 . "', `telefono` = '" . $telefono . "', `saludo` = '" . $saludo . "', `saludo_2` = '" . $saludo2 . "' WHERE `Id` = 1");
    //If la consulta es correcta enviará esta ventana emergente
    if ($actualizarTicket) {

        echo "<script type=\"text/javascript\"> alert (\"Ticket Actualizado\"); </script>";
        echo "<script type='text/javascript'>

    window.location='../Geventa.php';

    </script>";
    }
}

//Declaramos la funcion que utilizaremos cuando falle alguna consulta
function error()
{
    //Se enviará esta ventana emergente
    echo "<script type=\"text/javascript\"> alert (\"Hubo un problema con tu petición\"); </script>";
    echo "<script type='text/javascript'>window.location='../home.php';</script>";
}
