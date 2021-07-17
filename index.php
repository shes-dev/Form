<?php
	
	//ERRORS DISPLAY

		//error_reporting(E_ALL);
		//ini_set('display_errors', 'On');
		
	//SSL

	if($_SERVER["HTTPS"] != "on")
	{
		header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
		exit();
	}
	
?>

<!DOCTYPE html>
<html>
<title>Survey Form</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
	.w3-row-padding>.w3-half {padding: 4px 8px;}
</style>
<body>

<header class="w3-container w3-teal w3-center">
	<h1>Survey Intro</h1>
</header>

<div class="w3-container w3-col l2 m1 s0">&nbsp;</div>
<div class="w3-container w3-col l8 m10 s12">
	<h2 class="w3-center">What is it?</h2>
  
	<div class="w3-panel w3-card">
		<p>
			The Brain Health Survey is a brief online self-assessment, which focuses on your medical
			and lifestyle risk factors for age-related cognitive decline and dementia. It will help you
			make lifestyle choices that have been shown to protect your brain against brain disorders
			like Alzheimer’s disease.
		</p>
	</div>	
	
	<h2 class="w3-center">How to do I do it?</h2>
	
	<div class="w3-panel w3-card">
		<p>
			The Brain Health Survey is simple, easy and requires only 5-10 minutes of your time. You
			may use a computer, tablet, or smartphone to answer about 20 questions about your
			background, body weight and height, food choices, habits, physical and cognitive
			activities, sleep hygiene and few medical conditions.
			All questions must be answered to complete the survey and if you don’t know the answer
			you just tick “don’t know”.
			All you need to provide is your first name, email address and country of residence so we
			can email you back your Brain Health Survey Report.
		</p>
	</div>
  
	<h3 class="w3-center" style="margin:24px 0px;"><a href="form.php" style="color:#0000ee;">GET YOUR FREE BRAIN HEALTH SURVEY NOW</a></h3>

	<p class="w3-small">	
		Disclaimer: This survey report will provide general information only, and does not intend to practice
		medicine. This report cannot substitute for professional medical advice and it is not meant to be used, nor
		should it be used, to diagnose or treat any medical condition.</p></div>
    </p>
</div>
<div class="w3-container w3-col l2 m1 s0">&nbsp;</div>
</body>
</html> 