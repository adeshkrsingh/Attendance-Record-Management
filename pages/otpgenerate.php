<html>
   
   <head>
      <title>Sending HTML email using PHP</title>
   </head>
   
   <body>
      <?php
         $to = "adevnsm@gmail.com";
         
         $subject = "Regarding OTP";
         
         $message = "<b>No-Reply Email</b>";
               
         
         $header = "From:no-reply@risinginnovators.com \r\n";
         $header .= "Cc:adeupm@gmail.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            echo "OTP has been sended to your mail ID kindly login with that OTP and change the temporary Password".$to;
         }else {
            echo "Message could not be sent... Please Contact with your ADMIN/HOD";
         }
      ?>
      
   </body>
</html>