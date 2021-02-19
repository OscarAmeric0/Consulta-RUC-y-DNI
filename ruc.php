<?php 

$ruc = $_POST['ruc'];
$result = json_decode(file_get_contents('https://consultaruc.win/api/ruc/'.$ruc),true);
	
	//var_dump($result);
	 $rs = $result['result']['razon_social'];
	 $estado = $result['result']['estado'];
	 $condicion = $result['result']['condicion'];
	if($estado == 'ACTIVO'){
		
		$alert = 'OK'."<script>$('.alert').css({'background-color':'#60dd60'});
							$('.estado').css({'background-color':'#60dd60'});
						</script>";
	}else{
		$alert = "NO SE PUEDE GENERAR FACTURA";
		$alert .= "<script>$('.alert').css({'background-color':'#ff4848'});</script>";
		$alert .= "<script>$('.estado').css({'background-color':'#ff4848'});</script>";
	}

$datos = array(
	'razon_social' => $rs, 
	'estado' => $estado,
    'condicion' => $condicion,
    'alert' => $alert,
);
      
	echo json_encode($datos); 

?>