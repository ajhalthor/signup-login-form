<?php
/*	include 'session.inc.php';
	if(isset($_SESSION['student_login']))
		header("location:portals/student/index.php#/");*/
?>

<!DOCTYPE html>
<?php 
/*
* Author : Ajay Halthor (Front end only), Basanth Jenu (Back end only)
* Title : Login
* Extra : 
   - We may need to reference bootstrap using // rather than be protocol specific (http/https)
*  - See this link for more info : https://blog.httpwatch.com/2010/02/10/using-protocol-relative-urls-to-switch-between-http-and-https/
* 
*/
?>
<html lang="en">
<head>
	<meta charset="UTF-8"/>
	<meta name="keywords" content="HTML,CSS,JavaScript,PHP,MySQL"/>
	<meta name="description" content="Login Page for Staff Appraisal"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Ajay Halthor,Basanth Jenu"/>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> 
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> 
	<!-- Latest compiled JavaScript -->
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="js/login.js"></script>
	
	<!-- http://smallenvelop.com/display-loading-icon-page-loads-completely/ -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="style.css"> 
	
	<style type="text/css">

/* Paste this css to your style sheet file or under head tag */
/* This only works with JavaScript, 
if it's not present, don't show loader */
.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url(image/Preloader_2.gif) center no-repeat #fff;
}


/*Base Style*/
footer{
	bottom:0px;
	left:0px;
	width:100%;
	line-height: 35px;
	text-align: center;
	font-weight: bold;
	background-color: #CCC;
}

/* Setting the background image*/

#background{
position: fixed;
top: 0;
left: 0;
width: 10000px;
	height: 100%;
 /*background: url('image/college_1.jpg') ;*/
  background-repeat: no-repeat;
  background-position:center;
  background-attachment: fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
/*  -webkit-filter: blur(15px);
    -moz-filter: blur(15px);
    -o-filter: blur(15px);
    -ms-filter: blur(15px);
    filter: blur(15px);*/
    z-index: -1;
 }

 .background-image-blur{
 	-webkit-filter: blur(45px);
    -moz-filter: blur(45px);
    -o-filter: blur(45px);
    -ms-filter: blur(45px);
    filter: blur(45px);

    -webkit-transition: all 2s ease-out;
    -moz-transition: all 2s ease-out;
    -o-transition: all 2s ease-out;
    -ms-transition: all 2s ease-out;

    transition: all 2s ease-out;
 }


/*To give the gradient to the background image in "#background"*/

/*.FadeAway{
    position: absolute; top:0px; left:0px; width:100%; height:100%;
        background:transparent;
        background: linear-gradient(top, rgba( 255, 255, 255, 255 ) 0%, rgba( 255, 255, 255, 1 ) 100% );
        background: -moz-linear-gradient(top, rgba( 255, 255, 255, 0) 0%, rgba( 255, 255, 255, 1 ) 100% );
        background: -ms-linear-gradient(top, rgba( 255, 255, 255, 0 ) 0%, rgba( 255, 255, 255, 1 ) 100% );
        background: -o-linear-gradient( top, rgba( 255, 255, 255, 0 ) 0%, rgba( 255, 255, 255, 1 ) 100% );
        background: -webkit-linear-gradient( top, rgba( 255, 255, 255, 0 ) 0%, rgba( 255, 255, 255, 1 ) 100% );
        -ms-filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#550000FF, endColorstr=#550000FF);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#00ffffff, endColorstr=#ffffffff);

}*/

#header{
	width:100%;
	/*height:100px;*/
}

	.desktop-header{
		height: 100px;
	}

	.mobile-header{
		height: 0px;
	}

/* These 2 are temp styles. Get rid of them later*/
	#header-text h3{
		text-align: center;
		font-size: 30px;
	}

	#header-text p{
		text-align: center;
		font-size:20px;
	}

.form-body{
    margin:25px;
}

.form-top-right{
	width : 25%;
	float:left;
	font-size: 66px;
}
.form-top-left{
	width : 75%;
	float:left;
}

.form-element{
	display: inline;
	width:100%;
}
	button.form-element{
		margin-bottom: 20px;
	}

.module-form{
	/*border:1px solid blue;*/
	background-color: #ECF0F1;
	display: inline-block;
    vertical-align: middle;
    padding-left: 0px;
    padding-right: 0px;
    opacity: 0;	/*We are going to animate this */
}
	.module-heading{
		margin:20px 0px;
	}


@media (min-width:768px){


	.middle-border {
	    min-height: 300px;
	    margin-top: 100px;
	    border-right: 1px solid #000;
	    border-right: 1px solid rgba(0, 0, 0, 0.6);
	}

	.mobile{
		display: none;
	}

	.desktop{
		display: inline;
	}

	.glyphicon-validation{
		font-size:15px;
		margin: 7px;
	}

}
@media (max-width:767px){


	.middle-border {
	    min-height: auto;
	    margin: 65px 30px 0 30px;
	    border-right: 0;
	}

	.mobile{
		display: inline;
		margin:20px 0px;
	}

	.desktop{
		display: none;
	}

	.glyphicon-validation{
		font-size:10px;
		margin: 7px;
	}
}

/* Just to remove the default padding of bootstrap's col-*-* 
* mainly need this for the form-heading*/

/*#main-login{
	padding-left:0px;
	padding-right: 0px;
}*/

.form-header{
	width:100%;
	padding: 30px;
}

.multi-form-wrapper{
	/*margin-bottom:20px;*/
}

</style>

<script type="text/javascript">
	$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});
</script>
</head>
<body>
	<div id="background"></div>
	<div id="header"> </div>

	<div class="container multi-form-wrapper">
		 <div class="form-container row">
			<div id="main-login" class="module-form  col-xs-12 col-sm-5 col-md-5 col-lg-5">
			


      <div class="form-content">
        <div class="form-header background-dark-green white">
        	<div class="form-top-left">
		          <h3>Login</h3>
		          <p> See whats going on in your College today </p>
		      </div>
		      <div class="form-top-right">
		      		<span class="glyphicon glyphicon-lock"></span>
		      </div>
		      <br style="clear:both"/>
        </div>
        <div class="form-body">
			<form role="form">
          	<div class="form-group category">
              <label for="category"> <span class="glyphicon glyphicon-user"></span> </span> Login as </label>
				<select  class="form-control form-element" name='category'>
					<option class='drop-down' value='student'> Student </option>			
					<option class='drop-down' value='teacher'> Teacher </option>			
					<option class='drop-down' value='HOD'> HOD </option>			
					<option class='drop-down' value='administration'> Administration </option>			
				</select>
			</div>
            <div class="form-group usn">
              <label for="USN"> <span class="glyphicon glyphicon-user"> </span> USN</label>
        	  <input type="textbox" class="form-control form-element" name="usn" placeholder="USN">
            </div>

            <div class="form-group is-hidden email">
              <label for="Email"> <span class="glyphicon glyphicon-user"> </span> Email</label>
        	  <input type="textbox" class="form-control form-element" name="email" placeholder="Email">
            </div>

            <div class="form-group password">
              <label for="password"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
			  <input type="password" class="form-control form-element" name="password" placeholder="Password">
            </div>
            <br>
			<button type="button" class="btn btn-default btn-success btn-block submit-btn login-btn"><span class="glyphicon glyphicon-lock"></span>&nbsp; Login</button>
          </form>
        </div>
        <div class="modal-footer">
          <!-- Message from serverside (basanth)-->
          <div class="pull-left message" id="login-message"></div>
           <p>Forgot <a id="forgot-password" href="#">Password?</a></p><br>
        </div>
      </div>

		</div>

	 	<div class="col-sm-1"></div>
	 	<div class="col-sm-1 "></div>
		<div id="main-signup" class="module-form col-xs-12 col-sm-5 col-md-5 col-lg-5">
		

 	<div class="form-content">
        <div class="form-header background-maroon white">
        	<div class="form-top-left">
		          <h3>Signup</h3>
		          <p> Be a part of your College Community </p>
		      </div>
		      <div class="form-top-right">
		      		<span class="glyphicon glyphicon-pencil"></span>
		      </div>
		      <br style="clear:both"/>
        </div>

        <div class="form-body">
			<form role="form">
          	<div class="form-group category">
              <label for="category"> <span class="glyphicon glyphicon-user"></span> </span> Signup as </label>
				<select  class="form-control form-element" name='category'>
					<option class='drop-down' value='student'> Student </option>			
					<option class='drop-down' value='teacher'> Teacher </option>			
					<option class='drop-down' value='HOD'> HOD </option>			
					<option class='drop-down' value='administration'> Administration </option>			
				</select>
			</div>
            <div class="form-group usn">
              <label for="USN"> <span class="glyphicon glyphicon-user"> </span> USN</label>
        	  <input type="textbox" class="form-control usn-validation form-element" name="usn" placeholder="USN">
            </div>

             <div class="form-group is-hidden email">
              <label for="Email"> <span class="glyphicon glyphicon-user"> </span> Email</label>
        	  <input type="textbox" class="form-control form-element" name="email" placeholder="Email">
            </div>

            <div class="form-group password">
              <label for="password"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
			  <input  type="password" class="form-control password-validation form-element" name="password" placeholder="Password" data-validation="false">
            </div>
             <div class="form-group confirm-password">
              <label for="confirm-password"><span class="glyphicon glyphicon-eye-open"></span> Confirm Password</label>
			  <input  type="password" class="form-control password-confirmation form-element" name="password1" placeholder="Confirm Password" data-validation="false">
            </div>
            <br>
            <button type="button" class="btn btn-default btn-danger btn-block submit-btn signup-btn"><span class="glyphicon glyphicon-pencil"></span>&nbsp; Signup </button>
			<!--<input type="submit" class="submit-btn btn btn-primary btn-danger form-element" value="Signup"> -->
          </form>
        </div>
        <div class="modal-footer">

          <!-- Message from serverside (basanth)-->
          <div class="message pull-left" id="signup-message"></div>
        </div>
      </div>

		</div>
	</div> 



	</div>



 <!-- Modal -->
  <div class="modal fade" id="forgot-password-modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header background-green" style="padding:35px 50px;color:white;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Forgot Password</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" class="form-control" id="usrname" placeholder="Enter email">
            </div>
            
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> New Password</label>
              <input type="password" class="form-control password-validation" id="new-password" placeholder="Enter New password">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Confirm Password</label>
              <input type="password" class="form-control confirm-password-validation" id="confirm-new-password" placeholder="Confirm New password">
            </div>
              <button type="button" id="send-email-confirmation-button" class="btn btn-success btn-block"> <span class="glyphicon glyphicon-envelope"></span> &nbsp;Send Me An Email Confirmation</button>
          </form>
        </div>
        <div class="modal-footer">
          <p id="forgot-password-message"></p>
        </div> 
      </div>
      
    </div>
  </div> 



</body>
<div class="se-pre-con"></div>
<script type="text/javascript">
function headerAdjustment(){
	if(window.innerWidth > 767){
		$('#header').addClass('desktop-header').removeClass('mobile-header');
	}else{
		$('#header').addClass('mobile-header').removeClass('desktop-header');
	}
}

$(window).on('load resize',function(){
	headerAdjustment();
});

$("#forgot-password").click(function(){
    $("#forgot-password-modal").modal();
});

$('#send-email-confirmation-button').on('click',function(){
	invalid_fields_on_page =  0;
	$('#new-password').trigger('blur');
	$('#confirm-new-password').trigger('blur');
	
	var email = $('#usrname').val();
	var new_password = $('#new-password').val();
	var confirm_new_password = $('#confirm-new-password').val();
	
	if(invalid_fields_on_page == 0){
	   //Change password in database
	   $.post("forgot-password.php",{new_password:new_password,email:email,confirm_new_password:confirm_new_password},response);
	   
	   function response(res){
	   	console.log(res);
	   	var obj = JSON.parse(res);
	   	if(obj.success == true){
	   		$('#forgot-password-message').css('color','green');
	   		$('#forgot-password-message').text(obj.message);
	   	}else{
	   		$('#forgot-password-message').css('color','red');
	   		$('#forgot-password-message').text(obj.message);
	   	}
	   }
	}
	
	
});
</script>
</html>
<!-- jQuery library -->