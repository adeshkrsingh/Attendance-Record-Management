<?php
session_start();
if (!isset($_SESSION['HODId'])) {
    header("location:/index.php");
}
else{   ?>
<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">	
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Feedback form</title>	
  <link rel="stylesheet" href="/style/css/bootstrap.min.css">
 
  
  <link rel="stylesheet" type="text/css" href="/style/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

  <script src="/style/js/jquery-1.12.2.js"></script>
    <script src="/style/js/bootstrap.min.js"></script>
    <script type="text/javascript">
		$(document).ready(function() {
    //set initial state.
    $("#demo .test").hide();
    $("#demo .test1").hide();

$("#demo .test2").hide();

    $('#check1').click(function() {
        if ($(this).is(':checked')) {
             
        	$("#demo .test").show();
        }
        else{
        	$("#demo .test").hide();
        }
        
    });
    $('#check2').click(function() {
        if ($(this).is(':checked')) {
             
        	$("#demo .test1").show();
        }
        else{
        	$("#demo .test1").hide();
        }
        
    });
    $('#check3').click(function() {
        if ($(this).is(':checked')) {
             
        	$("#demo .test2").show();
        }
        else{
        	$("#demo .test2").hide();
        }
        
    });
    
   
    
});
	</script>
	<style type="text/css">
		.table-striped>tbody>tr:nth-of-type(odd){
			background: #53a9d0;
			color: black;
		}
		.table>thead>tr>th {
			    border-bottom: 2px solid #2d2b2b;
			}
	</style>
	

</head>
<body style="background-image: url('/defaultimg/u7FfAl.jpg');
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;"">
<div class="container">
  <div class="page-header" style="border-bottom:1px solid #101010">
    <h1>Feedback Form</h1>
    <h3 class="">We would love to hear your thoughts, concerns or problems with anything so we can improve!</h3>
  </div>
  <h3>What takes you here?
</h3>
<form method="post" action="feedback.php" autocomplete="off">
<div class="form-group">
  
  

   
    <label class="checkbox-inline" for="checkboxes-1">

      <input type="checkbox"  name="takes[0]" id="check1" value="Question">

      Question
    </label>
    <label class="checkbox-inline" for="checkboxes-2">
      <input type="checkbox"  id="check2" name="takes[1]" value="Bug Report">
      Bug Report
    </label>
    <label class="checkbox-inline" for="checkboxes-3">
      <input type="checkbox"  id="check3" name="takes[2]" value="Suggestion">
      Suggestion
    </label>
 
 </div>
 

<br>
<div class="row">
<div id="demo" class="col-md-8">
<div class="form-group test"   style="padding: 0px;">
  <h3>Ask any question or query??</h3>
  <textarea class="form-control" name="t[0]" rows="5" id="comment"></textarea>
	</div>
	<div class="form-group test1"   style="padding: 0px;">
  <h3>What is the bug??</h3>
  <textarea class="form-control" name="t[1]" rows="5" id="comment"></textarea>
	</div>
	<div class="form-group test2"   style="padding: 0px;">
  <h3>Feel free to give opinion??</h3>
  <textarea class="form-control" name="t[2]" rows="5" id="comment"></textarea>
	</div>

	
</div>
<div class="col-md-4"></div>
</div>
<div class="form-group col-md-12 " style="padding: 0px;">
  <h3>What do you think of our website?</h3>
  <div class="table-responsive" >
  <table class="table table-striped" >
    <thead>
      <tr>
        <th>&nbsp</th>
        <th class="text-center"><bold>Very Satisfied</bold></th>
        <th class="text-center"><bold>Satisfied</bold></th>
        <th class="text-center"><bold>Neutral</bold></th>
        <th class="text-center"><bold>Unsatisfied</bold></th>
        
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="text-center">Timely Response</td>
        <td class="text-center"><input type="checkbox" name="rate[]" id="checkboxes-3" value="1"></td>
        <td class="text-center"><input type="checkbox" name="rate[]" id="checkboxes-3" value="2"></td>
        <td class="text-center"><input type="checkbox" name="rate[]" id="checkboxes-3" value="3"></td>
        <td class="text-center"><input type="checkbox" name="rate[]" id="checkboxes-3" value="4"></td>
      </tr>
      <tr>
        <td class="text-center">Ease Of Acess</td>
        <td class="text-center"><input type="checkbox" name="rate[]" id="checkboxes-3" value="1"></td>
        <td class="text-center"><input type="checkbox" name="rate[]" id="checkboxes-3" value="2"></td>
        <td class="text-center"><input type="checkbox" name="rate[]" id="checkboxes-3" value="3"></td>
        <td class="text-center"><input type="checkbox" name="rate[]" id="checkboxes-3" value="4"></td>
      </tr>
      <tr>
        <td class="text-center"> User friendliness of interface</td>
        <td class="text-center"><input type="checkbox" name="rate[]" id="checkboxes-3" value="1"></td>
        <td class="text-center"><input type="checkbox" name="rate[]" id="checkboxes-3" value="2"></td>
        <td class="text-center"><input type="checkbox" name="rate[]" id="checkboxes-3" value="3"></td>
        <td class="text-center"><input type="checkbox" name="rate[]" id="checkboxes-3" value="4"></td>
      </tr>
      
      <tr>
        <td class="text-center">Overall Experience</td>
        <td class="text-center"><input type="checkbox" name="rate[]" id="checkboxes-3" value="1"></td>
        <td class="text-center"><input type="checkbox" name="rate[]" id="checkboxes-3" value="2"></td>
        <td class="text-center"><input type="checkbox" name="rate[]" id="checkboxes-3" value="3"></td>
        <td class="text-center"><input type="checkbox" name="rate[]" id="checkboxes-3" value="4"></td>
      </tr>
    </tbody>
  </table>
  </div>
  <br>
 <div class="form-group col-md-6 " style="padding: 0px;">
  <h3>Feel free to add any other comments or suggestions:</h3>
  <textarea class="form-control" name="comment" rows="5" id="comment"></textarea>
</div>
</div>
<br>
<input type="submit" class="btn btn-default btn-lg" name="submit">
</form>
</div>
<?php } ?>
</body>
</html>


