<?php
   
require_once ("_db.php");




if (isset($_POST['accion'])){ 
    switch ($_POST['accion']){
        //casos de registros
        case 'editar_registro':
            editar_registro();
            break; 

            case 'eliminar_registro';
            eliminar_registro();
    
            break;

            case 'acceso_user';
            acceso_user();
            break;

            case 'crear_empleado';
            crear_empleado();
            break;

            case 'agregar_venta';
            agregar_venta();
            break;

            case 'crear_usuario';
            crear_usuario();
            break;


		}

	}

    function editar_registro() {
		$conexion=mysqli_connect("localhost","root","1234","prueba_tecnica_mp");
		extract($_POST);
		$consulta="UPDATE user SET nombre = '$nombre', correo = '$correo', telefono = '$telefono',
		password =md5('$password') WHERE id = '$id' ";

		mysqli_query($conexion, $consulta);


		header('Location: ../views/user.php');

}

function eliminar_registro() {
    $conexion=mysqli_connect("localhost","root","1234","prueba_tecnica_mp");
    extract($_POST);
    $id= $_POST['id'];
    $consulta= "DELETE FROM user WHERE id= $id";

    mysqli_query($conexion, $consulta);


    header('Location: ../views/user.php');

}


//CRUD EMPLEADO
function crear_empleado() {
    $conexion=mysqli_connect("localhost","root","1234","prueba_tecnica_mp");
    //extract($_POST);
    if(strlen($_POST['nombre']) >=1 && strlen($_POST['telefono'])  >=1 
    && strlen($_POST['direccion'])  >=1){

        $nombre = trim($_POST['nombre']);
        $cargo = trim($_POST['cargo']);
        $correo = trim($_POST['correo']);
        $telefono = trim($_POST['telefono']);
        $direccion = trim($_POST['direccion']);
        //$ventas = isset($_POST['ventas']) ? $_POST['ventas'] : 0;
        
        $consulta="INSERT INTO empelados (nombre, correo, telefono, fk_id_cargo, direccion)
        VALUES ('$nombre', '$correo','$telefono','$cargo','$direccion' )";

        mysqli_query($conexion, $consulta);


        header('Location: ../views/empleados.php');
    }

}

function agregar_venta(){

    $conexion=mysqli_connect("localhost","root","1234","prueba_tecnica_mp");
    extract($_POST);
    $consulta="UPDATE empelados SET venta = venta+$venta WHERE id = '$id' ";

    mysqli_query($conexion, $consulta);


    header('Location: ../views/empleados.php');

}

//CREAR USUARIO NUEVO
function crear_usuario(){

    $conexion=mysqli_connect("localhost","root","1234","prueba_tecnica_mp");

        $nombre = trim($_POST['nombre']);
        $correo = trim($_POST['username']);
        $telefono = trim($_POST['telefono']);
        $password = trim($_POST['password']);
        //$ventas = isset($_POST['ventas']) ? $_POST['ventas'] : 0;
        
        $consulta= "INSERT INTO user (nombre, correo, telefono, password)
        VALUES ('$nombre', '$correo','$telefono',md5('$password') )";

        mysqli_query($conexion, $consulta);


        header('Location: login.php');
    


}


//VERIFICACION LOGIN
function acceso_user() {
    $nombre=$_POST['nombre'];
    $password=$_POST['password'];
    session_start();
    $_SESSION['nombre']=$nombre;

    $conexion=mysqli_connect("localhost","root","1234","prueba_tecnica_mp");
    $consulta= "SELECT * FROM user WHERE nombre='$nombre' AND password=md5('$password')";
    $resultado=mysqli_query($conexion, $consulta);
    $filas=mysqli_num_rows($resultado);

    if($filas){

        header('Location: ../views/user.php');

    }else{

        header('Location: login.php');
        session_destroy();

    }

  
}






