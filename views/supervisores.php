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
    <!--link rel="stylesheet" href="../css/fontawesome-all.min.css"-->
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
      <a class="btn btn-warning" href="../views/empleados.php">Volver 
      <i class="fa fa-plus"></i>
       </a>
		</div>
		<br>
           <br>
			</form>
      <table class="table table-striped" id= "table_id">

                   
                         <thead>    
                         <tr>
                        <th>Nombre</th>
                        <th>Cargo</th>
                        <th>Comisiones totales</th>
                        </tr>
                        </thead>
                        <tbody>

				<?php

$conexion=mysqli_connect("localhost","root","1234","prueba_tecnica_mp");               
$SQL="SELECT CONCAT('$', FORMAT((sum(e.venta)*0.05), 1)) as comision, c.cargo as cargo, (select nombre from empelados where fk_id_cargo = 5) as supervisor FROM empelados e join cargos c on e.fk_id_cargo = c.id_cargo;";
$dato = mysqli_query($conexion, $SQL);

if($dato -> num_rows >0){
    while($fila=mysqli_fetch_array($dato)){
    
?>
<tr>
<td><?php echo $fila['supervisor']; ?></td>
<td><?php echo $fila['cargo']; ?></td>
<td><?php echo $fila['comision']; ?></td>

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