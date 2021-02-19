
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<script src="https://code.jquery.com/jquery-3.5.1.js" ></script>
	<title>Document</title>
	<style>
		.contenedor{
			position: relative;
			max-width:   100%;
			display: flex;
			flex-flow: column;
			justify-content: center;
			align-items: center;
			padding: 5px;
			margin: 0 auto;
		}
		.res{
			position: relative;
			background-color: white;
			width: 60%;
			height: 20px;
			color: #3b3b3b;
			padding: .6em;
			margin: 4px;
			border: 1px solid #cecece;
			font-family:  sans-serif;
			font-size: 1.2em;
			letter-spacing: 2px;
		}
		input[type=text]{
			width: 60%;
			padding: .5em;
			outline: 0;
			border-style: none;
			border: 1px solid black;
			border-radius: 4px;
			font-family:  sans-serif;
			font-size: 1.2em;
			letter-spacing: 2px;
		}
		#dni{
			margin-top: 15px;
		}
	</style>
</head>

<body>

<section class="contenedor">

<input type="text" id="ruc" name="ruc" onchange="Ruc()" placeholder="Ingrese el RUC...">
	<div class="res rs"></div>
	<div class="res estado"></div>
	<div class="res condicion"></div>
	<div class="res alert" id="alert"></div>
<!--	<button id="ir" onclick="Ruc()">RUC</button>-->
	
	<input type="text" id="dni" name="dni" onchange="Dni()" placeholder="Ingrese el DNI...">
	
	<div class="res dni"></div>
	<div class="res nombre"></div>
	<div class="res paterno"></div>
	<div class="res materno"></div>
<!--	<button id="ir" onclick="Dni()">DNI</button>-->
</section>
</body>
</html>
<script>
//
 function Ruc() {
   var ruc = $('#ruc').val();
	 var datas = 'ruc='+ruc;
    $.ajax({
        url: "ruc.php",
        type: "POST",
		data: datas,
        dataType: 'json',
        success: function(data) {
			var datos = eval(data);
            $(".rs").html(datos['razon_social']);
			$(".estado").html(datos['estado']);
            $(".condicion").html(datos['condicion']);
            $(".alert").html(datos['alert']);
			
		}
		
		
	});
	 
};
function Dni() {
     var dni = $('#dni').val();
	 var datas = 'dni='+dni;
    $.ajax({
        url: "dni.php",
        type: "POST",
		data: datas,
        dataType: 'json',
        success: function(data) {
			var datos = eval(data);
            $(".dni").html(datos['dni']);
            $(".nombre").html(datos['nombre']);
            $(".paterno").html(datos['paterno']);
            $(".materno").html(datos['materno']);
            
		}
	})
}

</script>