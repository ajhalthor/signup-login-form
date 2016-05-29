<?php
	include_once 'session.inc.php';
	include_once 'check_login.php';
	include_once 'connect.inc.php';
	if((!empty($_POST['usn']) || !empty($_POST['email'])) && !empty($_POST['password']) && !empty($_POST['password1']) && !empty($_POST['category']))
	{
		if($_POST['category']=="student"){
			$usn=strtoupper(mysql_real_escape_string($_POST['usn']));
			$email = '';
		}
		else{
			$email=(mysql_real_escape_string($_POST['email']));
			$usn = '';
		}
		$password=$_POST['password'];
		$password1=$_POST['password'];
		$password2=$_POST['password1'];
		$category=mysql_escape_string($_POST['category']);
		$password=sha1($password);
		//Change bit to 1
		$bit=0;
		$confirmation=md5(uniqid(rand()));
		$subject="Your confirmation link here";
		$header= array("From: SJCE ","Content-type: text/html");
		$message='
		
			<html>
			<head>
			<title>Title of email</title>
			</head>

			<body>

			<div  style=" border:1px solid grey; padding:20px;">
			        <div style="font-size: 35px; margin: 30px;color:#C0392B;">
			        	<strong>Hello, Welcome !</strong> 
			        </div>
			        <p> Dear User,<br><br>
			       		 We really appreciate you signing up to SJCE. You are among 4000+ Users that will soon experience a modern Student Information System.
			        </p><br>

			        <div id="instructions">
			                <div class="category">
			                        <div class="category-heading" style="font-weight: 500; font-size: 16px;"> Students </div>
			                        <ul class="category-instructions">
			                                <li> Just Login and start evaluating teachers as they appear.</li>
			                                <li> Appraise a single teacher Completely before moving on to the next.</li>
			                        </ul>
			                </div>
			                <div class="category">
			                        <div class="category-heading" style="font-weight: 500; font-size: 16px;"> HOD </div>
			                        <ul class="category-instructions">
			                                <li>You can view statistics of any teacher in your department.</li>
			                                <li>Just select the teacher, subject and competency</li>
			                        </ul>
			                </div>
			        </div>
			        <br>
			        <p>Here is your login details : </p>
			        <hr style="  width:80%; color:grey; text-align: center;">

			        <span  style="color:#C0392B;">Username:</span> 4jc1355443 <br>
			        <span  style="color:#C0392B;">Password:</span> Your Nominated Password <br>

			        <hr style="width:80%; color:grey; text-align: center;"><br>
			        <div style="width:100%;background-color:#C0392B;line-height:40px;margin:0px auto;border-radius: .25rem;" >
			        	<a href="http://www.yourwebsite.org/staff17/confirm.php?category='.$category.'&usn='.$usn.'&passkey='.$confirmation.'&email='.$email.'" style="color:white;text-align:center;text-decoration:none;display:block;"> Activate My Account </a>
					</div>       
			 		<br><br><br>
	        		<div>
		                 Thanks again, and if you ever have any questions or feedback, just send us an email :<br><br>
		                 <span style="color:#C0392B;"> Basanth Jenu :</span> b@gmail.com <br>
		                 <span style="color:#C0392B;"> Ajay Halthor : </span> a@gmail.com <br>
		                 <br>
		                 We read &amp; respond to every request!
	       			</div>

			</div>

			</body>
			</html>	
					
			
		
		';
		
		if($password1!=$password2){
			$_SESSION['msg2']="<span style=\"color:red\"><b>Passwords do not match.</b></span><br><br><br>";
			echo json_encode(array("success" => false, "message" => 'Passwords do not match'));
		} else if($category=="teacher")
		{
			$query1=mysql_query("SELECT * FROM staff WHERE email='$email'") or die("Cannot execute query1");
			if(mysql_num_rows($query1)!=1)
				$_SESSION['msg2']="<span style=\"color:red\"><b>Invalid Details.</b></span><br>";
			$query2=mysql_query("UPDATE staff SET confirmation='$confirmation',password='$password' WHERE email='$email'") or die("Cannot execute query2");
			$to=$email;
			$sentmail = mail($to,$subject,$message,implode("\r\n",$header)) or die("Error sending mail.");
			$_SESSION['msg2']="<div style=\"color:green\"><b>A confirmation link has been sent to $to.<br>Please click on it to activate your account.</b></div><br>";
		}
		else if($category=="HOD")
		{
			$query1=mysql_query("SELECT * FROM hod WHERE email='$email'") or die("Cannot execute query1");
			if(mysql_num_rows($query1)!=1)
				$_SESSION['msg2']="<span style=\"color:red\"><b>Invalid Details.</b></span><br>";
			$query2=mysql_query("UPDATE hod SET confirmation='$confirmation',password='$password' WHERE email='$email'") or die("Cannot execute query2");
			$to=$email;
			$sentmail = mail($to,$subject,$message,implode("\r\n",$header)) or die("Error sending mail.");
			$_SESSION['msg2']="<div style=\"color:green\"><b>A confirmation link has been sent to $to.<br>Please click on it to activate your account.</b></div><br>";
			echo json_encode(array("success" => true, "message" => "A confirmation link has been sent to $to.<br>Please click on it to activate your account."));
			return ;
		}
		else if($category=="student")
		{
			$query3=mysql_query("SELECT activated FROM users WHERE usn='$usn'") or die("Cannot execute query3");
			$row3=mysql_fetch_assoc($query3);
			if(mysql_num_rows($query3)!=1){
				$_SESSION['msg2']="<span style=\"color:red\"><b>Invalid Details.</b></span><br><br><br>";
				echo json_encode(array("success" => false, "message" => 'Invalid username or password'));
				return ;
			}else if($row3['activated']==1){
				$_SESSION['msg2']="<span style=\"color:red\"><b>Your account has already been activated.</b></span><br><br><br>";
				echo json_encode(array("success" => false, "message" => 'Your account has already been activated'));
				return;
			}else{
				$query4=mysql_query("UPDATE users SET confirmation='$confirmation',password='$password',activated=1 WHERE usn='$usn'") or die("Cannot execute query4");
				$_SESSION['msg2']="<div style=\"color:green\"><b>Your account has been activated. Please Login.</b></div><br>";
				echo json_encode(array("success" => true, "message" => 'Your account has been activated. Please Login'));
				return;
			}
		}
	}
	else{
		$_SESSION['msg2']="<div style=\"color:red\"><b>Please fill all the details.</b></div><br><br>";
		echo json_encode(array("success" => false, "message" => 'Please fill all the details'));
		return;
	}


	header("location:index.php");
?>