
<?php
include('doc.php');

$rno = $_POST["rollno"];
$resultCat = $_POST["resultCat"];
$seme = $_POST["seme"];
$Acedemic = $_POST["Acedemic"];


$ch = curl_init();

// pass first
curl_setopt($ch, CURLOPT_URL, "http://bietjhs.ac.in/studentresultdisplay/frmprintreport.aspx");
curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/32.0.1700.107 Chrome/32.0.1700.107 Safari/537.36');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, "ctl00_ContentPlaceHolder1_ddlAcademicSession=2015-2016&ctl00_ContentPlaceHolder1_ddlSem=4&ctl00_ContentPlaceHolder1_ddlResultCategory=R&ctl00_ContentPlaceHolder1_txtRollno=1404313001&ctl00_ContentPlaceHolder1_cmdPrintTR=View");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIESESSION, true);
curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie-name');  //could be empty, but cause problems on some hosts
curl_setopt($ch, CURLOPT_COOKIEFILE, '/var/www/ip4.x/file/tmp');  //could be empty, but cause problems on some hosts
$res = curl_exec($ch);
if (curl_error($ch)) {
    echo curl_error($ch);
}


// calculating variable and its values
$stmt = "id=1";
$k = 0;
$name = array('a');
$value = array('a');
$id = array('a');

//converting to html
$html = str_get_html($res, true, true, DEFAULT_TARGET_CHARSET, false);

// input box values start

     foreach ($html->find('input') as $e) 
     {   //used a tag here, but use whatever you want
         $e->getAllAttributes();

      					  //testing that it worked
                            //  print_r($e->attr);  tested and working fine


           try {
             	if(isset($e->attr['value']) && isset($e->attr['name']))
             	 {
      	          $names = $e->attr['name'];
  			      $values = $e->attr['value'];
  			      $ids = $e->attr['id'];
  			      array_push($name, $names);
  			      array_push($value, $values);
  			      array_push($id, $ids);
   			     }
   			     else if (isset($e->attr['id']) && isset($e->attr['name'])) {
   			     	$names = $e->attr['name'];
  			     // $values = $e->attr['value']; we don't have values here
  			      $ids = $e->attr['id'];
  			      array_push($name, $names);
  			     // array_push($value, "1404313019");
  			      array_push($value, $rno);
  			      array_push($id, $ids);
   			     }
    	
  			  } catch (Exception $e) {}
    

	}
// input box values ends


// select box values start
     foreach ($html->find('select') as $e) 
     {   //used a tag here, but use whatever you want
         $e->getAllAttributes();
                            //testing that it worked
                            //  print_r($e->attr);  tested and working fine

           try {
             	if(isset($e->attr['id']) && isset($e->attr['name']))
             	 {
      	          $names = $e->attr['name'];
  			      $idx = $e->attr['id'];
  			      if($idx=='ctl00_ContentPlaceHolder1_ddlAcademicSession')
  			      {
                    array_push($name, $names);
  			      // array_push($value, "2015-2016");
  			        array_push($value, $Acedemic);
  			      }
  			      if($idx=='ctl00_ContentPlaceHolder1_ddlSem')
  			      {
                    array_push($name, $names);
  			     //array_push($value, "4");
  			       array_push($value, $seme);
  			      }
  			      if($idx=='ctl00_ContentPlaceHolder1_ddlResultCategory')
  			      {
                     array_push($name, $names);
  			    //  array_push($value, "R");
  			       array_push($value, $resultCat);
  			      }
                }
    	
  			  } catch (Exception $e) {}
    

	}
// select box values ends

// framing statement
  foreach ($value as $key => $x)
  {
    $stmt .= "&".$name[$key] ."=".$x;
  }


// second phase
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $stmt);
curl_setopt($ch, CURLOPT_RETURNTRANSFER , 1);  // RETURN THE CONTENTS OF THE CALL
$res = curl_exec($ch);

//echo $res;
curl_close($ch);


//converting to html
$html = str_get_html($res, true, true, DEFAULT_TARGET_CHARSET, false);


// now generating table

$table = $html->find('table table table table', 1);
$rowData = array();

foreach($table->find('tr') as $row) {
    // initialize array to store the cell data from each row
    $flight = array();
    foreach($row->find('td') as $cell) {
        // push the cell's text to the array
        $flight[] = $cell->plaintext;
    }
    $rowData[] = $flight;
}

$pos7aenterd = 0; $allow = 0;
$array5 = array(0); $array5temp = array();
$array7a = array(0); $array7atemp = array();
$array7b = array(0); $array7btemp = array();
$array0 = array(0); $array0temp = array();
//print_r($rowData);

foreach ($rowData as $key => $value) {
	$result = count($value); //echo "<br>".$result."<br>";
	$array5temp = array();
	$array0temp = array();
	$array7atemp = array();
	$array7btemp = array();
        if($result == 6)
       {       // lenght is 6
       	     foreach ($value as $a => $b)
       	      {   
                   array_push($array5temp, $b);   if($pos7aenterd == 1) { $allow = 1;}
		      } 
		      array_push($array5, $array5temp);
       }
       


      if($result == 1)
       {       // lenght is 1
       	     foreach ($value as $a => $b)
       	      {    
                   array_push($array0temp, $b);
		      } 
		       array_push($array0, $array0temp);
       }
      


       if($allow == 0 && $result == 8)
       {       
       	     foreach ($value as $a => $b)
       	      {      $pos7aenterd = 1;
                   array_push($array7atemp, $b);
		      } 
		       array_push($array7a, $array7atemp);
       }
      


       if($allow == 1 && $result == 8)
       {       
       	     foreach ($value as $a => $b)
       	      {   
                   array_push($array7btemp, $b);
		      } 
		      array_push($array7b, $array7btemp);
       }
       
}

//print_r($array7b); 
$oddtotal =0; $oddsessionaltotal =0;  $oddexamtotal =0; 
foreach ($array7b as $key => $value) {
	$oddtotal +=$value[6]; $oddexamtotal +=$value[5]; $oddsessionaltotal +=$value[4]; 
}
//echo $oddtotal."<br>".$oddexamtotal."<br>".$oddsessionaltotal;

//print_r($array7b); 
$oddtotal =0; $oddsessionaltotal =0;  $oddexamtotal =0; 
foreach ($array7b as $key => $value) {
	$oddtotal +=$value[6]; $oddexamtotal +=$value[5]; $oddsessionaltotal +=$value[4]; 
}
//echo $oddtotal."<br>".$oddexamtotal."<br>".$oddsessionaltotal;
$returnRoll = Array();

array_push($returnRoll, "UserID"); array_push($returnRoll, $array5[2][5]);
array_push($returnRoll, "UserName"); array_push($returnRoll, $array5[3][2]);
array_push($returnRoll, "semester"); array_push($returnRoll, $seme);

echo json_encode($returnRoll);
/*
echo '<table border="1">';
foreach ($rowData as $row => $tr) {
    echo '<tr>'; 
    foreach ($tr as $td)
        echo '<td>' . $td .'</td>';
    echo '</tr>';
}
echo '</table>';
*/
?>