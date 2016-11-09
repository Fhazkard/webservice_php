<?php
header('Content-Type: application/json');
include 'func.php';
if(!empty($_GET['id'])){
	$id = $_GET['id'];
	$value = proses_data($id);
	if(empty($value)){
		show_data(200,'Name Not Found',NULL);
	}else{
		show_data(200,$value[0],$value[1]);
	}
}else{
	show_data(400,'Service Not Found',NULL);
}

?>