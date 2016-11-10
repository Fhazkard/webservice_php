<?php
include 'konek.php';
$list = array();

function selek_data($id){
	$selek_data = mysqli_query($GLOBALS['koneksi'],"SELECT bimbel.nama AS bimbel, murid.nama AS murid, materi.sekolah_id, materi.kelas_id, materi.bimbel_id, 
													materi.judul AS judul, materi.keterangan AS keterangan, materi.tgl_terbit AS tgl_terbit, materi.file_location AS link_download FROM MURID 
													JOIN bimbel ON bimbel.bimbel_id = murid.bimbel_id
													JOIN materi ON materi.bimbel_id = murid.bimbel_id AND materi.kelas_id = murid.kelas_id
													WHERE murid.murid_id = '".$id."'");
	while($row = mysqli_fetch_array($selek_data))
	{
		$link = generate_link($row['link_download']);
		array_push($GLOBALS['list'],array('Bimbel'=>$row['bimbel'],'Judul'=>$row['judul'],'Keterangan'=>$row['keterangan'],'Tanggal'=>$row['tgl_terbit'],'Link'=>$link));
	}	
}

function send_data(){
	$item = count($GLOBALS['list']);
	if($item==0){
		array_push($GLOBALS['list'],array('Bimbel'=>'-','Judul'=>'-','Keterangan'=>'-','Tanggal'=>'-','Link'=>'#'));
		return $GLOBALS['list'];
	}else{
		return $GLOBALS['list'];
	}	
}

function generate_link($link){
	$link = substr($link,37);
	$link = "../../koneksi/".$link;
	return $link;
}

function show_data($status,$notice,$data){
	header("HTTP/1.1 $status $notice");
	$respone['Status'] = $status;
	$respone['Notice'] = $notice;
	$respone['Data'] = $data;
	
	$result = json_encode($respone);
	echo $result;
}
?>