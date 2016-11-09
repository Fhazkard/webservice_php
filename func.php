<?php
function proses_data($data){
	require 'konek.php';
	$list = array('0'=>array('NULL',NULL));
	$selek_data = mysqli_query($koneksi,"SELECT * FROM MURID");
	while($row = mysqli_fetch_array($selek_data))
	{
		array_push($list,array($row['nama'],$row['tlp']));
	}	
	foreach($list as $item=>$value){
		if($item == $data){
			return $value;
			break;
		}
	}
}

function show_data($status,$status_message,$data){
	header("HTTP/1.1 $status $status_message");
	$respone['Status'] = $status;
	$respone['Nama'] = $status_message;
	$respone['No Hp'] =  $data;
	
	$result = json_encode($respone);
	echo $result;
}
?>