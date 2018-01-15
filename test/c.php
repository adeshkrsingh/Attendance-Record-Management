<?php
ob_start();
//setcookie(name,value,expire,path,domain,secure,httponly);
setcookie("ASP.NET_SessionId","2rd13245qbdsoq553zemghbv","0","/","bietjhs.ac.in");
setcookie("adesh","Singh", "1", "/", "www.google.com");
$date_of_expiry = time() + 60 ;
setcookie( "userlogin", "anonymous", "0", "/", "example.com" );
include('doc.php');
$ContentPlaceHolder1 ="$$"."ContentPlaceHolder1";
$ddlAcademicSession = "$$"."ddlAcademicSession";
$ddlSem = "$$"."ddlSem";
$ddlResultCategory = "$$"."ddlResultCategory";
$txtRollno = "$$"."txtRollno";
$cmdPrintTR = "$$". "cmdPrintTR";

$d = array("'ctl00$ContentPlaceHolder1$ddlAcademicSession'"=>"2015-2016", "'ctl00$ContentPlaceHolder1$ddlSem'"=>"4", "'ctl00$ContentPlaceHolder1$ddlResultCategory'"=>"R", "'ctl00$ContentPlaceHolder1$txtRollno'"=>"1404313006", "__EVENTTARGET"=>"", "__EVENTARGUMENT"=>"", "__LASTFOCUS"=>"", "__VIEWSTATE"=>"/wEPDwULLTE2OTY3Nzk3NjMPZBYCZg9kFgICAw9kFgICAQ9kFgICAw8QDxYGHg1EYXRhVGV4dEZpZWxkBQdzZXNzaW9uHg5EYXRhVmFsdWVGaWVsZAUHc2Vzc2lvbh4LXyFEYXRhQm91bmRnZBAVBQotLVNlbGVjdC0tCTIwMTUtMjAxNgkyMDEyLTIwMTMJMjAxNC0yMDE1CTIwMTMtMjAxNBUFAi0xCTIwMTUtMjAxNgkyMDEyLTIwMTMJMjAxNC0yMDE1CTIwMTMtMjAxNBQrAwVnZ2dnZ2RkZCBotysC+OhPw+JSUfFqcJZsYP5t", "__VIEWSTATEGENERATOR"=> "35B42C9E", "__EVENTVALIDATION"=>"/wEWGAK3gaDfDQKK8qjeDAKJnc4zAtuZv94DAsaZ0x4C2Jn7ngEC2ZmX3gIC4KXA8wcCzYfl6Q4CzIfl6Q4Cz4fl6Q4Czofl6Q4CyYfl6Q4CyIfl6Q4Cy4fl6Q4C2ofl6Q4CzOOrpgMCrYyByA8CooyByA8CkYyByA8Cl4yByA8CoYyByA8C6pzC2QwCyuud6ARMVVISv8SuzF22xb4sLTdUdrAwiA==", "ddlAcademicSession"=>"2015-2016", "ddlSem"=>"4", "ddlResultCategory"=>"R", "ddlRollno"=>"1404313006", "ctl00_ContentPlaceHolder1_accedmicsession" => "2015-2016", "ctl00_ContentPlaceHolder1_rollno"=>"1404313006", "ctl00_ContentPlaceHolder1_oSem"=>"4", "ctl00_ContentPlaceHolder1_rType"=>"Regular" , "accedmicsession" => "2015-2016", "rollno"=>"1404313006", "oSem"=>"4", "rType"=>"R" , "ctl00$ContentPlaceHolder1$cmdPrintTR" => "View");
$STRING = http_build_query($d);
// create a new cURL resource
$ch = curl_init();

// set URL and other appropriate options    
//curl_setopt($ch, CURLOPT_URL, "http://risinginnovators.com/anujtestmodule.online/index.php/");
curl_setopt($ch, CURLOPT_URL, "http://bietjhs.ac.in/studentresultdisplay/frmprintreport.aspx/");
curl_setopt($ch, CURLOPT_POSTFIELDS, $STRING);
curl_setopt($ch, CURLOPT_URL, "http://bietjhs.ac.in/studentresultdisplay/FrmResult_even.aspx/");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $STRING);

curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// grab URL and pass it to the browser
$res = curl_exec($ch);

$html = str_get_html($res);
//echo $html->find('div div div', 0)->innertext . '<br>';

echo "--------------------------------------------</br>------------------------------------------";
foreach($html->find('img') as $e)
    echo $e->outertext . '<br>';
echo $res;
// close cURL resource, and free up system resources
curl_close($ch);
?>