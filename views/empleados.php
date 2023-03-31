<?php
session_start();
error_reporting(0);
	$varsesion = $_SESSION['nombre'];

	if($varsesion== null || $varsesion= ''){

	    header("Location: ../includes/login.php");
		die();
	}


?>
<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<link rel="stylesheet" href="../css/estilo.css">
<link rel="stylesheet" href="../css/es.css">
    <title>Empleados</title>
</head>

<div class="container is-fluid">
<div class="col-xs-12">
		<h1>Lista de empleados</h1>
    <br>
		<div>
			<a class="btn area_usuario" href="user.php">Usuarios
      <i class="fa fa-plus"></i>
       </a>
       <a class="btn reg_usuario" href="../views/crear_empleado.php">Registrar empleado 
      <i class="fa fa-plus"></i>
       </a>
       <a class="btn area_supervisores" href="../views/supervisores.php">Supervisores 
      <i class="fa fa-plus"></i>
       </a>
       <a class="btn btn-warning" href="../includes/_sesion/cerrarSesion.php">Log Out <i class="fa fa-power-off" aria-hidden="true"></i></a>
		</div>
		<br>
           <br>
			</form>
      <table class="table table-striped" id= "table_id">

                   
                         <thead>    
                         <tr>
                        <th>Nombre</th>
                        <th>Cargo</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Direccion</th>
                        <th>Ventas totales</th>
                        <th>Fecha</th>
                        <th>Agregar venta</th>
                        <th>Calcular comision</th>
                        <!--th>Eliminar vendedor</th-->
         
                        </tr>
                        </thead>
                        <tbody>

				<?php

$conexion=mysqli_connect("localhost","root","1234","prueba_tecnica_mp");               
$SQL="SELECT CONCAT('$', FORMAT(sum(e.venta), 1)) as ventas,e.id as id, e.nombre,e.correo,e.telefono,c.cargo as cargo,e.fecha,e.direccion as direccion
FROM empelados e join cargos c on e.fk_id_cargo=c.id_cargo where e.fk_id_cargo not in (5) group by 2,3,4,5,6 order by id";
$dato = mysqli_query($conexion, $SQL);

if($dato -> num_rows >0){
    while($fila=mysqli_fetch_array($dato)){
    
?>
<tr>
<td><?php echo $fila['nombre']; ?></td>
<td><?php echo $fila['cargo']; ?></td>
<td><?php echo $fila['correo']; ?></td>
<td><?php echo $fila['telefono']; ?></td>
<td><?php echo $fila['direccion']; ?></td>
<td><?php echo $fila['ventas']; ?></td>
<td><?php echo $fila['fecha']; ?></td>



<td>
<a class="btn btn-success" href="agregar_venta.php?id=<?php echo $fila['id']?> "></a>
<i class="bi bi-plus-square-fill"></i>
  
</td>
<td>
<a class="btn btn-primary" href="calcular_comision.php?id=<?php echo $fila['id']?>">
<i class="fa fa-trash"></i></a>
</td>

<!--td>
<a class="btn btn-danger" href="empleados.php?id=<?php echo $fila['id']?>">
<i class="fa fa-trash"></i></a>
</td>
</tr-->


<?php
}
}else{

    ?>
    <tr class="text-center">
    <td colspan="16">No existen registros</td>
    </tr>

    
    <?php
    
}

?>


	</body>
  </table>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script src="../js/user.js"></script>


</html>