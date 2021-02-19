<?php 
$dni = $_POST['dni'];
$result = json_decode(file_get_contents('https://consultaruc.win/api/dni/'.$dni),true);

	
	//var_dump($result);

	 $dni	= $result['result']['DNI'];
	 $nombre = $result['result']['Nombre'];
	 $paterno = $result['result']['Paterno'];
	 $materno = $result['result']['Materno'];
	//echo $result['result']['estado'];

$datos = array(
	'dni' => $dni, 
	'nombre' => $nombre, 
	'paterno' => $paterno,
    'materno' => $materno,
);
      
	echo json_encode($datos); 

?>