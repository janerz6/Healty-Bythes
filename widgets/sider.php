<?php 
	
	$doctor_id = $_SESSION["user_id"];
	$q_get_pacients = "SELECT * FROM patient,doctor,queue WHERE patient.patient_id = queue.patient_id AND doctor.id = queue.doctor_id AND queue.doctor_id = $doctor_id ORDER BY queue.wait_idx;";

	$res = mysqli_query($dbc, $q_get_pacients);	
	clog(mysqli_error($dbc));
		
	 
?>
<div class="sider_label">
	<h4>Waiting patients</h1>
	<button type="button"class="btn btn-success">Next patient</button>	
</div>	
	
<ul class="list-group" id="patient_order">	
	
	<?php 
		while ($row = mysqli_fetch_assoc($res)) {
			?>
				<li class="ui-state-default active" id="<?php echo $row['patient_id']; ?>">		
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
			<?php
		}
	?>
		  
  </ul>							
