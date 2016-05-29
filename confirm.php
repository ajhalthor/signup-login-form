<?php
	include_once 'session.inc.php';
	include_once 'check_login.php';
	include_once 'connect.inc.php';
	
	if(!empty($_GET['category']) && (!empty($_GET['usn']) || !empty($_GET['email']) ) && !empty($_GET['passkey']))
	{
		$category=mysql_real_escape_string($_GET['category']);
		$usn=mysql_real_escape_string($_GET['usn']);
		$passkey=mysql_real_escape_string($_GET['passkey']);
		$email=mysql_real_escape_string($_GET['email']);
		if($category=="student")
		{
			$query1=mysql_query("SELECT activated FROM users WHERE usn='$usn' AND confirmation='$passkey'") or die('Cannot execute query1');
			$row1=mysql_fetch_assoc($query1);
			if($row1['activated']==1)
				$_SESSION['msg1']="<div style=\"color:red\"><b>Your account has already been activated.</b></div><br><br>";
			else if(mysql_num_rows($query1)==1)
			{
				$query2=mysql_query("UPDATE users SET activated=1 WHERE usn='$usn' AND confirmation='$passkey'") or die('Cannot execute query2');
				$_SESSION['msg1']="<div style=\"color:green\"><b>Your account has been activated successfully.</b></div><br><br>";
			}
			else
				$_SESSION['msg1']="<div style=\"color:red\"><b>Invalid operations.</b></div><br><br>";
		}
		else if($category=="teacher")
		{
			$query3=mysql_query("SELECT activated FROM staff WHERE email='$usn' AND confirmation='$passkey'") or die('Cannot execute query3');
			$row3=mysql_fetch_assoc($query3);
			if($row3['activated']==1)
				$_SESSION['msg1']="<div style=\"color:red\"><b>Your account has already been activated.</b></div><br><br>";
			else if(mysql_num_rows($query3)==1)
			{
				$query4=mysql_query("UPDATE users SET activated=1 WHERE email='$usn' AND confirmation='$passkey'") or die('Cannot execute query4');
				$_SESSION['msg1']="<div style=\"color:green\"><b>Your account has been activated successfully.</b></div><br><br>";
			}
			else
				$_SESSION['msg1']="<div style=\"color:red\"><b>Invalid operations.</b></div><br><br>";
		}else if($category=="HOD")
		{
			$query3=mysql_query("SELECT activated FROM hod WHERE email='$email' AND confirmation='$passkey'") or die('Cannot execute query3');
			$row3=mysql_fetch_assoc($query3);
			if($row3['activated']==1)
				$_SESSION['msg1']="<div style=\"color:red\"><b>Your account has already been activated.</b></div><br><br>";
			else if(mysql_num_rows($query3)==1)
			{
				$query4=mysql_query("UPDATE hod SET activated=1 WHERE email='$email' AND confirmation='$passkey'") or die('Cannot execute query4');
				$_SESSION['msg1']="<div style=\"color:green\"><b>Your account has been activated successfully.</b></div><br><br>";
			}
			else
				$_SESSION['msg1']="<div style=\"color:red\"><b>Invalid operations.</b></div><br><br>";
		}
	}
	header("location:index.php");
?>