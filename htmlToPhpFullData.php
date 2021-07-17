<?php 

require_once('tcpdf/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('BrainFIt');
$pdf->SetTitle('Survey Form');
$pdf->SetSubject('Survey Form');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_LEFT, PDF_MARGIN_RIGHT);

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// add a page
$pdf->AddPage();

	$content = '';
	
	$footer_image_file = 'logo/logo_pic.png';
	$timestamp = time();	 
	$content .= '
	<table style="width:100%;" border="none" cellspacing="0" cellpadding="5">
		<tr>
			<th><h3>Brain Health Survey Report</h3></th>
			<th rowspan="7"><div style="width:100% !important;height:100px;float:right;"><img style="text-align:right;float:right;width:1500%;" src="' . $footer_image_file . '" /></div></th>
		</tr>
		<tr>
			<td>Email:'.$post_result["email"].'</td>
		</tr>
		<tr>
			<td>Date: '.date("F d, Y h:i:s A", $timestamp).'</td>
		</tr>
		<tr>
			<td>Name: '.$post_result["name"].'</td>
		</tr>
		<tr>
			<td>Country: '.$post_result["country"].'</td>
		</tr>
	</table>
	<br><br>
	<h3 align="left"><u>Background Information</u></h3>
	<table border="1" cellspacing="0" cellpadding="5">
	<tr>
		<th width ="19%"><u>Risk factor</u></th>
		<th width ="16%"><u>Your Response:</u></th>
		<th width ="65%"><u>Explanation and References</u></th>
    </tr>

    <tr>
		<td>Age</td>
		<td style="color:red;">'.$post_result["age"].'</td>
		<td>Age is the strongest known risk factor for dementia. Whilst it is possible to develop the condition earlier, the chances of developing dementia rise significantly as we get older. Above the age of 65, a person’s risk of developing Alzheimer’s disease or vascular dementia doubles roughly every 5 years. It is estimated that dementia affects one in 14 people over 65 and one in six over 80. By age 85 years and older, between 25% and 50% of people will exhibit signs of Alzheimer\'s disease. [1]</td>
    </tr>

    <tr>
        <td>Sex</td>
        <td style="color:red;">'.$post_result["sex"].'</td>
        <td>Women are more impacted by Alzheimer’s disease than men – they are at significantly greater risk of developing Alzheimer’s disease, and recent research shows that they also appear to suffer a greater cognitive decline than men at the same age. Explanations have been linked to a variety of factors including differences in cognitive reserve, resilience, as well as genetics (Apolipoprotein e4) and functional and structural brain changes.[2]</td>
    </tr>

    <tr>
        <td>Education</td>
        <td style="color:red;">'.$post_result["education"].'</td>
        <td>Higher education levels provide some preventive benefit against Alzheimer’s and dementia. Scientists also believe that more years of education builds a “cognitive reserve” in the brain, which can enable a person to compensate better during the early stages of the disease. [3]
        In a quantitative analysis, the dementia risk was reduced by 7 % for per year increase in education.[4] This suggests a dose-response relation between education and dementia risk. However, we can still attain higher and further education as we age and learning and acquiring new skills are not limited to the young.
        </td>
    </tr>

    <tr>
        <td>Positive Family history</td>
        <td style="color:red;">'.$post_result["dementia_family_history"].'</td>
        <td>Family History of Alzheimer’s Having a parent, brother, or sister diagnosed with Alzheimer’s increases the risk of developing the disease.
        Early onset Alzheimer’s (before age 65) is highly correlated with family genetic factors, but is also extremely rare in the population. [5]
        </td>
    </tr>

    <tr>
        <td>APOE Gene Status</td>
        <td></td>
        <td>Research indicates that the APOE gene can have a modest effect on the chances of developing late onset Alzheimer’s (after age 65). There are three variants of this gene: E2, E3, E4. The E3 variant has no influence on Alzheimer’s risk, while the E2 variant seems to confer some protection against Alzheimer’s. The E4 variant appears to increase the risk of Alzheimer’s disease. [6]</td>
    </tr>

    </table>

    <br>
    <h4 align="left"><u>Lifestyle Factors</u></h4>
    <br>

    <table border="1" cellspacing="0" cellpadding="5">
	<tr>
		<th width ="19%"><u>Risk factor</u></th>
		<th width ="16%"><u>Your Response:</u></th>
		<th width ="65%"><u>Explanation and References</u></th>
    </tr>

    <tr>
		<td>Weight and Height</td>
		<td style="color:red;">BMI='.$post_result["BMI"].', '.$post_result["BMI_CAT"].'</td>
		<td>Several studies have suggested that overweight and obesity in mid-life are related to a greater risk of cognitive decline and subsequent dementia, although in older adults this has not always been observed. [7] However, both are associated with the metabolic syndrome, diabetes and cardiovascular disease and other conditions which increase the risk of dementia. 
        A recent study using data from more than 5,000 people has found that a higher percentage of belly fat (high waist to hip ratio) was associated with reduced cognitive function in Irish adults older than 60. [8]
        </td>
    </tr>

    <tr>
		<td>Diet and Nutrition</td>
		<td style="color:red;">'.$post_result["HEALTHY_DIET_CAT"].'</td>
		<td>A diet rich in fish, fresh vegetables, fruit, nuts, and light on saturated fats, processed sugar, and red meat is good for heart health and brain health.[9] Several studies show that adherence to a Mediterranean diet (low in meat and dairy products, high in fruits, vegetables, legumes, cereals, and fish) is associated with a lower risk of dementia, but this also has been shown for the DASH and MIND diets.[10]
        Researchers from Rush University in Chicago have combined elements from both the Mediterranean Diet and the Dietary Approaches to Stop Hypertension (DASH) diets to create the Mediterranean-DASH Intervention for Neurodegenerative Delay (MIND) Diet. [11]
        </td>
    </tr>

    <tr>
		<td>Alcohol consumption</td>
		<td style="color:red;">'.$post_result["ALCOHOL_CAT"].'</td>
		<td>The association of alcohol with cognitive outcomes appears to be J-shaped or U-shaped, with harmful effects of both abstinence and excessive alcohol consumption. [12]
        Moderate alcohol use (about 1 drink per day) is associated with a lower risk of ischemic stroke and dementia. A key point is the definition of “moderate” alcohol intake, which is between 10 grams and 20 grams of pure alcohol each day. A glass of wine contains about 12 grams of alcohol, as a reference point. [13]
        </td>
    </tr>

    <tr>
		<td>Smoking</td>
		<td style="color:red;">'.$post_result["smoking"].'</td>
		<td>Current and former (to a lesser degree) cigarette smoking is a risk factor for Alzheimer’s, cardiovascular disease and related dementias.[14] A recent meta-analysis of 34 follow-up studies showed that smokers show an increased risk of dementia, and smoking cessation decreases the risk to that of never smokers. The increased risk of AD from smoking is more pronounced in apolipoprotein E ε4 non-carriers. [15]</td>
    </tr>

    <tr>
		<td>Physical activity</td>
		<td style="color:red;">'.$post_result["PHYSICAL_ACTIVITY_CAT"].'</td>
		<td>Regular physical exercise improves memory, attention, and decision-making skills in both children and adults. Physical exercise also supports cardiovascular health, which is important for brain health. [16] Physical activity is one of the most feasible interventions that people can take as a preventative practice against dementia. Leisure time physical activity (eg, sports, exercises and  recreational activities) has been shown by numerous prospective studies to decrease the incidence of dementia and Alzheimer’s in a dose-response fashion.[17]</td>
    </tr>

    <tr>
		<td>Cognitive activity</td>
		<td style="color:red;">'.$post_result["COGNITIVE_ACTIVITY_SCORE"].'</td>
		<td>The brain grows new connections between neurons all the time, especially when we are learning something new or are exposed to a novel environment. Cognitive stimulation is good for a healthy brain.[18]
    In a large cohort of older adults who were free of dementia, researchers found that late-life participation in intellectual activities was associated with lower risk of dementia several years later. This association was not fully explained by other health lifestyle practices (regular physical exercise, adequate fruit and vegetable intake, and not smoking) nor by a wide range of physical health problems and limitations (cardiovascular risk factors, depression, sensory impairments, and poor mobility).[19]
    </td>
    </tr>

    <tr>
		<td>Sleep</td>
		<td style="color:red;">'.$post_result["SLEEP_CAT"].'</td>
		<td>Chronically restricted & disrupted sleep elevates stress hormones, which can lead to cardiovascular disease risk and stress related brain disorders. [20]
        New research findings have demonstrated that sleep is an important brain health factor at all ages. It appears that during sleep, particularly deep and REM sleep, the brain clears its waste products. It is suggested that poor sleep hygiene contributes to the accumulation of proteins that eventually can lead to dementia.  Also, many follow up studies have shown that sleep disturbances, including insomnia, sleep disordered breathing (snoring with irregular breathing) and nonspecific sleep problems, are associated with a higher risk of all-cause dementia and both AD and vascular dementia subtypes. [21]
        </td>
    </tr>
    
    </table>

    <br>
    <h4 align="left"><u>Health Factors</u></h4>
    <br>

    <table border="1" cellspacing="0" cellpadding="5">
	<tr>
		<th width ="19%"><u>Risk factor</u></th>
		<th width ="16%"><u>Your Response:</u></th>
		<th width ="65%"><u>Explanation and References</u></th>
    </tr>

    <tr>
		<td>Diabetes</td>
		<td style="color:red;">'.$post_result["diabetes"].'</td>
		<td>Elevated blood glucose readings are consistently linked to higher rates of Alzheimer’s & dementia.[22] However, it seems that among diabetics treatment and normalization of glucose levels reduce the risk of dementia.</td>
    </tr>

    <tr>
		<td>Elevated Cholesterol</td>
		<td style="color:red;">'.$post_result["cholesterol"].'</td>
		<td>High cholesterol levels in midlife are associated with an increased risk of Alzheimer’s & dementia.[23]
        Prospective studies have found an association of lipid-lowering drugs, and in particular statins, with decreased risk for mild cognitive impairment (MCI) and dementia.[24]</td>
     </tr>

     <tr>
		<td>Hypertension</td>
		<td style="color:red;">'.$post_result["hypertension"].'</td>
		<td>High blood pressure in midlife is associated with an increased risk of Alzheimer’s & dementia.[25]
        For years, we thought 140/70 or 140/80 was normal blood pressure. However, new guidelines, even in the cardiovascular literature, are showing that lower may be better. Tighter control of optimal blood pressure in the 120s may not only improve cognitive decline and progression towards dementia, but also reduce brain white matter lesions. This has been recently confirmed by SPRINT MIND trial, which may be the strongest evidence to date that it really is possible to delay or possibly prevent the onset of mild cognitive impairment and dementia.[26]
        </td>
     </tr>

     <tr>
		<td>Depression or use of anti-depressant</td>
		<td style="color:red;">'.$post_result["depression"].'</td>
		<td>Social isolation and depression can negatively affect brain health.[27]
		Studies show that any depressive symptoms increase the risk of cognitive decline and dementia.  This is probably because patients with depression are inclined to do less physical activity, cognitive activity and have less purpose in life, which are all correlated with AD risk.[28] The role of pharmacological and nonpharmacological antidepressant strategies in preventing dementia onset is still not clear.
     </td>
  </tr>

  <tr>
     <td>Coronary Heart disease</td>
     <td style="color:red;">'.$post_result["heart"].'</td>
     <td>Cardiometabolic diseases such as hypertension, coronary artery disease (CAD) and diabetes have been shown to associate with impaired cognitive function in many cross-sectional studies. Impaired cardiovascular function may cause cognitive decline by inhibiting cerebral blood flow, possibly leading to hypoperfusion and the amyloid beta plaques that characterize Alzheimer’s disease (AD).[29] This may explain the association between atrial fibrillation, coronary artery disease, heart failure and other cardiac diseases and dementia. </td>
  </tr>

  <tr>
     <td>Cardiovascular disease or Stroke</td>
     <td style="color:red;">'.$post_result["cardiovascular"].'</td>
     <td>Cardiovascular disease increases the risk of stroke, Alzheimer’s & dementia.[30] Several lines of evidence suggest that improved control of cardiovascular risk factors is a substantial contributor to declines in dementia rates.[31]</td>
  </tr>

  <tr>
     <td>Renal dysfunction</td>
     <td style="color:red;">'.$post_result["renal_dysfunction"].'</td>
     <td>Chronic kidney disease (CKD) has evolved as a possible new determinant of cognitive decline and dementia.[32]</td>
  </tr>

    

     </table>
     <br>
     <h4><u>Summary</u></h4>
     <br>
     <h4 style="margin:0px;"><u>Background Information</u></h4>
     <p style="margin:0px;"><u>Age:</u> <font color="red">'.$post_result["age"].' </font>years</p>
     <p style="margin:0px;"><u>Sex:</u> <font color="red">'.$post_result["sex"].'</font></p>
     <p style="margin:0px;"><u>Education:</u> <font color="red">'.$post_result["education"].' </font></p>
     <p style="margin:0px;"><u>Family history of early dementia1 or genetic predisposition:</u> <font color="red">'.$post_result["dementia_family_history"].'</font></p>
     <br>
     <h4><u>Lifestyle Factors</u></h4>
     <p style="margin:0px;"><u>BMI</u>=<font color="red">'.$post_result["BMI"].', '.$post_result["BMI_CAT"].'</font></p>
     <p style="margin:0px;"><u>Healthy Diet:</u> <font color="red">'.$post_result["HEALTHY_DIET_CAT"].'</font></p>
     <p style="margin:0px;"><u>Alcohol:</u> <font color="red">'.$post_result["ALCOHOL_CAT"].'</font></p>
     <p style="margin:0px;"><u>Smoking:</u> <font color="red">'.$post_result["smoking"].'</font></p>
     <p style="margin:0px;"><u>Physical activity:</u> <font color="red">'.$post_result["PHYSICAL_ACTIVITY_CAT"].'</font></p>
     <p style="margin:0px;"><u>Cognitive activity:</u>: <font color="red">'.$post_result["COGNITIVE_ACTIVITY_SCORE"].'</font></p>
     <p style="margin:0px;"><u>Sleep:</u> <font color="red">'.$post_result["SLEEP_CAT"].'</font></p>
     <br>';
     
	 if($post_result["diabetes"] == 'Yes' || $post_result["cholesterol"] == 'Yes' || $post_result["hypertension"] == 'Yes' || $post_result["depression"] == 'Yes' || $post_result["heart"] == 'Yes' || $post_result["cardiovascular"] == 'Yes' || $post_result["renal_dysfunction"] == 'Yes') {
		 $content .='<h4><u>Health Factors</u></h4><ul style="margin:0px;">';
	 }
	 
	 if($post_result["diabetes"] == 'Yes') {
		$content .='<li>Diabetes (elevated blood sugar).</li>';
		
	 }
	// else {
	//	$content .='<li>Diabetes  <font color="red">No</font></li>';	
	// }

	if($post_result["cholesterol"] == 'Yes') {
		$content .='<li>Elevated Cholesterol (more than 200 mg/dl or taking cholesterol lowering drugs).</li>';
	 }
	// else {
	//	$content .='<li>Elevated Cholesterol  <font color="red">No</font></li>';	
	// }

	if($post_result["hypertension"] == 'Yes') {
		$content .='<li>Hypertension (elevated blood pressure or taking blood pressure lowering drugs).</li>';
	 }
	// else {
	//	$content .='<li>Hypertension  <font color="red">No</font></li>';	
	// }
	 
	if($post_result["depression"] == 'Yes') {
		$content .='<li>Depression or taking anti-depressant drugs.</li>';
	 }
	// else {
	//	$content .='<li>Depression  <font color="red">No</font></li>';	
	// }
	
	if($post_result["heart"] == 'Yes') {
		$content .='<li>Coronary Heart disease.</li>';
	 }
	//else {
	//	$content .='<li>Coronary Heart disease  <font color="red">No</font></li>';	
	// } 
	
	if($post_result["cardiovascular"] == 'Yes') {
		$content .='<li>Cardiovascular disease or Stroke.</li>';
	 }
	// else {
	//	$content .='<li>Cardiovascular disease or Stroke  <font color="red">No</font></li>';	
	// }
	
	if($post_result["renal_dysfunction"] == 'Yes') {
		$content .='<li>Renal dysfunction (chronic kidney disease).</li>';
	 }
	// else {
	//	$content .='<li>Renal dysfunction  <font color="red">No</font></li>';	
	// }
	
	if($post_result["diabetes"] == 'Yes' || $post_result["cholesterol"] == 'Yes' || $post_result["hypertension"] == 'Yes' || $post_result["depression"] == 'Yes' || $post_result["heart"] == 'Yes' || $post_result["cardiovascular"] == 'Yes' || $post_result["renal_dysfunction"] == 'Yes') {
		$content .='</ul>';
	 }

     $content .='<p><u>Disclaimer:</u> The information provided in the survey report is designed to provide general, helpful
		information on the subjects discussed. It is not meant to be used, nor should it be used, to diagnose or
		treat any medical condition (including brain disorders like Alzheimer’s disease, dementia, or mild cognitive
		impairment). For all that purpose, consult your own physician. The author, publisher and the company are
		not responsible for any specific health needs that may require medical supervision and are not liable for
		any damage or negative consequences from any treatment, action, application or preparation, to any
		person reading or following the information in this report. References are provided for informational
		purposes only and do not constitute any endorsement.
     </p>

     <h3>References</h3>
     <p style="margin:0px;font-size:small;text-align:left;">[1]. Alzheimer’s Society. Risk Factors for Dementia, Factsheet 450LP April 2016. https://www.alzheimers.org.uk/sites/default/files/pdf/factsheet_risk_factors_for_dementia.pdf<br>
[2]. Laws KR, et al. Sex differences in Alzheimer’s disease. Curr Opin Psychiatry 2018; 31:133–139.<br>
[3]. Stern Y. Cognitive reserve in ageing and Alzheimer’s disease. Lancet Neurol 2012;11(11):1006–12.<br>
[4]. Wei Xu et al. Education and Risk of Dementia: Dose-Response Meta-Analysis of Prospective Cohort Studies. Mol Neurobiol 2016; 53:3113–3123<br>[5]. NIH National Institute on Aging. What Causes Alzheimer\'s Disease? National Institutes of Health, May 2017. https://www.nia.nih.gov/health/what-causes-alzheimers-disease<br>
[6]. NIH National Institute on Aging. Alzheimer\'s Disease Genetics Fact Sheet. National Institutes of Health, October 2015. https://www.nia.nih.gov/health/alzheimers-disease-genetics-fact-sheet#genetics<br>
[7]. Pedditizi E et al. The risk of overweight/obesity in mid-life and late life for the development of dementia: a systematic review and meta-analysis of longitudinal studies. Age and Ageing 2016; 45:14–21<br>
[8]. Ntlholang O, et al. The relationship between adiposity and cognitive function in a large community-dwelling population: Data from the Trinity Ulster Department of Agriculture (TUDA) ageing cohort study. British Journal of Nutrition 2018; 120(5):517-527.<br>[9]. Solfrizzi V, Panza F, Frisardi V, Seripa D, et al. Diet and Alzheimer\'s Disease Risk Factors or Prevention: The Current Evidence. Expert Rev Neurother 2011 May;11(5):677-708.Review<br>[10]. Greenwood CE, Parrott MD. Nutrition as a component of dementia risk reduction strategies. Healthcare Management Forum 2017; 30(1): 40–45.<br>
[11]. https://www.alzheimers.net/4-8-15-mind-diet-alzheimers-prevention/<br>
[12]. Sabia S, et al. Alcohol consumption and risk of dementia: 23 year follow-up of Whitehall II cohort study. BMJ 2018; 362 :k2927<br>
[13]. Ruitenberg A, van Swieten JC, Witteman JC, Mehta KM, van Duijn CM, HofmanA et al. Alcohol consumption and risk of dementia: the Rotterdam Study. Lancet 2002; 359(9303):281-286.<br>
[14]. Cataldo JK, Prochaska JJ, Glantz SA. Cigarette smoking is a risk factor for Alzheimer\'s Disease: an analysis controlling for tobacco industry affiliation. J Alzheimers Dis 2010; 19(2):465-80.<br>
[15]. Zhong G et al. Smoking Is Associated with an Increased Risk of Dementia: A Meta-Analysis of Prospective Cohort Studies with Investigation of Potential Effect Modifiers. PLoS ONE 2015; 10 (3): e0118333.<br>
[16]. Larson EB, Wang L, Bowen JD, McCormick WC, et al. Exercise is associated with reduced risk for incident dementia among persons 65 years of age and older. Ann Intern Med 2006;144(2):73–81.<br>
[17]. Xu W, Wang HF, Wan Y, et al. Leisure time physical activity and dementia risk: a dose response meta-analysis of prospective studies. BMJ Open 2017; 7<br>
[18]. Hall CB, Lipton RB, Sliwinski M, Katz MJ, Derby CA, Verghese J. Cognitive activities delay onset of memory decline in persons who develop dementia. Neurology 2009;73:356–61.<br>
[19]. Lee ATC, Richards M, Chan WC, Chiu HFK, Lee RSY, Lam LCW. Association of Daily Intellectual Activities With Lower Risk of Incident Dementia Among Older Chinese Adults. JAMA Psychiatry 2018;  75(7):697–703.<br>
[20]. Meerlo P, Sgoifo A, Suchecki D. Restricted and disrupted sleep: effects on autonomic function, neuroendocrine stress systems and stress responsivity. Sleep Med Rev. 2008 Jun;12(3):197-210<br>
[21]. Le Shi et al. Sleep disturbances increase the risk of dementia: A systematic review and meta-analysis. Sleep Medicine Reviews 2018; 40: 4-16.<br>
[22]. Ohara T, Doi Y, Ninomiya T, Hirakawa Y, Hata J, Iwaki T, et al. Glucose tolerance status and risk of dementia in the community: The Hisayama Study. Neurology 2011(77):1126–34.<br>
[23]. Solomon A, Kivipelto M, Wolozin B, Zhou, J, Whitmer, RA. Midlife serum cholesterol and increased risk of Alzheimer’s and vascular dementia three decades later. Dement and GeriatrDisord 2009;28:75–80.<br>
[24]. Song Y, Nie H, Xu Y, et al. Association of statin use with risk of dementia: a meta-analysis of prospective cohort studies. Geriatr Gerontol Int 2013; 13: 817–824.<br>
[25]. Launer LJ, Ross GW, Petrovitch H, Masaki K, Foley D, White LR, et al. Midlife blood pressure and dementia: The Honolulu-Asia Aging Study. Neurobiol Aging 2000;21(1):49–55.<br>[26]. Kjeldsen SE, Narkiewicz K, Burnier M, Oparil S. Intensive blood pressure lowering prevents mild cognitive impairment and possible dementia and slows development of white matter lesions in brain: the SPRINT Memory and Cognition IN Decreased Hypertension (SPRINT MIND) study. Blood Press 2018; 27:247-248.<br>
[27]. Wang HX, Karp A, Winblad B, Fratiglioni L. Late-life engagement in social and leisure activities is associated with a decreased risk of dementia. Am J Epidemiol 2002;155(12):1081–7.<br>
[28]. Boyle PA, Buchman AS, Barnes LL, et al. Effect of a purpose in life on risk of incident Alzheimer disease and mild cognitive impairment in community dwelling older persons. Arch Gen Psychiatry 2010; 67:304–10.<br>
[29]. Lyall DM, et al. Associations between single and multiple cardiometabolic diseases and cognitive abilities in 474 129 UK Biobank participants. Eur Heart J 2017; 38:577–583.<br>
[30]. Samieri C et al. Association of cardiovascular health level in older age with cognitive decline and incident dementia. JAMA 2018 Aug 21; 320:657.<br>
[31]. Saver JL et al. Striving for Ideal Cardiovascular and Brain Health It Is Never Too Early or Too Late. JAMA 2018 August 21; 320:645.<br>
[32]. Etgen T. Kidney disease as a determinant of cognitive decline and dementia. Alzheimers Res Ther 2015; 7(1): 29.<br>
        

    ';
    //$content .= fetch_data();
   

$pdf->writeHTML($content, true, false, true, true);

//$pdf->writeHTMLCell(21, '', 0, 29.7 - 4, $footer_logo_html, 0, 1, false, true, 'L', false);

$pdf->lastPage();

$form_name = round(microtime(true) * 1000);;
$pdf->Output(__DIR__ . '/forms/'.$form_name.'.pdf', 'F');

//$pdf->Output('example_002.pdf', 'I');

//REPORT MAIL//OUTPUT 6//MAIL 1
	//ATTRIBUTES
	//$f = "sivan2902@gmail.com";
	//$f_1="Email from the Brain Health Survey Report";
	//$t='user mail';
	//
	////HEADERS
	//$headers = "From: registration@explainit.online\r\n";
	//$headers .= "Reply-To:registration@explainit.online\r\n";
	//$headers .= "MIME-Version: 1.0\r\n";
	//$headers .= "Content-Type: text/html; charset=utf-8\r\n";
	//
	////MESSAGE
	//$message = '<html lang="iw" dir="rtl"><body>';
	//$message .= '<div style="width:100%;margin:auto;text-align:center;">';
	//$message .= '<h4>מייל:</h4>';
	//$message .= '<h4>'.$t.'</h4>';
	//$message .= '<h4>IP:</h4>';
	//$message .= '<h4></h4>';
	//$message .= "</div>";
	//$message .= "</body></html>";
	//
	////SENDING
	//mail($f,$f_1,$message,$headers);
	
	//another function
	function mail_attachment($filename, $path, $mailto, $from_mail, $from_name, $replyto, $subject, $message) {	
		$file = $path.$filename;
		$content = file_get_contents( $file);
		$content = chunk_split(base64_encode($content));
		$uid = md5(uniqid(time()));
		$name = basename($file);
		
		// header
		$header = "From: ".$from_name." <".$from_mail.">\r\n";
		$header .= "Reply-To: ".$replyto."\r\n";
		$header .= "MIME-Version: 1.0\r\n";
		$header .= "Bcc: sivan2902@gmail.com, fiveminutes001@gmail.com, dany@prosherman.com\r\n";
		$header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
		
		// message & attachment
		$nmessage = "--".$uid."\r\n";
		$nmessage .= "Content-type:text/html; charset=iso-8859-1\r\n";
		$nmessage .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
		$nmessage .= $message."\r\n\r\n";
		$nmessage .= "--".$uid."\r\n";
		$nmessage .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n";
		$nmessage .= "Content-Transfer-Encoding: base64\r\n";
		$nmessage .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
		$nmessage .= $content."\r\n\r\n";
		$nmessage .= "--".$uid."--";
		
		if (mail($mailto, $subject, $nmessage, $header)) {
			return true; // Or do something here
		} else {
		return false;
		}
	}
	
	$filename = $form_name.'.pdf';
	$path = __DIR__ . '/forms/';
	$mailto = $post_result["email"];
	$from_mail = 'registration@explainit.online';
	$from_name = 'survey form ';
	$replyto = 'registration@explainit.online'; 
	$subject = 'Survey Form'; 
	
	$message = '<html>
		<head></head>
		<body style="text-align:left;direction:ltr;padding:10px;font-family:Calibri;font-size:medium;">
		
		<p>Dear '.$post_result["name"].',<br>Thank you for completing our Brain Health survey. 
		Please find attached your survey report in PDF format. We hope you will find the information in the report
		useful and that you are willing to commit to your brain health and to maintain, or even improve, your quality
		of life as you age.
		
		<br>The first thing we say to all our participants who complete this survey is… don’t worry, you can always aim for
		a better brain!
		
		<br>
		
		If you would like to find out more about ways in which you may be able to improve your cognitive health,
		please visit our website at www.brainfitresorts.com
		We can assure you that by addressing your lifestyle choices and some medical problems if they exist, you can
		significantly reduce your risks for cognitive decline and dementia.
		We are here to help you take this road toward a brain-healthier lifestyle, as this is not a straight, short path for
		most people. Recognising that it is not “one-size-fits-all” and that lifestyle and habit changes require a
		customized psychological strategy, we created an online platform to support you along the way.
		Our BrainFit Online platform offers:
		
		<br>
		
		<ul><li> The Brain Risk Assessment (BRA): A detailed survey tool with more than 200 questions (ten domain
		questionnaires), covering all medical and lifestyle factors which can affect your brain health. This detailed
		evidence-based assessment allows scoring and better targeting of specific activities and behaviors, which are
		either brain-unhealthy or -protective.
		</li><li> The Personal Brain-Health Plan (PHP): Following a scheduled conference call with our experts a
		roadmap for the desired changes (i.e., short- and long-term personal goals) in lifestyle will be
		formulated.
		</li><li> The Coach Plan (COACH): A subscription plan which offers continuous coaching and monitoring of
		lifestyle behaviors, targeted education and practices towards brain-healthier living.  
		To learn more about our platform follow the link below:
		</li></ul>
		
		https://meetme.so/BrainfitresortsbookingMASTER 
		
		<br>
		<br>
		
		Sincerely,
		
		<br>
		
		The BrainFit Resorts Team</p>
		
		<br>
		
		<img style="width:250px;" src="http://form.explainit.online/logo/logo_pic.png" alt="BrainFit logo"/>
		
		<table style="border:none;border-collapse:collapse;">
		<tr style="border:none;"><td style="border:none;">Email:</td><td style="border:none;">web@brainfitresorts.com</td></tr>
		<tr style="border:none;"><td style="border:none;">Address:</td><td style="border:none;">114 Lavender Street</tr>
		<tr style="border:none;"><td style="border:none;"></td><td style="border:none;">#09-88 CT Hub 2</td></tr>
		<tr style="border:none;"><td style="border:none;"></td><td style="border:none;">Singapore 338729</td></tr>
		<tr style="border:none;"><td style="border:none;">Website:</td><td style="border:none;">https://www.brainfitresorts.com</td></tr>
		</table></body></html>';
	
	mail_attachment($filename, $path, $mailto, $from_mail, $from_name, $replyto, $subject, $message);
	
	//use PHPMailer\PHPMailer\PHPMailer;
	//use PHPMailer\PHPMailer\Exception;
	//
	//require 'PHPMailer/src/Exception.php';
	//require 'PHPMailer/src/PHPMailer.php';
	//
	//$bodytext = 'message';
	//
	//$email = new PHPMailer();
	//$email->SetFrom('registration@explainit.online', 'Survey Form'); //Name is optional
	//$email->Subject   = 'Message Subject';
	//$email->Body      = $bodytext;
	//$email->AddAddress( 'sivan2902@gmail.com' );
	//
	//$file_to_attach = __DIR__ . '/forms/';
	//
	//$email->AddAttachment( 'form.pdf' , 'form.pdf' );
	//
	//$email->Send();
	
	


