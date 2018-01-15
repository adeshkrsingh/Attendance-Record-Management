<?php include('admincontent.php'); ?>

<div class="container">                          
 <div class="row">
  <div class="col-md-6" style="margin-left:25%; margin-top:1%;">
  <div class="panel panel-info" >
        <div class="panel-heading"><b>New Staff Registration</b></div>
    <div class="panel-body" style="background-color : #f1f1f1;">
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" role="form" >
  
    <div class="form-group" style="width: 100%; float: left;">
     <div> <label class="control-label"  for="UserID">UserID</label> </div>
      <div style="width: 93%; float: left;">
     <input type="text" class="form-control"  id="UserID" name="UserID" autofocus required>
      </div>
       <div id="useridstatus" style="width: 6.5%; margin-left: 0.5%; height: 32px; float: left;"> </div>
    </div>

    <div class="form-group">
    <label class="control-label"  for="UserName">User Name</label>
    <input type="text" class="form-control"  id="UserName" name="UserName" autofocus required>
    </div>

    <div class="form-group">
    <label class="control-label"  for="JoinYear">Join Year</label>
    <input type="text" class="form-control"  id="JoinYear" name="JoinYear" autofocus required>
    </div>

    <div class="form-group">
    <label class="control-label"  for="dept">Department</label>
    <select name="dept" id="dept" class="custom-select form-control" >
             <option value="it">Information Technology</option>
             <option value="cs">Computer Science</option>
             <option value="ce">Civil Engg</option>
             <option value="me">Mechanical Engg</option>
             <option value="ec">Electronics and Comm</option>
             <option value="ee">Electrical Engg</option>
             <option value="ch">Chemical Engg</option>
             <option value="mba">Mba</option>
             <option value="other">Other</option>
            </select>
    </div>

     <div class="form-group">
    <label for="TypeofMwmber">Type of member</label>
            <select name="TypeofMwmber"  class="custom-select form-control" >
             <option value="faculty">Faculty</option>
             <option value="hod">HOD</option>
             <option value="admin">Administrator</option>
            </select>
     </div>

  
<div class="form-group">
   <div style=" height: 5%; "></div>
   <div>
 <input type="submit" margin-top="20" class="btn btn-primary" style="margin-left : 35%; width : 30%; " name="submit" value="register">                 <!-- value defines the printed material  -->
    </div></div>
</form>
</div>
</div>
</div>
</div>
</div> 

<script type="text/javascript">
$(document).ready(function()
{    
 $("#UserID").keyup(function()
 {  
  var name = $(this).val(); 
  var timer;
  if(name.length > 3)
  {  var username = $(this).val();
   $("#useridstatus").html('<img src="/defaultimg/ajax-loader.gif" style="height : 20px; margin-top : 10px;" />');
   timer = setTimeout(function(){ 
   $.ajax({
    
    type : 'POST',
    url  : 'checkuser.php',
    data : {username: username},
    success : function(data)
        {
              $("#useridstatus").html(data);
           }
    });
 }, 1000);
    return false;
   
  }
  else
  {
   $("#useridstatus").html('');
  }
 });
 
});
</script>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
   $SubmitValue= $_POST['submit'];
   If($SubmitValue=="register")
    {
     $conn=mysqli_connect("localhost","risinola_ironman","ironman123");
    $db=mysqli_select_db($conn,"risinola_academics");
 

      $UserID = $_POST['UserID'];
      $UserName = $_POST['UserName'];
      $JoinYear = $_POST['JoinYear'];
      $dept = $_POST['dept'];
      $TypeofMwmber = $_POST['TypeofMwmber'];
      
     $sql2 = "INSERT INTO logindetail (LId, UType, loginP, dept, Name, JoinYear ) VALUES ('$UserID', '$TypeofMwmber', 'low', '$dept', '$UserName', '$JoinYear')";
      $result = $conn->query($sql2);
      
     echo "<script>window.location.href='a_dashboard.php';alert('Member has been successfully Registered');</script> ";
    }
  }
  
?>



</div>
</div>
</body>
</html>