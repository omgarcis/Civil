<?php

//conectamos Con el servidor
$host ="localhost";
$user ="root";
$pass ="";
$db="civil";

//funcion llamada conexion con (dominio,usuarios,contraseña,base_de_datos)
$con = mysqli_connect($host,$user,$pass,$db)or die("Problemas al Conectar");
mysqli_select_db($con,$db)or die("problemas al conectar con la base de datos");


//Recibo todos los datos del formulario 
$nombre1=$_POST['nombre1'];
$nombre2=$_POST['nombre2'];
$apellido1=$_POST['apellido1'];
$apellido2=$_POST['apellido2'];
$cedula=$_POST['cedula'];
$telefono=$_POST['telefono'];
$email=$_POST['email'];
$departamento=$_POST['departamento'];
$municipio=$_POST['municipio'];
$barrio=$_POST['barrio'];
$direccion=$_POST['direccion'];
$nombreunidad=$_POST['nombreunidad'];


$sql="INSERT INTO usuarios (nombre1,nombre2,apellido1,apellido2,cedula,telefono,email,departamento,municipio,barrio,direccion, nombreunidad) VALUES('$nombre1', '$nombre2','$apellido1','$apellido2',
'$cedula','$telefono','$email','$departamento','$municipio','$barrio','$direccion','$nombreunidad' )";

$ejecutar=mysqli_query($con,$sql);

if(!$ejecutar){
    echo "hubo un error";
}else{
    echo"datos guardados<br><a href='Preguntas/Preguntas.html'>IR A LA ENCUESTA</a>";
}

?>