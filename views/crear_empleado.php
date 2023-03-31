<?php




session_start();
error_reporting(0);
	$varsesion = $_SESSION['nombre'];

	if($varsesion== null || $varsesion= ''){

	    header("Location: ../includes/login.php");
		die();
	}


//$id= $_GET['id'];
$conexion= mysqli_connect("localhost", "root", "1234", "prueba_tecnica_mp");
$consulta= "SELECT * FROM cargos";
$resultado = mysqli_query($conexion, $consulta);
//$cargos = mysqli_fetch_array($resultado);

?>


<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo empleado</title>

	<!--link rel="stylesheet" href="./css/es.css"-->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"-->
    <link rel="stylesheet" href="./css/estilos.css">
</head>

<body id="page-top">


<form  action="../includes/_functions.php" method="POST">
<div id="login" >
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                    
                            <br>
                            <br>
                            <h3 class="text-center">Registro de nuevo empleado</h3>
                            <div class="form-group">
                            <label for="nombre" class="form-label">Nombre *</label>
                            <input type="text"  id="nombre" name="nombre" class="form-control" required>
                            </div>

                            <div class="form-group">
                            <label for="cargo" class="form-label">Cargo *</label>
                            <select name="cargo" id="cargo" class="mdb-select md-form">
                            <option value="0">Seleccione:</option>
                            <?php
                                while ($cargos = mysqli_fetch_array($resultado)) {
                                    echo '<option value="'.$cargos["id_cargo"].'">'.$cargos["cargo"].'</option>';
                                }    
                            
                            ?>
                            </select>
                            </div>

                            <div class="form-group">
                                <label for="username">Correo:</label><br>
                                <input type="email" name="correo" id="correo" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                  <label for="telefono" class="form-label">Telefono *</label>
                                <input type="tel"  id="telefono" name="telefono" class="form-control" required>
                                
                            </div>

                            <div class="form-group">
                                  <label for="direccion" class="form-label">Direccion *</label>
                                <input type="text"  id="direccion" name="direccion" class="form-control" required>
                                
                            </div>
                            <div class="form-group">
                                <label for="ventas">Ventas</label><br>
                                <input type="number" name="ventas" id="ventas" class="form-control">
                                <input type="hidden" name="accion" value="crear_empleado">
                            </div>
                      
                        
                           <br>

                                <div class="mb-3">
                                    
                               <input type="submit" value="Guardar"class="btn btn-success">
                               <a href="empleados.php" class="btn btn-danger">Cancelar</a>
                               
                            </div>
                            </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</body>
</html>