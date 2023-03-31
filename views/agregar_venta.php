<?php

session_start();
error_reporting(0);
	$varsesion = $_SESSION['nombre'];

	if($varsesion== null || $varsesion= ''){

	    header("Location: ../includes/login.php");
		die();
	}


$id= $_GET['id'];
$conexion= mysqli_connect("localhost", "root", "1234", "prueba_tecnica_mp");
$consulta= "SELECT * FROM empelados WHERE id = $id";
$resultado = mysqli_query($conexion, $consulta);
$usuario = mysqli_fetch_assoc($resultado);

?>


<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar ventas</title>


    <link rel="stylesheet" href="../css/fontawesome-all.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"-->
    <link rel="stylesheet" href="../css/styles.css">
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
                            <h3 class="text-center">Agregar Ventas</h3>
                            <div class="form-group">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text"  id="nombre" readonly name="nombre" class="form-control" value="<?php echo $usuario['nombre'];?>">
                            </div>
                            <div class="form-group">
                                <label for="cargo">Cargo</label><br>
                                <input type="text" name="cargo" readonly id="cargo" class="form-control" placeholder="" value="<?php echo $usuario['correo'];?>">
                            </div>
                            <div class="form-group">
                                <label for="venta">Ventas:</label><br>
                                <input type="venta" name="venta" id="venta" class="form-control" required>
                                <input type="hidden" name="accion" value="agregar_venta">
                                <input type="hidden" name="id" value="<?php echo $id;?>">
                            </div>
                      
                        
                           <br>

                                <div class="mb-3">
                                    
                                <button type="submit" class="btn btn-success" >Agregar venta</button>
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