<?php
	session_start();
	
	require_once dirname(__FILE__) . '/securimage.php';

	$img = new Securimage();
	$img->show();

	  // outputs the image and content headers to the browser

	$_SESSION['cid']=getCaptchaId();


	//echo "Session variable is set";
	header("location:indexcaptchaverify.php");

	//$img->show();

?>
