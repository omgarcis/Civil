<?php

//conectamos Con el servidor
$host ="localhost";
$user ="root";
$pass ="";
$db="civil";

//funcion llamada conexion con (dominio,usuarios,contraseña,base_de_datos)
$con = mysqli_connect($host,$user,$pass,$db)or die("Problemas al Conectar");
mysqli_select_db($con,$db)or die("problemas al conectar con la base de datos");

$usuario1=$_POST['usuario1'];
$contraseña2=$_POST['contraseña2'];

$sql=mysqli_query($con,"SELECT * FROM administrador WHERE usuario='".$usuario1."' and contraseña='".$contraseña2."' ");
$nr=mysqli_num_rows($sql);

if ($nr == 1){
    header("Location:admin.html");
}else{
    echo"No Ingreso";
}


?>