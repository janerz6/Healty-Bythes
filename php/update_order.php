<?php 

	include '../db_connect/db_connect.php';
	$fID = $_POST["firstID"];
	$sID = $_POST["secondID"];
	
	$fPos = $_POST["firstPos"];
	$sPos = $_POST["secondPos"];
	
	
	$q1 = "UPDATE queue SET wait_idx = $sPos WHERE queue.patient_id = '$sID'";
	$q2 = "UPDATE queue SET wait_idx = $fPos WHERE queue.patient_id = '$fID'";
	
	$res1 = mysqli_query($dbc, $q1);
	$res2 = mysqli_query($dbc, $q2);
	$res = array();
	$res["fid"] = $fID;
	if(!$res1 or !$res2){
		
		$res["status"] = "Not";
		$res["q1"] = $q1;
		$res["q2"] = $q2;		
		echo json_encode($res);
		return;
	}
	
	
	$res["status"] = "OK";
	$res["q1"] = $q1;
	$res["q2"] = $q2;	
	echo json_encode($res);
?>