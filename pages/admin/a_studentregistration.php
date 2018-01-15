<?php include('admincontent.php'); ?>

<div class="container">                          
 <div class="row">
  <div class="col-md-6" style="margin-left:25%; margin-top:1%;">
  <div class="panel panel-info" >
        <div class="panel-heading"><b>Student Registration</b></div>
    <div class="panel-body" style="background-color : #f1f1f1;">
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" role="form" >
  
    <div class="form-group" style="width: 100%; float: left;">
     <div> <label class="control-label"  for="UserID">Roll No</label> </div>
      <div style="width: 93%; float: left;">
     <input type="number" class="form-control"  id="UserID" name="UserID" autofocus required>
      </div>
       <div id="useridstatus" style="width: 6.5%; margin-left: 0.5%; height: 32px; float: left;"> </div>
    </div>

    <div class="form-group">
    <label class="control-label"  for="UserName">Student Name</label>
    <input type="text" class="form-control"  id="UserName" name="UserName" autofocus required>
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
     </select>
    </div>
    
    
    <div class="form-group">
   <label for="semester">SEMESTER</label>
                            <select name="semester" id="semester" class="custom-select form-control" >
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                               <option value="4">4</option>
                              <option value="5">5</option>
                               <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
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
    url  : 'checkstudent.php',
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
     include('connectstudent.php');
 
      $tempdept = "";
      $rollno = $_POST['UserID'];
      $stdName = $_POST['UserName'];
      $dept = $_POST['dept'];
      $seme= $_POST['semester'];
      
       $sql2 = "INSERT INTO `risinola_student`.`studentlogin` (`rollno`, `name`, `dept`, `semester`) VALUES ('$rollno', '$stdName', '$dept', '$seme') ";
      $result = $conn->query($sql2);
      
      include('connectadmin.php');
      $db=mysqli_select_db($conn,"risinola_academics");
      $sql = "select * from currentsession where Status='active'";
        $result = $conn->query($sql);
                  
          if ($result->num_rows > 0)
          {         
            while($row = $result->fetch_assoc())
              {
              $tempdept = $row[$dept];
              }
          }
        
       $db=mysqli_select_db($conn, $tempdept);
       $sql2 = "INSERT INTO  `$tempdept`.`studentlist` (`RollNo` ,`Semester` ,`Name`) VALUES ('$rollno',  '$seme',  '$stdName')";
       $result = $conn->query($sql2);


      
     echo "<script>window.location.href='a_dashboard.php';alert('Member has been successfully Registered');</script> ";
    }
  }
  
?>



</div>
</div>
</body>
</html>