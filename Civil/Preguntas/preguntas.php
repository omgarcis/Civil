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
                        }else{
                                $elementostipo='No aplica';
                        }
                        $elementosCPV=$_POST['elementosCPV'];
                        $elementosMCTV=$_POST['elementosMCTV'];
                        $elementosEA=$_POST['elementosEA'];
                        $elementosGC=$_POST['elementosGC'];

                        //porcentaje
                        $punt=0;
                        //1
                        if($construccion=='antes de 1963'){
                                $punt=$punt+4;
                        }else if($construccion=='entre 1963 y 1984'){
                                $punt=$punt+3;
                        }else if($construccion=='entre 1985 y 1997'){
                                $punt=$punt+3;
                        }else if($construccion=='entre 1998 y 2010'){
                                $punt=$punt+2;
                        }else if($construccion=='apartir de 2011'){
                                $punt=$punt+1;
                        }
                        //2
                        if($constructora=='si'){
                                $punt=$punt+0;
                        }else if($constructora=='no'){
                                $punt=$punt+2;
                        }
                        //3
                        if($ubicacion=='ladera'){
                                $punt=$punt+0;
                        }else if($ubicacion=='valle'){
                                $punt=$punt+1;
                        }

                        //4
                        if($elementos=='quebrada'){
                                $punt=$punt+2;
                        }if($elementos=='valle'){
                                $punt=$punt+1;
                        }if($elementos=='montana'){
                                $punt=$punt+2;
                        }
                        //5
                        if($uso=='residencial'){
                                $punt=$punt+0;
                        }else if($uso=='comercial'){
                                $punt=$punt+1;
                        }else if($uso=='educacion'){
                                $punt=$punt+2;
                        }else if($uso=='oficina'){
                                $punt=$punt+2;
                        }else if($uso=='bodegas'){
                                $punt=$punt+3;
                        }else if($uso=='deportiva'){
                                $punt=$punt+3;
                        }else if($uso=='salud'){
                                $punt=$punt+2;
                        }else if($uso=='industrial'){
                                $punt=$punt+4;
                        }else if($uso=='hotelero'){
                                $punt=$punt+2;
                        }
                        //6
                        if($usoprimerpiso=='Residencial'){
                                $punt=$punt+0;
                        }else if($usoprimerpiso=='Comercial'){
                                $punt=$punt+1;
                        }else if($usoprimerpiso=='Educacion'){
                                $punt=$punt+2;
                        }else if($usoprimerpiso=='Oficinas'){
                                $punt=$punt+2;
                        }else if($usoprimerpiso=='Bodegas'){
                                $punt=$punt+3;
                        }else if($usoprimerpiso=='Instalación deportiva'){
                                $punt=$punt+3;
                        }else if($usoprimerpiso=='Salud'){
                                $punt=$punt+2;
                        }else if($usoprimerpiso=='Industrial'){
                                $punt=$punt+4;
                        }else if($usoprimerpiso=='Hotelero'){
                                $punt=$punt+2;
                        }
                        //7
                        if($nro_pisos=='1'){
                                $punt=$punt+1;
                        }else if($nro_pisos=='2'){
                                $punt=$punt+1;
                        }else if($nro_pisos=='3'){
                                $punt=$punt+1;
                        }else if($nro_pisos=='4'){
                                $punt=$punt+2;
                        }else if($nro_pisos=='5'){
                                $punt=$punt+2;
                        }else if($nro_pisos=='6'){
                                $punt=$punt+2;
                        }else if($nro_pisos=='7 o mas'){
                                $punt=$punt+3;
                        }
                        //8
                        if($elementosP=='1'){
                                $punt=$punt+1;
                        }else if($elementosP=='2'){
                                $punt=$punt+1;
                        }else if($elementosP=='3'){
                                $punt=$punt+1;
                        }else if($elementosP=='4'){
                                $punt=$punt+2;
                        }else if($elementosP=='5'){
                                $punt=$punt+2;
                        }else if($elementosP=='6'){
                                $punt=$punt+2;
                        }else if($elementosP=='7 o mas'){
                                $punt=$punt+3;
                        }
                        //9
                        if($elementosSP=='ninguno'){
                                $punt=$punt+0;
                        }else if($elementosSP=='1'){
                                $punt=$punt+1;
                        }else if($elementosSP=='2'){
                                $punt=$punt+2;
                        }else if($elementosSP=='3'){
                                $punt=$punt+3;
                        }else if($elementosSP=='4'){
                                $punt=$punt+3;
                        }else if($elementosSP=='mayores a 5'){
                                $punt=$punt+4;
                        }
                        //10
                        if($elementosMU=='si'){
                                $punt=$punt+3;
                        }else if($elementosMU=='no'){
                                $punt=$punt+0;
                        }
                        //11
                        if($elementosEQ=='Piscina'){
                                $punt=$punt+4;
                        }if($elementosEQ=='Canchas'){
                                $punt=$punt+3;
                        }if($elementosEQ=='Maquinas de gimnasio'){
                                $punt=$punt+3;
                        }if($elementosEQ=='Tanques de agua'){
                                $punt=$punt+4;
                        }if($elementosEQ=='Maquinaria Industrial'){
                                $punt=$punt+4;
                        }if($elementosEQ=='Almacenamientos'){
                                $punt=$punt+3;
                        }
                        //12
                        if($elementosAP=='2 metros'){
                                $punt=$punt+1;
                        }else if($elementosAP=='2.1 a 2.5 metros'){
                                $punt=$punt+2;
                        }else if($elementosAP=='2.6 a 3 metros'){
                                $punt=$punt+3;
                        }else if($elementosAP=='3.1 metros o mayores'){
                                $punt=$punt+3;
                        }
                        //13
                        if($elementosMCV=='Mamposteria'){
                                $punt=$punt+2;
                        }else if($elementosMCV=='Concreto Reforzado'){
                                $punt=$punt+1;
                        }else if($elementosMCV=='Prefabricado'){
                                $punt=$punt+2;
                        }else if($elementosMCV=='Acero'){
                                $punt=$punt+1;
                        }else if($elementosMCV=='Madera'){
                                $punt=$punt+2;
                        }else if($elementosMCV=='Adobe'){
                                $punt=$punt+3;
                        }else if($elementosMCV=='Tapia'){
                                $punt=$punt+3;
                        }else if($elementosMCV=='Guadua'){
                                $punt=$punt+3;
                        }
                        //14
                        if($elementostipo=='reforzada'){
                                $punt=$punt+1;
                        }else if($elementostipo=='noreforzada'){
                                $punt=$punt+1;
                        }else if($elementostipo=='confinada'){
                                $punt=$punt+1;
                        }else if($elementostipo=='Muro Estructural'){
                                $punt=$punt+1;
                        }else if($elementostipo=='Portico'){
                                $punt=$punt+1;
                        }else if($elementostipo=='Sistema dual o combinado'){
                                $punt=$punt+1;
                        }else if($elementostipo=='Prefabricado'){
                                $punt=$punt+2;
                        }else if($elementostipo=='Yeso'){
                                $punt=$punt+2;
                        }else if($elementostipo=='Madera'){
                                $punt=$punt+2;
                        }else if($elementostipo=='PVC'){
                                $punt=$punt+2;
                        }else if($elementostipo=='Drywall'){
                                $punt=$punt+3;
                        }else if($elementostipo=='Fibrocentimetro'){
                                $punt=$punt+1;
                        }
                        //15
                        if($elementosCPV=='Losa de concreto aligerado'){
                                $punt=$punt+1;
                        }else if($elementosCPV=='Losa de concreto maciza'){
                                $punt=$punt+1;
                        }else if($elementosCPV=='Vigas de madera'){
                                $punt=$punt+2;
                        }else if($elementosCPV=='Vigas de acero'){
                                $punt=$punt+1;
                        }
                        //16
                        if($elementosMCTV=='Losa de concreto aligerado'){
                                $punt=$punt+1;
                        }else if($elementosMCTV=='Losa de concreto maciza'){
                                $punt=$punt+1;
                        }else if($elementosMCTV=='Zinc'){
                                $punt=$punt+3;
                        }else if($elementosMCTV=='Termina en Plancha'){
                                $punt=$punt+1;
                        }else if($elementosMCTV=='Placa facil'){
                                $punt=$punt+2;
                        }else if($elementosMCTV=='Eternit'){
                                $punt=$punt+3;
                        }else if($elementosMCTV=='Estructura de madera y tejas de barro'){
                                $punt=$punt+1;
                        }else if($elementosMCTV=='Metalica'){
                                $punt=$punt+3;
                        }
                        //17
                        if($elementosEA=='si'){
                                $punt=$punt+4;
                        }else if($elementosEA=='no'){
                                $punt=$punt+0;
                        }
                        //18
                        if($elementosGC=='si'){
                                $punt=$punt+3;
                        }else if($elementosGC=='no'){
                                $punt=$punt+0;
                        }

                        $porcen=round($punt*100)/60;
                        if($porcen<=30){
                                $color='Baja';
                        }else if($porcen>30 && $porcen<=60){
                                $color='Media';
                        }else if($porcen>60 && $porcen<=80){
                                $color='Alta';
                        }else if($porcen>80 && $porcen<=100){
                                $color='Extrema';
                        }

                        $query = "INSERT INTO respuestas (cedula, formacion, construccion, constructora, nombre_constructora, area, foto_vivienda, 
                        ubicacion, elementos_cercanos, uso, uso_anterior_resp, uso_anterior, uso_primer_piso, nro_pisos, piso_de_vivienda,
                        nro_sotanos, muro_vecinos, elementos, altura_pisos, material, tipo, piso, techo, asentamiento, grietas, vulnerabilidad) values 
                                ('$cedula1','$formacion','$construccion','$constructora','$nombrecontructora','$area','" . $binariosImagen . "',
                                '$ubicacion','$elementos','$uso','$usoresp','$usoanterior','$usoprimerpiso','$nro_pisos','$elementosP',
                                '$elementosSP','$elementosMU','$elementosEQ','$elementosAP','$elementosMCV','$elementostipo','$elementosCPV','$elementosMCTV','$elementosEA','$elementosGC','$color'); ";
			$res = mysqli_query($con, $query);
                        

                        if ($res) {
                                echo"<center>ENCUESTA REALIZADA CON EXITO EL PORCENTAJE DE VULNERABILIDAD DE LA VIVIENDA ES DE: ".$porcen."% <p> La vunerabilidad de la vivienda es: ".$color."</center>";
                        } else {
                                echo"Error";
                        }
                }
?>