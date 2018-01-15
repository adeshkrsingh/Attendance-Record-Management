<!doctype html>
<html>
<head>
    <title>Staff / Student Login</title>
    <link rel="stylesheet" href="style/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/css/securimage.css" media="screen">
    <link rel="stylesheet" href="style/css/login.css" >
    <script src="style/js/jquery-1.12.2.js"></script>
    <script src="style/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">

       
       <script type="text/javascript">
    $(document).ready(function(){

    $("#department").prop('disabled', 'disabled');
    $("#submit1").click(function(){
        var name = $('#Userid1').val();
         var sub = $('#submit1').val();
       $.ajax({
          url: "pages/usersearch.php",
          type:"POST", 
          data : { userid : name ,  submit : sub,  },
          
          success: function(result){
          $("#show").html(result);
        }});
    });
    
    $( "#typeoflogin" ).change(function() {
      if(this.value == 'admin') { $("#department").prop('disabled', 'disabled'); }
      else { $("#department").prop('disabled', false); }
                                           });
});
  </script>

    <script type="text/javascript">
        $(function() {

    $('#staff-form-link').click(function(e) { 
        $("#myForm").show();
        $("#student-form").hide();
        $("#login-form").delay(100).fadeIn(100);
        $("#student-form").fadeOut(100);
        $('#student-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
        
    });
    $('#student-form-link').click(function(e) { 
        $("#myForm").hide();
        $("#student-form").show();
        $("#student-form").delay(100).fadeIn(100);
        $("#login-form").fadeOut(100);
        $('#staff-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
         
       
    });

});
    </script>
    
    
    <script>
    function refreshCaptcha()
    {
      document.getElementById('captcha_image2').src = 'captcha/indexcaptchagenerate.php?' + Math.random();
    }
    function validateForm() 
    {
        x=document.forms["myForm"]["userid"].value;
        if(x=="")
        {
            alert("Enter username");
            return false;
        }
      
        var x=document.forms["myForm"]["password"].value;
        if(x=="")
        {
            alert("Password is required");
            return false;
        }
        if(document.forms["myForm"]["department"].value=='none'&&document.forms["myForm"]["typeoflogin"].value!='admin')
        {
            alert("Select your department");
            return false;
        }
        checkCaptcha();
    }
    function showpassword()
    {
        var x=document.getElementById('password');
        x.setAttribute('type','text');
    }
    function hidepassword()
    {
        var x=document.getElementById('password');
        x.setAttribute('type','password');  
    }
    function checkCaptcha() 
    {
        var str=document.forms["myForm"]["captcha_code"].value;
        var x="abc";
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
            {
                x = xmlhttp.responseText;
                //alert(x);
                if(x=="false")
                {
                    alert("Incorrect Captcha");
                    refreshCaptcha();
                    document.forms["myForm"]["captcha_code"].value="";
                    document.forms["myForm"]["password"].value="";;
                }
                else
                {
                    document.forms["myForm"].action="pages/test.php";
                    document.forms["myForm"].submit();
                }
            }
        };
        xmlhttp.open("GET", "captcha/indexcaptchaverify.php?q=" + str, true);
        xmlhttp.send();
    }
   
    </script>
 
</head>
<body style="background: url('defaultimg/login-background.jpeg') no-repeat center center fixed;
-webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;

" onload="myFunctionDisabled(); refreshCaptcha(); document.getElementById('captcha_code').value=0;">
<div><a href="http://www.bietjhs.ac.in"><img src="defaultimg/login-logo.png" class="img-responsive center-block" alt="BIET, Jhansi" style="margin-bottom: 10px;"></a></div>
<div class="container">                
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="#" class="active" id="staff-form-link">Staff</a>
                            </div>
                            <div class="col-xs-6">
                                <a href="#" id="student-form-link">Student</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
<div class="col-lg-12">
        <form method="post" id="myForm" role="form"  action="" name="myForm" id="myForm" onsubmit="event.preventDefault(); validateForm();" style="display: block;" >

        <div class="form-group">
                <input type="text" id="userid"  tabindex="1" class="form-control" name="userid" autofocus required placeholder="UserId">
            </div>
            <div class="form-group">
                <input type="password" tabindex="2" id="password" placeholder="Password" class="form-control" aria-describedby="basic-addon1" name="password">                    
            </div>
            <div class="form-group col-sm-6" style="padding-left:0px;">
                <select name="typeoflogin" id="typeoflogin" class="form-control" tabindex="3"  style="height: 45px; border: 1px solid #ddd; font-size: 16px;
                    -webkit-transition: all 0.1s linear;
                    -moz-transition: all 0.1s linear;
                    transition: all 0.1s linear ">
                        <option value="admin">Admin</option>
                        <option value="hod">HOD</option>
                        <option value="faculty">Faculty</option>
                 </select>
            </div>
            <div class="form-group col-sm-6" style="padding-left:0px;">
                <select name="department" tabindex="4" class="custom-select form-control" id="department" style=" height: 45px; border: 1px solid #ddd; font-size: 16px;
                    -webkit-transition: all 0.1s linear;
                    -moz-transition: all 0.1s linear;
                    transition: all 0.1s linear ">
                                       <option value="none">--Select--</option>
                                      <option value="it">Information Technology (IT)</option>
                                      <option value="ce">Civil Engineering (CE)</option>
                                      <option value="cs">Computer Science and Engineering(CSE)</option>
                                      <option value="me">Mechanical Engineering (ME)</option>
                                      <option value="ch">Chemical Engineering (CH)</option>
                                      <option value="ec">Electronics and Communication Engineering (EC)</option>
                                      <option value="ee">Electrical Engineering (EE)</option>
                </select>
            </div>

            <div class="form-group col-sm-6 col-md-6" style="" >
                <img style="float: left; " id="captcha_image2" src="captcha/indexcaptchagenerate.php?<?php echo md5(uniqid(time)) ?>" alt="CAPTCHA Image"></div>
                <div class="form-group col-sm-1 col-md-1" style="padding-top: 23px;">
                <a tabindex="-1"  href="#" title="Refresh Image" onclick="refreshCaptcha(); this.blur(); return false">
                <img height="25" width="25" src="defaultimg/refresh.png" alt="Refresh Image" onclick="this.blur()" style=" " /></a>
            </div>
            <div class="form-group col-sm-5 col-md-5" style="margin-top: 20px;">
                <input type="text" class="form-control" tabindex="5" id="captcha_code" name="captcha_code" autofocus required placeholder="Type Text">
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <input type="submit" name="" id="login-submit" tabindex="6" class="form-control btn btn-login" value="Submit">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <a href="#myModal " data-toggle="modal" data-target="#myModal" tabindex="7" class="forgot-password">Forgot Password?</a>
                        </div>
                    </div>
                </div>
            </div>
</form>
        <form id="student-form" action="studentpage/studentlogin.php" method="post" role="form" style="display: none;">
                                    <div class="form-group">
                                        <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Roll No" value="">
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                                    </div>
                                   
                                   <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="student-submit" id="student-submit" tabindex="4" class="form-control btn btn-register" value="Sign In">
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <a href="studentpage/forgetpassword.php">Forgot Password </a>
                               
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Forget Password</h4>
        </div>
        <div class="modal-body">
          <form method="post" style="" action="" role="form" > 
       <div class="form-group">       
       <label class="control-label" for="Userid1">User ID*</label>
       <input type="text" id="Userid1" class="form-control" name="Userid1" autofocus required="">
      </div>
      
     <input type="button" class="btn btn-primary" id="submit1" name="submit" value="search">
    </form>
     <div id="show" style=""></div>
 

     

        </div>

       <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
</body>
</html>
