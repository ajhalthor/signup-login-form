<?php
	include_once 'session.inc.php';
	if(!isset($_SESSION['student_login'])){
		//////echo json_encode(array("success" => true, "message" => 'Valid Details entered', "url" => 'student-portal.php#/'));
		//////return;
		//header("location:student-portal.php#/");
	}

?>