<?php
	
	//ERRORS DISPLAY

		//error_reporting(E_ALL);
		//ini_set('display_errors', 'On');
	
	//calculate alcohol
	function calculate_alcohol_cat($data_01)
	{
		if ($data_01 == "Abstain or rarely") 
		{
			$result_alcohol = 'Abstinence';
		}
		else if ($data_01 == "Less than 3 glasses of wine (or 2 pints of beer)")
		{
			$result_alcohol = 'Light consumption';
		}
		else if ($data_01=="Between 3-6 glasses of wine (or 2-5 pints of beer)")
		{
			$result_alcohol = 'Moderate consumption';
		}
		else
		{
			$result_alcohol = 'Heavy consumption';
		}
		
		return $result_alcohol;
	}
	
	
	//calculate healthy_diet
	function calculate_healthy_diet_cat($data_01,$data_02)
	{
		
		if ($data_01 == "1 or more" && $data_02 == "2 or more" ) 
		{
			$result_healthy_diet = 'Healthy Diet';
		}
		else if ($data_01 == "less than 1 or rarely" && $data_02 == "less than 2 or rarely" )
		{
			$result_healthy_diet = 'Unhealthy Diet';
		}
		else
		{
			$result_healthy_diet = 'Suboptimal Diet';
		}
		
		return $result_healthy_diet;
	}
		
	//calculate bmi
	function calculate_bmi_cat($weight,$height)
	{
		$height = $height/100;
		$bmi = $weight/($height*$height);
		$bmi = round($bmi,1);
		
		if ($bmi<18.5 || $bmi == 18.5) 
		{
			$result_bmi = 'Underweight';
			
		}
		
		if ($bmi>18.5 && $bmi<24.9) 
		{
			$result_bmi = 'Normal weight';
			
		}
		
		if ($bmi==24.9) 
		{
			$result_bmi = 'Normal weight';
			
		}
		
		if ($bmi>24.9 && $bmi<29.9) 
		{
			$result_bmi = 'Overweight';
			
		}
		
		if ($bmi==29.9) 
		{
			$result_bmi = 'Overweight';
			
		}
		
		if ($bmi>29.9) 
		{
			$result_bmi = 'Obesity';
			
		}
		
		return $result_bmi;
	}
	
	//calculate bmi
	function calculate_bmi($weight,$height)
	{
		$height = $height/100;
		$bmi = $weight/($height*$height);
		$bmi = round($bmi,1);
		
		return $bmi;
	}
	
	function calculate_physical_activity($data1 ,$data2)
	{
		if($data1 == "Less than 1 hour per week" && $data2 =="Not practicing gym,sport or intensive leisure activity")
			$result = "Inadequate";
		else if($data1 == "More than 2 hours per week" || $data2 == "Two or more times per week") {
				$result = "Optimal";
			}
		else {
			$result = "Suboptimal";
		}	
		return $result;
	}

	function calculate_sleep($data1,$data2,$data3)
	{
		if($data1 == "Yes" || $data2 == "Yes" || $data3 == "Yes")
			$result = "Probable Sleep problems";
		else if($data1 == "No" && $data2 == "No" && $data3 == "No") {
			$result = "No apparent sleep problems";
		}
		else {
			$result = "Information not available";
		}
		return $result;
	
	}
	
	function calculate_cognitive_activity($data1,$data2,$data3,$data4)
	{
		$result = 0;
		if($data1 == "None to less than 1 hour") {
			$result += 1;
		}
		else if($data1 == "1-3 hours") {
			$result += 4;
		}
		else if($data1 == "more than 3 hours") {
			$result += 6;
		}
	
		if($data2 == "Every day or almost every day")
			$result += 6;
		else if($data2 == "Several times a week") {
			$result += 4;
		}
		else if($data2 == "Several times a month") {
			$result += 2;
		}
		else if($data2 == "Several times a year or less") {
			$result += 1;
		}
	   
		if($data3 == "Every day or almost every day")
			$result += 6;
		else if($data3 == "Several times a week") {
			$result += 4;
		}
		else if($data3 == "Several times a month") {
			$result += 2;
		}
		else if($data3 == "Several times a year or less") {
			$result += 1;
		}
			
		if($data4 == "Every day or almost every day")
			$result += 6;
		else if($data4 == "Several times a week") {
			$result += 4; 
		}
		else if($data4 == "Several times a month") {
			$result += 2;
		}
		else if($data4 == "Several times a year or less") {
			$result += 1;
		}	
	   
		return "You scored ".$result." of 24 max. points";
	}
		
	
	//create pdf
	function create_pdf($post_result)
	{
		include 'htmlToPhpFullData.php';
	}
	
	$countries =
 
	array(
	"AF" => "Afghanistan",
	"AL" => "Albania",
	"DZ" => "Algeria",
	"AS" => "American Samoa",
	"AD" => "Andorra",
	"AO" => "Angola",
	"AI" => "Anguilla",
	"AQ" => "Antarctica",
	"AG" => "Antigua and Barbuda",
	"AR" => "Argentina",
	"AM" => "Armenia",
	"AW" => "Aruba",
	"AU" => "Australia",
	"AT" => "Austria",
	"AZ" => "Azerbaijan",
	"BS" => "Bahamas",
	"BH" => "Bahrain",
	"BD" => "Bangladesh",
	"BB" => "Barbados",
	"BY" => "Belarus",
	"BE" => "Belgium",
	"BZ" => "Belize",
	"BJ" => "Benin",
	"BM" => "Bermuda",
	"BT" => "Bhutan",
	"BO" => "Bolivia",
	"BA" => "Bosnia and Herzegovina",
	"BW" => "Botswana",
	"BV" => "Bouvet Island",
	"BR" => "Brazil",
	"IO" => "British Indian Ocean Territory",
	"BN" => "Brunei Darussalam",
	"BG" => "Bulgaria",
	"BF" => "Burkina Faso",
	"BI" => "Burundi",
	"KH" => "Cambodia",
	"CM" => "Cameroon",
	"CA" => "Canada",
	"CV" => "Cape Verde",
	"KY" => "Cayman Islands",
	"CF" => "Central African Republic",
	"TD" => "Chad",
	"CL" => "Chile",
	"CN" => "China",
	"CX" => "Christmas Island",
	"CC" => "Cocos (Keeling) Islands",
	"CO" => "Colombia",
	"KM" => "Comoros",
	"CG" => "Congo",
	"CD" => "Congo, the Democratic Republic of the",
	"CK" => "Cook Islands",
	"CR" => "Costa Rica",
	"CI" => "Cote D'Ivoire",
	"HR" => "Croatia",
	"CU" => "Cuba",
	"CY" => "Cyprus",
	"CZ" => "Czech Republic",
	"DK" => "Denmark",
	"DJ" => "Djibouti",
	"DM" => "Dominica",
	"DO" => "Dominican Republic",
	"EC" => "Ecuador",
	"EG" => "Egypt",
	"SV" => "El Salvador",
	"GQ" => "Equatorial Guinea",
	"ER" => "Eritrea",
	"EE" => "Estonia",
	"ET" => "Ethiopia",
	"FK" => "Falkland Islands (Malvinas)",
	"FO" => "Faroe Islands",
	"FJ" => "Fiji",
	"FI" => "Finland",
	"FR" => "France",
	"GF" => "French Guiana",
	"PF" => "French Polynesia",
	"TF" => "French Southern Territories",
	"GA" => "Gabon",
	"GM" => "Gambia",
	"GE" => "Georgia",
	"DE" => "Germany",
	"GH" => "Ghana",
	"GI" => "Gibraltar",
	"GR" => "Greece",
	"GL" => "Greenland",
	"GD" => "Grenada",
	"GP" => "Guadeloupe",
	"GU" => "Guam",
	"GT" => "Guatemala",
	"GN" => "Guinea",
	"GW" => "Guinea-Bissau",
	"GY" => "Guyana",
	"HT" => "Haiti",
	"HM" => "Heard Island and Mcdonald Islands",
	"VA" => "Holy See (Vatican City State)",
	"HN" => "Honduras",
	"HK" => "Hong Kong",
	"HU" => "Hungary",
	"IS" => "Iceland",
	"IN" => "India",
	"ID" => "Indonesia",
	"IR" => "Iran, Islamic Republic of",
	"IQ" => "Iraq",
	"IE" => "Ireland",
	"IL" => "Israel",
	"IT" => "Italy",
	"JM" => "Jamaica",
	"JP" => "Japan",
	"JO" => "Jordan",
	"KZ" => "Kazakhstan",
	"KE" => "Kenya",
	"KI" => "Kiribati",
	"KP" => "Korea, Democratic People's Republic of",
	"KR" => "Korea, Republic of",
	"KW" => "Kuwait",
	"KG" => "Kyrgyzstan",
	"LA" => "Lao People's Democratic Republic",
	"LV" => "Latvia",
	"LB" => "Lebanon",
	"LS" => "Lesotho",
	"LR" => "Liberia",
	"LY" => "Libyan Arab Jamahiriya",
	"LI" => "Liechtenstein",
	"LT" => "Lithuania",
	"LU" => "Luxembourg",
	"MO" => "Macao",
	"MK" => "Macedonia, the Former Yugoslav Republic of",
	"MG" => "Madagascar",
	"MW" => "Malawi",
	"MY" => "Malaysia",
	"MV" => "Maldives",
	"ML" => "Mali",
	"MT" => "Malta",
	"MH" => "Marshall Islands",
	"MQ" => "Martinique",
	"MR" => "Mauritania",
	"MU" => "Mauritius",
	"YT" => "Mayotte",
	"MX" => "Mexico",
	"FM" => "Micronesia, Federated States of",
	"MD" => "Moldova, Republic of",
	"MC" => "Monaco",
	"MN" => "Mongolia",
	"MS" => "Montserrat",
	"MA" => "Morocco",
	"MZ" => "Mozambique",
	"MM" => "Myanmar",
	"NA" => "Namibia",
	"NR" => "Nauru",
	"NP" => "Nepal",
	"NL" => "Netherlands",
	"AN" => "Netherlands Antilles",
	"NC" => "New Caledonia",
	"NZ" => "New Zealand",
	"NI" => "Nicaragua",
	"NE" => "Niger",
	"NG" => "Nigeria",
	"NU" => "Niue",
	"NF" => "Norfolk Island",
	"MP" => "Northern Mariana Islands",
	"NO" => "Norway",
	"OM" => "Oman",
	"PK" => "Pakistan",
	"PW" => "Palau",
	"PS" => "Palestinian Territory, Occupied",
	"PA" => "Panama",
	"PG" => "Papua New Guinea",
	"PY" => "Paraguay",
	"PE" => "Peru",
	"PH" => "Philippines",
	"PN" => "Pitcairn",
	"PL" => "Poland",
	"PT" => "Portugal",
	"PR" => "Puerto Rico",
	"QA" => "Qatar",
	"RE" => "Reunion",
	"RO" => "Romania",
	"RU" => "Russian Federation",
	"RW" => "Rwanda",
	"SH" => "Saint Helena",
	"KN" => "Saint Kitts and Nevis",
	"LC" => "Saint Lucia",
	"PM" => "Saint Pierre and Miquelon",
	"VC" => "Saint Vincent and the Grenadines",
	"WS" => "Samoa",
	"SM" => "San Marino",
	"ST" => "Sao Tome and Principe",
	"SA" => "Saudi Arabia",
	"SN" => "Senegal",
	"CS" => "Serbia and Montenegro",
	"SC" => "Seychelles",
	"SL" => "Sierra Leone",
	"SG" => "Singapore",
	"SK" => "Slovakia",
	"SI" => "Slovenia",
	"SB" => "Solomon Islands",
	"SO" => "Somalia",
	"ZA" => "South Africa",
	"GS" => "South Georgia and the South Sandwich Islands",
	"ES" => "Spain",
	"LK" => "Sri Lanka",
	"SD" => "Sudan",
	"SR" => "Suriname",
	"SJ" => "Svalbard and Jan Mayen",
	"SZ" => "Swaziland",
	"SE" => "Sweden",
	"CH" => "Switzerland",
	"SY" => "Syrian Arab Republic",
	"TW" => "Taiwan, Province of China",
	"TJ" => "Tajikistan",
	"TZ" => "Tanzania, United Republic of",
	"TH" => "Thailand",
	"TL" => "Timor-Leste",
	"TG" => "Togo",
	"TK" => "Tokelau",
	"TO" => "Tonga",
	"TT" => "Trinidad and Tobago",
	"TN" => "Tunisia",
	"TR" => "Turkey",
	"TM" => "Turkmenistan",
	"TC" => "Turks and Caicos Islands",
	"TV" => "Tuvalu",
	"UG" => "Uganda",
	"UA" => "Ukraine",
	"AE" => "United Arab Emirates",
	"GB" => "United Kingdom",
	"US" => "United States",
	"UM" => "United States Minor Outlying Islands",
	"UY" => "Uruguay",
	"UZ" => "Uzbekistan",
	"VU" => "Vanuatu",
	"VE" => "Venezuela",
	"VN" => "Viet Nam",
	"VG" => "Virgin Islands, British",
	"VI" => "Virgin Islands, U.s.",
	"WF" => "Wallis and Futuna",
	"EH" => "Western Sahara",
	"YE" => "Yemen",
	"ZM" => "Zambia",
	"ZW" => "Zimbabwe"
	);
	
	//POST REQUEST WAS MADE TO REACH THE PAGE
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		
		
		
		//ECHO POST
		//echo '<pre>';
		//var_dump($_POST);
		//echo '</pre>';
		
		//CONNECT TO DB
		include 'connect/connect.php';

		//INSERT VALUES
		$sql = "INSERT INTO project_03_data (name,email,country,age,sex,education,dementia_family_history,weight,height,healthy_diet_01,healthy_diet_02,alcohol,smoking,physical_activity,physical_activity_02,cognitive_activity_01,cognitive_activity_02,cognitive_activity_03,cognitive_activity_04,sleep_01,sleep_02,sleep_03,diabetes,cholesterol,hypertension,depression,heart,cardiovascular,renal_dysfunction) VALUES ('$post_name','$post_email','$post_country','$post_age','$post_sex','$post_education','$post_dementia_family_history','$post_weight','$post_height','$post_healthy_diet_01','$post_healthy_diet_02','$post_alcohol','$post_smoking','$post_physical_activity','$post_physical_activity_02','$post_cognitive_activity_01','$post_cognitive_activity_02','$post_cognitive_activity_03','$post_cognitive_activity_04','$post_sleep_01','$post_sleep_02','$post_sleep_03','$post_diabetes','$post_cholesterol','$post_hypertension','$post_depression','$post_heart','$post_cardiovascular','$post_renal_dysfunction')";
		$query = mysqli_query($con,$sql);
		
		
		//OUTPUT VALUES
		$sql = "SELECT * FROM project_03_data ORDER BY timestamp DESC LIMIT 1";
		
		if ($query = mysqli_query($con,$sql)) 
		{
			$post_result=array();
			
			while ($row = mysqli_fetch_assoc($query)) 
			{
				$b=array_keys($row);
				for($i=0;$i<count($row);$i++)
				{
					$post_result[$b[$i]]=$row[$b[$i]];
				}
			}
		}
		
		//calculate
		$post_result["BMI"]=calculate_bmi($post_result["weight"],$post_result["height"]);
		$post_result["BMI_CAT"]=calculate_bmi_cat($post_result["weight"],$post_result["height"]);
		$post_result["HEALTHY_DIET_CAT"]=calculate_healthy_diet_cat($post_result["healthy_diet_01"],$post_result["healthy_diet_02"]);
		$post_result["ALCOHOL_CAT"]=calculate_alcohol_cat($post_result["alcohol"]);
		$post_result["PHYSICAL_ACTIVITY_CAT"]=calculate_physical_activity($post_result["physical_activity"],$post_result["physical_activity_02"]);
		$post_result["SLEEP_CAT"]=calculate_sleep($post_result["sleep_01"],$post_result["sleep_02"],$post_result["sleep_03"]);
		$post_result["COGNITIVE_ACTIVITY_SCORE"]=calculate_cognitive_activity($post_result["cognitive_activity_01"],$post_result["cognitive_activity_02"],$post_result["cognitive_activity_03"],$post_result["cognitive_activity_04"]);
		
		//ECHO POST
		//echo '<pre>';
		//var_dump($post_result);
		//echo '</pre>';
	
	
		//pdf
		create_pdf($post_result);
		
		header("location: after_form.php");

		
		
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
  <h1>Survey Form</h1>
</header>

<div class="w3-container w3-half w3-margin-top">
	
	<form action="" method="post" enctype="multipart/form-data">

	<div class="w3-container w3-card-4" style="padding-bottom:16px;border-radius:5px;">
		
		<div class="w3-row-padding">
			<h4><u>Contact Information</u></h4>
		</div>
		
		<div class="w3-row-padding">
			<div class="w3-half">
				<label><b>First Name</b></label>
				<input type="text" name="name" required>
			</div>
			<div class="w3-half">
				<label>	
					<b>Email</b>
				</label>
				<input type="email" name="email" required>
			</div>
		</div>
		
		<div class="w3-row-padding">
			<div class="w3-half">
				<label><b>Country</b></label>
				<select class="w3-select" name="country" required>
					<option value="" disabled selected>Choose your option</option>
					<?php
					
					foreach($countries as $country){
						echo '<option value="'.$country.'">'.$country.'</option>';
					}

					?>

				</select>
			</div>
			<div class="w3-half">
			</div>
		</div>
		
		<div class="w3-row-padding">
			<h4><u>Background Information</u></h4>
		</div>
		
		<div class="w3-row-padding">
			<div class="w3-half">
				<label><b>Age</b></label>
				<select class="w3-select" name="age" required>
					<option value="" disabled selected>Choose your option</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
					<option value="21">21</option>
					<option value="22">22</option>
					<option value="23">23</option>
					<option value="24">24</option>
					<option value="25">25</option>
					<option value="26">26</option>
					<option value="27">27</option>
					<option value="28">28</option>
					<option value="29">29</option>
					<option value="30">30</option>
					<option value="31">31</option>
					<option value="32">32</option>
					<option value="33">33</option>
					<option value="34">34</option>
					<option value="35">35</option>
					<option value="36">36</option>
					<option value="37">37</option>
					<option value="38">38</option>
					<option value="39">39</option>
					<option value="40">40</option>
					<option value="41">41</option>
					<option value="42">42</option>
					<option value="43">43</option>
					<option value="44">44</option>
					<option value="45">45</option>
					<option value="46">46</option>
					<option value="47">47</option>
					<option value="48">48</option>
					<option value="49">49</option>
					<option value="50">50</option>
					<option value="51">51</option>
					<option value="52">52</option>
					<option value="53">53</option>
					<option value="54">54</option>
					<option value="55">55</option>
					<option value="56">56</option>
					<option value="57">57</option>
					<option value="58">58</option>
					<option value="59">59</option>
					<option value="60">60</option>
					<option value="61">61</option>
					<option value="62">62</option>
					<option value="63">63</option>
					<option value="64">64</option>
					<option value="65">65</option>
					<option value="66">66</option>
					<option value="67">67</option>
					<option value="68">68</option>
					<option value="69">69</option>
					<option value="70">70</option>
					<option value="71">71</option>
					<option value="72">72</option>
					<option value="73">73</option>
					<option value="74">74</option>
					<option value="75">75</option>
					<option value="76">76</option>
					<option value="77">77</option>
					<option value="78">78</option>
					<option value="79">79</option>
					<option value="80">80</option>
					<option value="81">81</option>
					<option value="82">82</option>
					<option value="83">83</option>
					<option value="84">84</option>
					<option value="85">85</option>
					<option value="86">86</option>
					<option value="87">87</option>
					<option value="88">88</option>
					<option value="89">89</option>
					<option value="90">90</option>
					<option value="91">91</option>
					<option value="92">92</option>
					<option value="93">93</option>
					<option value="94">94</option>
					<option value="95">95</option>
					<option value="96">96</option>
					<option value="97">97</option>
					<option value="98">98</option>
					<option value="99">99</option>
					<option value="100">100</option>
					<option value="101">101</option>
					<option value="102">102</option>
					<option value="103">103</option>
					<option value="104">104</option>
					<option value="105">105</option>
					<option value="106">106</option>
					<option value="107">107</option>
					<option value="108">108</option>
					<option value="109">109</option>
					<option value="110">110</option>
					<option value="111">111</option>
					<option value="112">112</option>
					<option value="113">113</option>
					<option value="114">114</option>
					<option value="115">115</option>
					<option value="116">116</option>
					<option value="117">117</option>
					<option value="118">118</option>
					<option value="119">119</option>
					<option value="120">120</option>
					<option value="121">121</option>
					<option value="122">122</option>
					<option value="123">123</option>
				</select>
			</div>
			<div class="w3-half">
				<label><b>Sex</b></label>
				<select class="w3-select" name="sex" required>
					<option value="" disabled selected>Choose your option</option>
					<option value="Male">male</option>
					<option value="Female">female</option>
				</select>	
			</div>
		</div>
		
		<div class="w3-row-padding">
			<div class="w3-half">
				<label><b>Education</b></label>
				<select class="w3-select" name="education" required>
					<option value="" disabled selected>Choose your option</option>
					<option value="Under 8 years">Under 8 years</option>
					<option value="8-11 years">8-11 years</option>
					<option value="Over 11 years">over 11 years</option>
				</select>
			</div>
			<div class="w3-half">
				<label>	
					<b>Family history of early dementia<sup>1</sup> or genetic predisposition<sup>2</sup></b><br>
					<p style="font-size:12px;margin:0px;"><sup>1</sup>Before 65 years of age</p>
					<p style="font-size:12px;margin:0px;"><sup>2</sup>Positive for the ApoE4 gene or other dementia related genes</p>
				</label>
				<select class="w3-select" name="dementia_family_history" required>
					<option value="" disabled selected>Choose your option</option>
					<option value="Yes">yes</option>
					<option value="No">no</option>
					<option value="Dont know">Don't know</option>
				</select>	
			</div>
		</div>
		
		<hr>
		
		<div class="w3-row-padding">
			<h4><u>Lifestyle Factors</u></h4>
		</div>
		
		<div class="w3-row-padding">
			<div class="w3-half">
				<label><b>Weight[kg]</b></label>
				<select class="w3-select" name="weight" required>
					<option value="" disabled selected>Choose your option</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
					<option value="21">21</option>
					<option value="22">22</option>
					<option value="23">23</option>
					<option value="24">24</option>
					<option value="25">25</option>
					<option value="26">26</option>
					<option value="27">27</option>
					<option value="28">28</option>
					<option value="29">29</option>
					<option value="30">30</option>
					<option value="31">31</option>
					<option value="32">32</option>
					<option value="33">33</option>
					<option value="34">34</option>
					<option value="35">35</option>
					<option value="36">36</option>
					<option value="37">37</option>
					<option value="38">38</option>
					<option value="39">39</option>
					<option value="40">40</option>
					<option value="41">41</option>
					<option value="42">42</option>
					<option value="43">43</option>
					<option value="44">44</option>
					<option value="45">45</option>
					<option value="46">46</option>
					<option value="47">47</option>
					<option value="48">48</option>
					<option value="49">49</option>
					<option value="50">50</option>
					<option value="51">51</option>
					<option value="52">52</option>
					<option value="53">53</option>
					<option value="54">54</option>
					<option value="55">55</option>
					<option value="56">56</option>
					<option value="57">57</option>
					<option value="58">58</option>
					<option value="59">59</option>
					<option value="60">60</option>
					<option value="61">61</option>
					<option value="62">62</option>
					<option value="63">63</option>
					<option value="64">64</option>
					<option value="65">65</option>
					<option value="66">66</option>
					<option value="67">67</option>
					<option value="68">68</option>
					<option value="69">69</option>
					<option value="70">70</option>
					<option value="71">71</option>
					<option value="72">72</option>
					<option value="73">73</option>
					<option value="74">74</option>
					<option value="75">75</option>
					<option value="76">76</option>
					<option value="77">77</option>
					<option value="78">78</option>
					<option value="79">79</option>
					<option value="80">80</option>
					<option value="81">81</option>
					<option value="82">82</option>
					<option value="83">83</option>
					<option value="84">84</option>
					<option value="85">85</option>
					<option value="86">86</option>
					<option value="87">87</option>
					<option value="88">88</option>
					<option value="89">89</option>
					<option value="90">90</option>
					<option value="91">91</option>
					<option value="92">92</option>
					<option value="93">93</option>
					<option value="94">94</option>
					<option value="95">95</option>
					<option value="96">96</option>
					<option value="97">97</option>
					<option value="98">98</option>
					<option value="99">99</option>
					<option value="100">100</option>
					<option value="101">101</option>
					<option value="102">102</option>
					<option value="103">103</option>
					<option value="104">104</option>
					<option value="105">105</option>
					<option value="106">106</option>
					<option value="107">107</option>
					<option value="108">108</option>
					<option value="109">109</option>
					<option value="110">110</option>
					<option value="111">111</option>
					<option value="112">112</option>
					<option value="113">113</option>
					<option value="114">114</option>
					<option value="115">115</option>
					<option value="116">116</option>
					<option value="117">117</option>
					<option value="118">118</option>
					<option value="119">119</option>
					<option value="120">120</option>
					<option value="121">121</option>
					<option value="122">122</option>
					<option value="123">123</option>
					<option value="124">124</option>
					<option value="125">125</option>
					<option value="126">126</option>
					<option value="127">127</option>
					<option value="128">128</option>
					<option value="129">129</option>
					<option value="130">130</option>
					<option value="131">131</option>
					<option value="132">132</option>
					<option value="133">133</option>
					<option value="134">134</option>
					<option value="135">135</option>
					<option value="136">136</option>
					<option value="137">137</option>
					<option value="138">138</option>
					<option value="139">139</option>
					<option value="140">140</option>
					<option value="140">140</option>
					<option value="141">141</option>
					<option value="142">142</option>
					<option value="143">143</option>
					<option value="144">144</option>
					<option value="145">145</option>
					<option value="146">146</option>
					<option value="147">147</option>
					<option value="148">148</option>
					<option value="149">149</option>
					<option value="150">150</option>
					<option value="150">150</option>
					<option value="151">151</option>
					<option value="152">152</option>
					<option value="153">153</option>
					<option value="154">154</option>
					<option value="155">155</option>
					<option value="156">156</option>
					<option value="157">157</option>
					<option value="158">158</option>
					<option value="159">159</option>
					<option value="160">160</option>
					<option value="160">160</option>
					<option value="161">161</option>
					<option value="162">162</option>
					<option value="163">163</option>
					<option value="164">164</option>
					<option value="165">165</option>
					<option value="166">166</option>
					<option value="167">167</option>
					<option value="168">168</option>
					<option value="169">169</option>
					<option value="170">170</option>
					<option value="171">171</option>
					<option value="172">172</option>
					<option value="173">173</option>
					<option value="174">174</option>
					<option value="175">175</option>
					<option value="176">176</option>
					<option value="177">177</option>
					<option value="178">178</option>
					<option value="179">179</option>
					<option value="180">180</option>
					<option value="180">180</option>
					<option value="181">181</option>
					<option value="182">182</option>
					<option value="183">183</option>
					<option value="184">184</option>
					<option value="185">185</option>
					<option value="186">186</option>
					<option value="187">187</option>
					<option value="188">188</option>
					<option value="189">189</option>
					<option value="190">190</option>
					<option value="190">190</option>
					<option value="191">191</option>
					<option value="192">192</option>
					<option value="193">193</option>
					<option value="194">194</option>
					<option value="195">195</option>
					<option value="196">196</option>
					<option value="197">197</option>
					<option value="198">198</option>
					<option value="199">199</option>
					<option value="200">200</option>
					<option value="201">201</option>
					<option value="202">202</option>
					<option value="203">203</option>
					<option value="204">204</option>
					<option value="205">205</option>
					<option value="206">206</option>
					<option value="207">207</option>
					<option value="208">208</option>
					<option value="209">209</option>
					<option value="210">210</option>
					<option value="210">210</option>
					<option value="211">211</option>
					<option value="212">212</option>
					<option value="213">213</option>
					<option value="214">214</option>
					<option value="215">215</option>
					<option value="216">216</option>
					<option value="217">217</option>
					<option value="218">218</option>
					<option value="219">219</option>
					<option value="220">220</option>
					<option value="221">221</option>
					<option value="222">222</option>
					<option value="223">223</option>
					<option value="224">224</option>
					<option value="225">225</option>
					<option value="226">226</option>
					<option value="227">227</option>
					<option value="228">228</option>
					<option value="229">229</option>
					<option value="230">230</option>
				</select>
			</div>
			<div class="w3-half">
				<label><b>Height[cm]</b></label>
				<select class="w3-select" name="height" required>
					<option value="" disabled selected>Choose your option</option>
					<option value="50">50</option>
					<option value="51">51</option>
					<option value="52">52</option>
					<option value="53">53</option>
					<option value="54">54</option>
					<option value="55">55</option>
					<option value="56">56</option>
					<option value="57">57</option>
					<option value="58">58</option>
					<option value="59">59</option>
					<option value="60">60</option>
					<option value="61">61</option>
					<option value="62">62</option>
					<option value="63">63</option>
					<option value="64">64</option>
					<option value="65">65</option>
					<option value="66">66</option>
					<option value="67">67</option>
					<option value="68">68</option>
					<option value="69">69</option>
					<option value="70">70</option>
					<option value="71">71</option>
					<option value="72">72</option>
					<option value="73">73</option>
					<option value="74">74</option>
					<option value="75">75</option>
					<option value="76">76</option>
					<option value="77">77</option>
					<option value="78">78</option>
					<option value="79">79</option>
					<option value="80">80</option>
					<option value="81">81</option>
					<option value="82">82</option>
					<option value="83">83</option>
					<option value="84">84</option>
					<option value="85">85</option>
					<option value="86">86</option>
					<option value="87">87</option>
					<option value="88">88</option>
					<option value="89">89</option>
					<option value="90">90</option>
					<option value="91">91</option>
					<option value="92">92</option>
					<option value="93">93</option>
					<option value="94">94</option>
					<option value="95">95</option>
					<option value="96">96</option>
					<option value="97">97</option>
					<option value="98">98</option>
					<option value="99">99</option>
					<option value="100">100</option>
					<option value="101">101</option>
					<option value="102">102</option>
					<option value="103">103</option>
					<option value="104">104</option>
					<option value="105">105</option>
					<option value="106">106</option>
					<option value="107">107</option>
					<option value="108">108</option>
					<option value="109">109</option>
					<option value="110">110</option>
					<option value="111">111</option>
					<option value="112">112</option>
					<option value="113">113</option>
					<option value="114">114</option>
					<option value="115">115</option>
					<option value="116">116</option>
					<option value="117">117</option>
					<option value="118">118</option>
					<option value="119">119</option>
					<option value="120">120</option>
					<option value="121">121</option>
					<option value="122">122</option>
					<option value="123">123</option>
					<option value="124">124</option>
					<option value="125">125</option>
					<option value="126">126</option>
					<option value="127">127</option>
					<option value="128">128</option>
					<option value="129">129</option>
					<option value="130">130</option>
					<option value="131">131</option>
					<option value="132">132</option>
					<option value="133">133</option>
					<option value="134">134</option>
					<option value="135">135</option>
					<option value="136">136</option>
					<option value="137">137</option>
					<option value="138">138</option>
					<option value="139">139</option>
					<option value="140">140</option>
					<option value="140">140</option>
					<option value="141">141</option>
					<option value="142">142</option>
					<option value="143">143</option>
					<option value="144">144</option>
					<option value="145">145</option>
					<option value="146">146</option>
					<option value="147">147</option>
					<option value="148">148</option>
					<option value="149">149</option>
					<option value="150">150</option>
					<option value="150">150</option>
					<option value="151">151</option>
					<option value="152">152</option>
					<option value="153">153</option>
					<option value="154">154</option>
					<option value="155">155</option>
					<option value="156">156</option>
					<option value="157">157</option>
					<option value="158">158</option>
					<option value="159">159</option>
					<option value="160">160</option>
					<option value="160">160</option>
					<option value="161">161</option>
					<option value="162">162</option>
					<option value="163">163</option>
					<option value="164">164</option>
					<option value="165">165</option>
					<option value="166">166</option>
					<option value="167">167</option>
					<option value="168">168</option>
					<option value="169">169</option>
					<option value="170">170</option>
					<option value="171">171</option>
					<option value="172">172</option>
					<option value="173">173</option>
					<option value="174">174</option>
					<option value="175">175</option>
					<option value="176">176</option>
					<option value="177">177</option>
					<option value="178">178</option>
					<option value="179">179</option>
					<option value="180">180</option>
					<option value="180">180</option>
					<option value="181">181</option>
					<option value="182">182</option>
					<option value="183">183</option>
					<option value="184">184</option>
					<option value="185">185</option>
					<option value="186">186</option>
					<option value="187">187</option>
					<option value="188">188</option>
					<option value="189">189</option>
					<option value="190">190</option>
					<option value="190">190</option>
					<option value="191">191</option>
					<option value="192">192</option>
					<option value="193">193</option>
					<option value="194">194</option>
					<option value="195">195</option>
					<option value="196">196</option>
					<option value="197">197</option>
					<option value="198">198</option>
					<option value="199">199</option>
					<option value="200">200</option>
					<option value="201">201</option>
					<option value="202">202</option>
					<option value="203">203</option>
					<option value="204">204</option>
					<option value="205">205</option>
					<option value="206">206</option>
					<option value="207">207</option>
					<option value="208">208</option>
					<option value="209">209</option>
					<option value="210">210</option>
					<option value="210">210</option>
					<option value="211">211</option>
					<option value="212">212</option>
					<option value="213">213</option>
					<option value="214">214</option>
					<option value="215">215</option>
					<option value="216">216</option>
					<option value="217">217</option>
					<option value="218">218</option>
					<option value="219">219</option>
					<option value="220">220</option>
					<option value="221">221</option>
					<option value="222">222</option>
					<option value="223">223</option>
					<option value="224">224</option>
					<option value="225">225</option>
					<option value="226">226</option>
					<option value="227">227</option>
					<option value="228">228</option>
					<option value="229">229</option>
					<option value="230">230</option>
				</select>	
			</div>
		</div>
		
		<div class="w3-row-padding">
			<div class="w3-half">
				<label><b>Healthy Diet</b><br>
				How many portions per day of raw and/or cooked fruits/vegetables you eat?</label>
				<select class="w3-select" name="healthy_diet_01" required>
					<option value="" disabled selected>Choose your option</option>
					<option value="1 or more">1 or more</option>
					<option value="less than 1 or rarely">less than 1 or rarely</option>
				</select>
			</div>
			<div class="w3-half">
				<label>	
				<label><b>Healthy Diet</b><br>
				How many portions per week of fish you eat?</label>
				<select class="w3-select" name="healthy_diet_02" required>
					<option value="" disabled selected>Choose your option</option>
					<option value="2 or more">2 or more</option>
					<option value="less than 2 or rarely">less than 2 or rarely</option>
				</select>	
			</div>
		</div>
		
		<div class="w3-row-padding">
			<div class="w3-half">
				<label><b>Alcohol</b><br>
				How much alcohol do you regularly drink per week?</label>
				<select class="w3-select" name="alcohol" required>
					<option value="" disabled selected>Choose your option</option>
					<option value="Abstain or rarely">Abstain or rarely</option>
					<option value="Less than 3 glasses of wine (or 2 pints of beer)">Less than 3 glasses of wine (or 2 pints of beer)</option>
					<option value="Between 3-6 glasses of wine (or 2-5 pints of beer)">Between 3-6 glasses of wine (or 2-5 pints of beer)</option>
					<option value="More than 6 glasses of wine (or 5 pints of beer)">More than 6 glasses of wine (or 5 pints of beer)</option>
				</select>
			</div>
			<div class="w3-half">
				<label>	
				<label><b>Smoking</b><br>
				</label>
				<select class="w3-select" name="smoking" required>
					<option value="" disabled selected>Choose your option</option>
					<option value="Never">Never</option>
					<option value="Former (not smoking in the last year)">Former (not smoking in the last year)</option>
					<option value="Currently smoking">Currently smoking</option>
				</select>	
			</div>
		</div>
		
		<div class="w3-row-padding">
			<div class="w3-half">
				<label><b>Physical activity</b><br>
					Do you regularly engage in physical activity (i.e., recreational walking) and how often?
				</label>
				<select class="w3-select" name="physical_activity" required>
					<option value="" disabled selected>Choose your option</option>
					<option value="Less than 1 hour per week">Less than 1 hour per week</option>
					<option value="1-2 hours per week">1-2 hours per week</option>
					<option value="More than 2 hours per week">More than 2 hours per week</option>
				</select>
			</div>
			
			<div class="w3-half">
				<label><b>Physical Activity</b><br>
					Do you regularly engage in gym (fitness exercises), sport or intensive leisure activity and how often?
				</label>
				<select class="w3-select" name="physical_activity_02" required>
					<option value="" disabled selected>Choose your option</option>
					<option value="Not practicing gym, sport or intensive leisure activity">Not practicing gym, sport or intensive leisure activity</option>
					<option value="Once a Week – once a month">Once a Week – once a month</option>
					<option value="Two or more times per week">Two or more times per week</option>
				</select>	
			</div>
		</div>
		
		<div class="w3-row-padding">
			<div class="w3-half">
				<label>	
				<label><b>Cognitive activity</b><br>
				About how much time do you spend reading each day (newspapers, magazines or books), including online
				reading?
				</label>
				<select class="w3-select" name="cognitive_activity_01" required>
					<option value="" disabled selected>Choose your option</option>
					<option value="None to less than 1 hour">None to less than 1 hour</option>
					<option value="1-3 hours">1-3 hours</option>
					<option value="more than 3 hours">more than 3 hours</option>
					<option value="Don’t Know">Don’t Know</option>
				</select>	
			</div>
			
			<div class="w3-half">
				<label><b>Cognitive activity</b><br>
					For the past year/month how often did you play "brain games"?<sup>1</sup><br>
				<p style="font-size:12px;margin:0px;"><sup>1</sup>Like checkers or other board games, cards, puzzles, word games, mind teasers, or any other similar games (This includes
				online games)</p>
				</label>
				<select class="w3-select" name="cognitive_activity_02" required>
					<option value="" disabled selected>Choose your option</option>
					<option value="Every day or almost every day">Every day or almost every day</option>
					<option value="Several times a week">Several times a week</option>
					<option value="Several times a month">Several times a month</option>
					<option value="Several times a year or less">Several times a year or less</option>
					<option value="Don’t know">Don’t know</option>
				</select>	
			</div>
		</div>	
	</div>
</div>

<div class="w3-container w3-half w3-margin-top">
	<div class="w3-container w3-card-4" style="border-radius:5px;">
		<div class="w3-row-padding">
			
		
			<div class="w3-half">
				<label><b>Cognitive activity</b><br>
					For the past year/month how often did you write letters or emails?
				</label>
				<select class="w3-select" name="cognitive_activity_03" required>
					<option value="" disabled selected>Choose your option</option>
					<option value="Every day or almost every day">Every day or almost every day</option>
					<option value="Several times a week">Several times a week</option>
					<option value="Several times a month">Several times a month</option>
					<option value="Several times a year or less">Several times a year or less</option>
					<option value="Don’t know">Don’t know</option>
				</select>	
			</div>
			
			<div class="w3-half">
				<label><b>Cognitive activity</b><br>
					For the past year/month how often did you use online social network activities like facebook/ twitter?
				</label>
				<select class="w3-select" name="cognitive_activity_04" required>
					<option value="" disabled selected>Choose your option</option>
					<option value="Every day or almost every day">Every day or almost every day</option>
					<option value="Several times a week">Several times a week</option>
					<option value="Several times a month">Several times a month</option>
					<option value="Several times a year or less">Several times a year or less</option>
					<option value="Don’t know">Don’t know</option>
				</select>	
			</div>
				
		</div>
		
		<div class="w3-row-padding">
			<div class="w3-half">
				<label><b>Sleep</b><br>
					Do you have problems initiating sleep, trouble maintaining sleep, or waking up early and not being able to go
					back to sleep?
				</label>
				<select class="w3-select" name="sleep_01" required>
					<option value="" disabled selected>Choose your option</option>
					<option value="Yes">Yes</option>
					<option value="No">No</option>
					<option value="Don’t know">Don’t know</option>
				</select>	
			</div>
			
			<div class="w3-half">
				<label><b>Sleep</b><br>
					Do you have sleep-disordered breathing (snoring or sleep apnea)?
				</label>
				<select class="w3-select" name="sleep_02" required>
					<option value="" disabled selected>Choose your option</option>
					<option value="Yes">Yes</option>
					<option value="No">No</option>
					<option value="Don’t know">Don’t know</option>
				</select>	
			</div>
			
		</div>
		
		<div class="w3-row-padding">
			<div class="w3-half">
				<label><b>Sleep</b><br>
					Are you taking any sleeping pills regularly?
				</label>
				<select class="w3-select" name="sleep_03" required>
					<option value="" disabled selected>Choose your option</option>
					<option value="Yes">Yes</option>
					<option value="No">No</option>
					<option value="Don’t know">Don’t know</option>
				</select>	
			</div>
		</div>
		
		<hr>
		
		<div class="w3-row-padding">
			<h4><u>Health Factors</u></h4>
			Have you ever been diagnosed with the following conditions or are you taking any related meds?
		</div>
		
		<div class="w3-row-padding">
			<div class="w3-half">
				<label><b>Diabetes</b><br>
					Diabetes (elevated blood sugar)
				</label>
				<select class="w3-select" name="diabetes" required>
					<option value="" disabled selected>Choose your option</option>
					<option value="Yes">Yes</option>
					<option value="No">No</option>
					<option value="Don’t know">Don’t know</option>
				</select>	
			</div>
			
			<div class="w3-half">
				<label><b>Elevated Cholesterol</b><br>
					Elevated Cholesterol (more than 200 mg/dl or taking cholesterol lowering drugs)
				</label>
				<select class="w3-select" name="cholesterol" required>
					<option value="" disabled selected>Choose your option</option>
					<option value="Yes">Yes</option>
					<option value="No">No</option>
					<option value="Don’t know">Don’t know</option>
				</select>	
			</div>
		</div>
		
		<div class="w3-row-padding">
			<div class="w3-half">
				<label><b>Hypertension</b><br>
					Hypertension (elevated blood pressure or taking blood pressure lowering drugs):
				</label>
				<select class="w3-select" name="hypertension" required>
					<option value="" disabled selected>Choose your option</option>
					<option value="Yes">Yes</option>
					<option value="No">No</option>
					<option value="Don’t know">Don’t know</option>
				</select>	
			</div>
			
			<div class="w3-half">
				<label><b>Depression</b><br>
					Depression or taking anti-depressant drugs
				</label>
				<select class="w3-select" name="depression" required>
					<option value="" disabled selected>Choose your option</option>
					<option value="Yes">Yes</option>
					<option value="No">No</option>
					<option value="Don’t know">Don’t know</option>
				</select>	
			</div>
		</div>
		
		<div class="w3-row-padding">
			<div class="w3-half">
				<label><b>Heart disease</b><br>
					Coronary Heart disease
				</label>
				<select class="w3-select" name="heart" required>
					<option value="" disabled selected>Choose your option</option>
					<option value="Yes">Yes</option>
					<option value="No">No</option>
					<option value="Don’t know">Don’t know</option>
				</select>	
			</div>
			
			<div class="w3-half">
				<label><b>Cardiovascular</b><br>
					Cardiovascular disease or Stroke
				</label>
				<select class="w3-select" name="cardiovascular" required>
					<option value="" disabled selected>Choose your option</option>
					<option value="Yes">Yes</option>
					<option value="No">No</option>
					<option value="Don’t know">Don’t know</option>
				</select>	
			</div>
		</div>
		
		<div class="w3-row-padding">
			<div class="w3-half">
				<label><b>Renal dysfunction</b><br>
					Renal dysfunction (chronic kidney disease):
				</label>
				<select class="w3-select" name="renal_dysfunction" required>
					<option value="" disabled selected>Choose your option</option>
					<option value="Yes">Yes</option>
					<option value="No">No</option>
					<option value="Don’t know">Don’t know</option>
				</select>	
			</div>
			
			
			
		</div>
	
	<hr>
	
	<p class="w3-center">
		<button type="submit" class="w3-button w3-section w3-teal w3-ripple w3-center"> Submit </button>
	</p>
	
	</div>
</div>

</form>

</body>
</html> 