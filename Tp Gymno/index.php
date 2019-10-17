<?php include"paginas/cabecera.php"; 

if(isset($_GET['page'])){
	$url = $_GET['page'];
}else{
	$url = "home";
}

include"paginas/".$url.".php"; 
include"paginas/pie.php"; 
?>