<?php

//conectamos Con el servidor
$db_host ="localhost";
$db_user ="root";
$db_pass ="";
$db_database="civil";

//funcion llamada conexion con (dominio,usuarios,contraseña,base_de_datos)
$con = mysqli_connect($db_host,$db_user,$db_pass,$db_database)or die("Problemas al Conectar");
mysqli_select_db($con,$db_database)or die("problemas al conectar con la base de datos");

	        if (isset($_REQUEST['Enviar'])){
                        $cedula1=$_POST['cedula1'];
                        $formacion=$_POST['formacion'];
                        $construccion=$_POST['construccion'];
                        $constructora=$_POST['constructora'];
                        if($constructora=='si'){
                                $nombrecontructora=$_POST['nombreconstructora'];
                        }else{
                                $nombrecontructora='No aplica';
                        }
                        $area=$_POST['area'];
                        $tamanoArchivo = $_FILES['fotovivienda']['size'];
						$imagenSubida = fopen($_FILES['fotovivienda']['tmp_name'], 'r');
                        $binariosImagen = fread($imagenSubida, $tamanoArchivo);

                        $binariosImagen = mysqli_escape_string($con, $binariosImagen);
                        $ubicacion=$_POST['ubicacion'];
                        $elementos=$_POST['elementos'];
                        $uso=$_POST['uso'];
                        if($uso=='Otro'){
                                $uso=$_POST['otrouso'];
                        }
                        $usoresp=$_POST['usoresp'];
                        if($usoresp=='si'){
                                $usoanterior=$_POST['usoanterior'];
                                if($usoanterior=='Otro'){
                                        $usoanterior=$_POST['otrousoanterior'];
                                }
                        }else{
                                $usoanterior='No aplica';
                        }
                        $usoprimerpiso=$_POST['usoprimerpiso'];
                        $nro_pisos=$_POST['nro_pisos'];
                        $elementosP=$_POST['elementosP'];
                        $elementosSP=$_POST['elementosSP'];
                        $elementosMU=$_POST['elementosMU'];
                        $elementosEQ=$_POST['elementosEQ'];
                        if($elementosEQ=='Otro'){
                                $elementosEQ=$_POST['otroelementosEQ'];
                        }
                        $elementosAP=$_POST['elementosAP'];

                        $elementosMCV=$_POST['elementosMCV'];
                        if($elementosMCV == 'Mamposteria'){
                                $elementostipo=$_POST['elementosTM'];
                        }else if($elementosMCV == 'Concreto Reforzado'){
                                $elementostipo=$_POST['elementosCR'];
                        }else if($elementosMCV=='Prefabricado'){
                                $elementostipo=$_POST['elementosPRF'];
                        }else if($elementosMCV=='Otro'){
                                $elementosMCV=$_POST['otroelementosMCV'];
                                $elementostipo='No aplica';
                        }
                        $elementosCPV=$_POST['elementosCPV'];
                        $elementosMCTV=$_POST['elementosMCTV'];
                        $elementosEA=$_POST['elementosEA'];
                        $elementosGC=$_POST['elementosGC'];

                        $query = "INSERT INTO respuestas (cedula, formacion, construccion, constructora, nombre_constructora, area, foto_vivienda, 
                        ubicacion, elementos_cercanos, uso, uso_anterior_resp, uso_anterior, uso_primer_piso, nro_pisos, piso_de_vivienda,
                        nro_sotanos, muro_vecinos, elementos, altura_pisos, material, tipo, piso, techo, asentamiento, grietas) values 
                                ('$cedula1','$formacion','$construccion','$constructora','$nombrecontructora','$area','" . $binariosImagen . "',
                                '$ubicacion','$elementos','$uso','$usoresp','$usoanterior','$usoprimerpiso','$nro_pisos','$elementosP',
                                '$elementosSP','$elementosMU','$elementosEQ','$elementosAP','$elementosMCV','$elementostipo','$elementosCPV','$elementosMCTV','$elementosEA','$elementosGC'); ";
			$res = mysqli_query($con, $query);
                        if ($res) {
                                echo"Registro insertado exitosamente";
                        } else {
                                echo"Error";
                        }
                }
?>