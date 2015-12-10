<?php

	// initialize		
	ob_start();
	error_reporting(E_ALL);
	ini_set('display_errors', 'On');	
	require_once('../vendor/autoload.php');
	
	// run a request
	$headers = array('Accept' => 'application/json');
	$options = array('long' => '[-74.0064,-118.2430,-74.0064]','lat' => '[40.7142,34.0522,40.7142]');
	$request = Requests::post('https://public.opencpu.org/ocpu/github/openmhealth/dpu.mobility/R/geodistance/json', $headers, $options);		
	
	echo "Geodistance, status: " . $request->status_code . "<br>";
	print_r($request->body);
	echo "<br><br>";
	
	// run a request
	$headers = array('Accept' => 'application/json');
	$options = array('n' => '10', 'mean' => 5);
	$request = Requests::post('https://public.opencpu.org/ocpu/library/stats/R/rnorm/json', $headers, $options);		
	echo "Random normal, status: " . $request->status_code . "<br>";
	print_r($request->body);
	echo "<br><br>";
	
	// initialise the curl request
	// 	$request = curl_init('https://public.opencpu.org/ocpu/library/utils/R/read.csv/json');
	// 
	// 	// send a file
	// 	curl_setopt($request, CURLOPT_POST, true);
	// 	curl_setopt(
	// 		$request,
	// 		CURLOPT_POSTFIELDS,
	// 		array(
	// 		  'file' => '@/mydata.csv', 
	// 		  'header' => true
	// 		));
	// 
	// 	// output the response
	// 	curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
	// 	echo curl_exec($request);
	// 
	// 	// close the session
	// 	curl_close($request);

	// upload a file
	// curl https://public.opencpu.org/ocpu/library/utils/R/read.csv/json -F "file=@mydata.csv"
	$headers = array('Accept' => 'application/json');
	$options = array('file' => '@mydata.csv;type=text/plain', 'header' => true);
	$request = Requests::post('https://public.opencpu.org/ocpu/library/utils/R/read.csv/json', $headers, $options);		
	echo "File loaded, status: " . $request->status_code . "<br>";
	print_r($request->body); 
	echo "<br><br>";