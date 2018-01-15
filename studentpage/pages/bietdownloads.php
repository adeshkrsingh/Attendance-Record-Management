<?php
include('doc.php');


$html = file_get_html('http://bietjhs.ac.in/');


// modify links
 $e = $html->find("a");
foreach ($e as $e_element)
   {
        $old_content = $e_element->outertext;
        $old_href = $e_element->href;
        $e_element->href = "http://www.bietjhs.ac.in/".$old_href;
        $e_element->target .= "_self";
   }


// marque    
foreach($html->find('marquee') as $m)
  { 
  $m->scrollamount ="0";
  	$m->direction = "down";
  	$m->behavior = "slide";
  }



  // Find all images 
foreach($html->find('img') as $element) 
   {
     $loc =  $element->src ;
     $element->src = "http://www.bietjhs.ac.in/".$loc;
   }


// downloads echo
foreach($html->find('div#download') as $e)
  { 
  	$e->overflow="scroll";
   echo $e->innertext  . '<br>'; 
  }


?>