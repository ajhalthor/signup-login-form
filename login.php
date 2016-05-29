<?php
	include_once 'session.inc.php';
	include_once 'check_login.php';
	include_once 'connect.inc.php';

	if( (!empty($_POST['usn']) || !empty($_POST['email'])) && !empty($_POST['password']) &&!empty($_POST['category']))
	{
		if($_POST['category']=="student")
			$usn=strtoupper(mysql_real_escape_string($_POST['usn']));
		else
			$email=(mysql_real_escape_string($_POST['email']));
		$category=(mysql_real_escape_string($_POST['category']));
		$password=sha1($_POST['password']);
		if($category=="student")
		{
			$query1=mysql_query("SELECT * FROM users WHERE usn='$usn' and password='$password' and activated=1") or die("Cannot execute query1");
			if(mysql_num_rows($query1)==1)
			{
				$_SESSION['student_login']=$usn;
				$_SESSION['category']=$_POST['category'];
				echo json_encode(array("success" => true, "message" => 'Valid Details entered', "url" => 'portals/student/index.php#/'));
				return ;
				//header("location:portals/student/index.php#/");
			}
			else
			{
				//$_SESSION['msg1']="<div style=\"color:red\"><b>Invalid username or password.</b></div><br><br>";
				//header("location:index.php");
				echo json_encode(array("success" => false, "message" => 'Invalid username or password'));
				return ;
			}
		}
		else if($category=="teacher")
		{
			$query2=mysql_query("SELECT * FROM staff WHERE email='$email' and password='$password' and activated=1") or die("Cannot execute query2");
			if(mysql_num_rows($query2)==1)
			{
				$_SESSION['teacher_login']=$email;
				$_SESSION['category']=$_POST['category'];
				echo json_encode(array("success" => true, "message" => 'Valid Details entered', "url" => 'portals/teacher/'));
				//header("location:portals/teacher/");
				return;
			}
			else
			{
				//$_SESSION['msg1']="<div style=\"color:red\"><b><br>Invalid username or password.</b></div><br><br>";
				echo json_encode(array("success" => false, "message" => 'Invalid username or password'));
				//header("location:index.php");
				return;
			}
		}
		else if($category=="HOD")
		{
			$query2=mysql_query("SELECT * FROM hod WHERE email='$email' and password='$password' and activated=1") or die("Cannot execute query2");
			if(mysql_num_rows($query2)==1)
			{
				$_SESSION['hod_login']=$email;
				$_SESSION['category']=$_POST['category'];
				$row2=mysql_fetch_assoc($query2);
				$query3=mysql_query("SELECT name FROM departments WHERE dept_no={$row2['department']} ") or die("Cant execute query3");
				$row3=mysql_fetch_assoc($query3);
				$_SESSION['dept_name']=$row3['name'];
				$_SESSION['dept_no']=$row2['department'];
				//header("location:portals/HOD/");
				echo json_encode(array("success" => true, "message" => 'Valid Details Entered', "url" => "portals/HOD/"));
				return;
			}
			else
			{
				$_SESSION['msg1']="<div style=\"color:red\"><b><br>Invalid username or password.</b></div><br><br>";
				//header("location:index.php");
				echo json_encode(array("success" => false, "message" => 'Invalid username or password'));
				return;
			}
		}
		else
		{
			//$_SESSION['msg1']="<div style=\"color:red\"><b>Please fill in all the details.</b></div><br><br>";
			//header("location:index.php");
			echo json_encode(array("success" => false, "message" => 'Please fill in all the details'));
			return;
		}
	}
	else{
		//header("location:index.php");
		echo json_encode(array("success" => false, "message" => 'Please Fill in your details'));
		return;
	}
?>

