<?php	
	 
        //sleep(2);  
        require_once dirname(__FILE__) . '/securimage.php';
        $securimage = new Securimage();
        $captcha=$_REQUEST["q"];
        if($securimage->check($captcha)==false)
            echo "false";
        else
            echo "true";		

?>
