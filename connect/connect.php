<?php
	//CONNECTING TO DATABASE
	
		$host = 'localhost';
		$username = 'elad189g_project_03_user';
		$password = 'elad189g_project_03_pass';
		$db = 'elad189g_project_03';

	
	//CREATING CONNECTION
	$con = mysqli_connect($host, $username, $password,$db);
	
	//CHECKING CONNECTION
	if($con)
	{
		//echo '<i class="fa fa-check-square-o" style="font-size:24px;color:purple;"></i>';
		//echo 'connection ok';
	}
	else
	{
		//die('Could not connect: ' . mysqli_error($con));
	}
		
	//SELECTING DATABASE
	mysqli_select_db($con,$db); 
	
	//ENABLING HEBREW
	mysqli_query($con,"SET character_set_client=utf8mb4");
	mysqli_query($con,"SET character_set_connection=utf8mb4");
	mysqli_query($con,"SET character_set_database=utf8mb4");
	mysqli_query($con,"SET character_set_results=utf8mb4");
	mysqli_query($con,"SET character_set_server=utf8mb4");
	
	//SETTING TIME	
	$sql_Time = "SET time_zone = '+03:00';";
    $query = mysqli_query($con,$sql_Time);
	
	//SANITIZING
	$post_name = $con->real_escape_string($_POST['name']);
	$post_email = $con->real_escape_string($_POST['email']);
	$post_country = $con->real_escape_string($_POST['country']);
	$post_age = $con->real_escape_string($_POST['age']);
	$post_sex = $con->real_escape_string($_POST['sex']);
	$post_education = $con->real_escape_string($_POST['education']);
	$post_dementia_family_history = $con->real_escape_string($_POST['dementia_family_history']);
	$post_weight = $con->real_escape_string($_POST['weight']);
	$post_height = $con->real_escape_string($_POST['height']);
	$post_healthy_diet_01 = $con->real_escape_string($_POST['healthy_diet_01']);
	$post_healthy_diet_02 = $con->real_escape_string($_POST['healthy_diet_02']);
	$post_alcohol = $con->real_escape_string($_POST['alcohol']);
	$post_smoking = $con->real_escape_string($_POST['smoking']);
	$post_physical_activity = $con->real_escape_string($_POST['physical_activity']);
	$post_physical_activity_02 = $con->real_escape_string($_POST['physical_activity_02']);
	$post_cognitive_activity_01 = $con->real_escape_string($_POST['cognitive_activity_01']);
	$post_cognitive_activity_02 = $con->real_escape_string($_POST['cognitive_activity_02']);
	$post_cognitive_activity_03 = $con->real_escape_string($_POST['cognitive_activity_03']);
	$post_cognitive_activity_04 = $con->real_escape_string($_POST['cognitive_activity_04']);
	$post_sleep_01 = $con->real_escape_string($_POST['sleep_01']);
	$post_sleep_02 = $con->real_escape_string($_POST['sleep_02']);
	$post_sleep_03 = $con->real_escape_string($_POST['sleep_03']);
	$post_diabetes = $con->real_escape_string($_POST['diabetes']);
	$post_cholesterol = $con->real_escape_string($_POST['cholesterol']);
	$post_hypertension = $con->real_escape_string($_POST['hypertension']);
	$post_depression = $con->real_escape_string($_POST['depression']);
	$post_heart = $con->real_escape_string($_POST['heart']);
	$post_cardiovascular = $con->real_escape_string($_POST['cardiovascular']);
	$post_renal_dysfunction = $con->real_escape_string($_POST['renal_dysfunction']);
