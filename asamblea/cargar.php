<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<?php
if($_FILES['userfile']['name']){
//datos del arhivo 
$nombre_archivo = $_FILES['userfile']['name']; 
$tipo_archivo = $_FILES['userfile']['type']; 
$tamano_archivo = $_FILES['userfile']['size']; 
//compruebo si las características del archivo son las que deseo 
if (!((strpos($tipo_archivo, "xml") || strpos($tipo_archivo, "xml")) && ($tamano_archivo < 90000000))) { 
   	echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .xml<br><li>se permiten archivos de 100 Kb máximo.</td></tr></table>"; 
}else{ 
	$fichero='cargar/';
	$fichero=scandir($fichero, 1);
	$fichero="cargar/".$fichero[0];
	@unlink($fichero);

echo"<body><div class='text' id='formulario'>";
   	if (move_uploaded_file($_FILES['userfile']['tmp_name'], "cargar/".$nombre_archivo)){ 
      	echo "<h1 align='center'>El XML ha sido cargado correctamente</h1><br>"; 
     
         echo"<h1 align='center'><a href='javascript:history.back(1)''>Volver Atrás</a></h1>";
      	
         ?>
      	<script>
		  	$.ajax({
				url:"ajax.php",
				success:function(res){
					//$("body").html(res);
				}
			});
      	</script>
      	<?php
   	}else{ 
      	echo "\nOcurrió algún error al subir el fichero. No pudo guardarse."; 
   	} 
} 
}
else
{
  echo"no se ha cargado ningun XML";
}
echo"</div></body>";
?>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
