<?php
	session_start();
	if(empty($_SESSION["user"])){
		header("Location: ./login.php");
	}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<?php
		include('./setup/functions.php');
		include('./db_connect/db_connect.php');
		include './php/logout.php';
		
	?>
	
	
	
	<!-- Bootstrap-->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">	
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">	
	<!-- Latest compiled and minified JavaScript -->
	
	
	<!-- jQuery UI -->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  	
  	
	<link rel="stylesheet" type="text/css" href="./css/main.css" />
	<script>
		doctor_id = 1;
	</script>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="./js/ehrscape.js"></script>
	<script src="./js/sider.js"></script>
	<script src="./js/refreshData.js"></script>
	<script src="./js/main.js"></script>
	
	<script type="text/template" id="patient_template">
		<li class="ui-state-default active" id="{{patient-id}}">		
		  <a href="#" class="onlist_patient list-group-item">
			<h4 class="list-group-item-heading">
				<span class="wait_name"></span>
				<span class="wait_surname"></span>
			</h4>
			<p class="list-group-item-text">
					
				<span class="wait_age"></span>												
				<span class="wait_gender"></span>	
				<span class="wait_born"></span>		
										
			</p>
		  </a>	
		</li>			
	</script>
	
	<?php include "./phr/include.php"; ?>
</head>	
<body>
	<div class="wrap col-md-10 col-md-offset-1">
		<div class="row">
			<div class="sider col-md-3">	
				<?php 
					include './widgets/sider.php';
				?>
			</div>
			<div class="main_body col-md-9">	
				<div class="header">	
					<?php include "./widgets/header.php"; ?> 		
				</div>		
				
				<div class="patient_inf col-md-12">
					<?php
						include './widgets/main_body.php';													
					?>	
									
				</div>
					
			</div>
		</div>	
		<div class="myfooter">
			&copy;MarandStudents
		</div>	
	</div>
</body>	
</html>