 <html>
<head>
    <title>Reset Account</title>
    <link rel="stylesheet" href="/style/css/bootstrap.min.css">
    <link rel="stylesheet" href="/style/css/securimage.css" media="screen">
    <link rel="stylesheet" href="/style/css/login.css" >
    <script src="/style/js/jquery-1.12.2.js"></script>
    <script src="/style/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
 <script type="text/javascript">
     
 </script>
    
    <style type="text/css">
    body {
    padding-top: 15px;
}
.panel-login {
    border-color: #ccc;
    -webkit-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
    -moz-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
    box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
}
.panel-login>.panel-heading {
    color: #00415d;
    background-color: #fff;
    border-color: #fff;
    text-align:center;
}
.panel-login>.panel-heading a{
    text-decoration: none;
    color: #666;
    font-weight: bold;
    font-size: 15px;
    -webkit-transition: all 0.1s linear;
    -moz-transition: all 0.1s linear;
    transition: all 0.1s linear;
}
.panel-login>.panel-heading a.active{
    color: #029f5b;
    font-size: 18px;
}
.panel-login>.panel-heading hr{
    margin-top: 10px;
    margin-bottom: 0px;
    clear: both;
    border: 0;
    height: 1px;
    background-image: -webkit-linear-gradient(left,rgba(0, 0, 0, 0),rgba(0, 0, 0, 0.15),rgba(0, 0, 0, 0));
    background-image: -moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
    background-image: -ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
    background-image: -o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
}
.panel-login input[type="text"],.panel-login input[type="email"],.panel-login input[type="password"] {
    height: 45px;
    border: 1px solid #ddd;
    font-size: 16px;
    -webkit-transition: all 0.1s linear;
    -moz-transition: all 0.1s linear;
    transition: all 0.1s linear;
}
.panel-login input:hover,
.panel-login input:focus {
    outline:none;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    border-color: #ccc;
}


.btnotp {
    background-color: #1CB94E;
    outline: none;
    color: #fff;
    font-size: 14px;
    height: auto;
    font-weight: normal;
    padding: 14px 0;
    text-transform: uppercase;
    border-color: #1CB94A;
}
.btnotp:hover,
.btnotp:focus {
    color: #fff;
    background-color: #1CA347;
    border-color: #1CA347;
}

</style>
   
</head>
<body style="background: url('/defaultimg/login-background.jpeg'); background-repeat: no-repeat;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;">

<div><a href="http://www.anujtestmodule.online/"><img src="/defaultimg/login-logo.png" class="img-responsive center-block" alt="BIET, Jhansi" style="margin-bottom: 10px;"></a></div>


<div class="container">                
  <div class="row">
      <div class="col-md-6 col-md-offset-3">
             <div class="panel panel-login">
                   
                    <div class="panel-heading">
                         <b> Enter your OTP Here </b>
                        <hr>
                    </div>
                    
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
              <?php
   session_start();
   $SubmitValue= $_POST['submit'];
   If($SubmitValue=="SEND OTP")
    {
    	include('connect.php');
          $emailidinput= mysqli_real_escape_string($conn,$_POST['email']);
          $rollno = $_SESSION["userRollNo"];
        
        $sql = "select * from studentlogin";
        $result = $conn->query($sql);
                  
          if ($result->num_rows > 0)
          {           // output data of each row
            while($row = $result->fetch_assoc())
              {  
              if ($row['rollno']==$rollno)
                  {
                      
                 $a=1;
                   $arrayword = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','0','1','2','3','4','5','6','7','8','9');
$mes = "";
for ($i=1; $i < 9 ; $i++) { 
   $otp = rand(0,61);
   $mes = $mes.$arrayword[$otp];
}


                 $otp = $mes;
                 $emailId = $emailidinput;
                // $emailId = $row['Email']; 
                  
                  $sqlupdt = "UPDATE `studentlogin` set `otp`='$otp' where `rollno`='$rollno'";
                  
                  $res = $conn->query($sqlupdt);
                  
                  $_SESSION["requesteduserid"] = $rollno;
                  $_SESSION["requesteduseremail"] =  $emailId;
                  
                  $to = $emailId;
                  $subject = "Regarding OTP";
                  $message = '<html><body>';
                  $message .= '<title>One Time Password </title>';
$message .= '<img src="http://anujtestmodule.online/defaultimg/header-biet-logo.png" alt="BIET JHANSI" />';
$message .= '<table rules="all" style="border-color: #666; width : 500px;" cellpadding="14">';
$message .= "<tr style='background: #eee;'><td colspan='2'><strong>This is automatic generated OTP </td></tr>";
$message .= "<tr><td><strong>Your OTP :</strong> </td><td style='letter-spacing: 1.25px; font-size: 24px; font-weight: bold;'>" . $otp . "</td></tr>";
$message .= "<tr><td colspan='2'><strong>Please Do not share this OTP to other</td></tr>";
$message .= "</table>";
$message .= "</br>©risinginnovators.com";
$message .= "</body></html>";
                  $header = "From:no-reply@risinginnovators.com \r\n";
                 // $header .= "Cc:adeupm@gmail.com \r\n";
                  $header .= "MIME-Version: 1.0\r\n";
                  $header .= "Content-type: text/html\r\n";
         
                  $retval = mail ($to,$subject,$message,$header);
         
                  if( $retval == true ) {
                 // echo "OTP has been sended to your mail ID kindly login with that OTP and change the temporary Password".$to;
                   }else {
                    session_destroy();
                    header("location:/index.php"); 
                  }


         break;           }     

                }
                if($a!=1)
                {  // echo "Could Not Complete Your request right Now"; 
                }
            }
                                       
    }
    
    if($a==1)
{
echo "<form method='post' action='firsetimevalidateotp.php'>";

echo "<div class='form-group col-lg-12'>";
echo "<input type='text' id='otpvalue' placeholder='Enter OTP Here' class='form-control col-lg-12' name='otpvalue' />";
echo "</div>";

echo "<div class='form-group col-lg-12'>";
echo "<input type='submit' id='submit' class='form-control col-lg-12' name='submit' value='CHECK OTP' />";
echo "</div>";

echo "</form>";
}

              ?>