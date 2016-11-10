<?php
//header('Content-Type: application/json');
include 'func.php';
if(!empty($_REQUEST['id'])){
	$id=$_REQUEST['id'];
	selek_data($id);
	$value = send_data();
	if(!empty($value)){
		show_data(200,'Data Found',$value);
	}			
}else{
	show_data(400,'Service Not Found','NULL');
}

/* for($i = 0; $i < count($value);$i++){
	print_r($value[$i]['Keterangan']);
	echo PHP_EOL;
} */
/* foreach($value as $item){
		echo $item." ";
		echo PHP_EOL;
	} */
?>