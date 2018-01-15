<?php include('content.php'); ?>

<div class="container">                          
 <div class="row">
  <div class="col-md-6" style="margin-left:25%; margin-top:1%;">
  <div class="panel panel-info" >
        <div class="panel-heading">New Subject Registration</div>
    <div class="panel-body">
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" role="form" >
  
    <div class="form-group">
    <label class="control-label"  for="SubjectCode">Subject Code (6 digit only)*</label>
    <input type="text" class="form-control"  id="SubjectCode" name="SubjectCode" autofocus required>
    </div>

    <div class="form-group">
    <label for="SubjectName">Subject Name*</label>
      <input type="text" class="form-control"  id="SubjectName" name="SubjectName" autofocus required>
    </div>

    <div class="form-group">
    <label for="SubType">Subject Type*</label>
            <select name="SubType"  class="custom-select form-control" >
             <option value="lect">Lecture</option>
             <option value="tut1">Tute (Group A)</option>
             <option value="tut2">Tute (Group B)</option>
             <option value="pra1">Practical (Group A)</option>
             <option value="pra2">Practical (Group B)</option>
            </select>
  </div>
  
  <div class="form-group">
    <div class="col-xs-6"><label for="Semester">Semester</label>
            <select name="Semester" class="custom-select form-control" >
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
  <div class="col-xs-6">
    <label for="Year">Session</label>
             <select name="Year" class="custom-select form-control" >
              <option value="2016_2017">2016-2017</option>
              <option value="2017_2018">2017-2018</option>
              <option value="2018_2019">2018-2019</option>
             </select>
  </div>
    </div>
    
<div class="form-group">
   <div style=" height: 15%; "></div>
   <div>
 <input type="submit" margin-top="20" class="btn btn-primary" style="margin-left : 35%; width : 30%; " name="submit" value="register">                 
 
 
 <!-- value defines the printed material  -->
    </div></div>
</form>
</div>
</div>
</div>
</div>
</div> 


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
 {  global $UserDepartmentLoaded;
   $SubmitValue= $_POST['submit'];
   If($SubmitValue=="register")
    {
       $Sub = $_POST['SubjectCode'];
       if(strlen($Sub)==6 )
      {

// Now New Subject Regestration Process      
 
  $conn=mysqli_connect("localhost","risinola_ironman","ironman123");
  $db=mysqli_select_db($conn,$UserDepartmentLoaded);

      
      $SubType = $_POST['SubType'];
      $sem = $_POST['Semester'];
      $Yr = $_POST['Year'];
      $x = $Sub."_".$SubType;
     
      $SubDetail = $_POST['SubjectName'];
            
      $sql2 = "INSERT INTO submgmt (Subject, Year, SubDetail, Semester) VALUES ('$x', '$Yr', '$SubDetail', '$sem')";
      $result = $conn->query($sql2);
          
          
// Subject wise table generate
      $names = $Sub."_".$SubType."_semester".$sem."_".$Yr;
      $TableNameGen="create table ".$names."(rollNo int(10) unique, name varchar(50)"; 
      $i=1; $j=6; $y;

      if($sem==1 || $sem==3 || $sem==5 || $sem==7) { $i = 7; $j = 12; }
      else  { $i = 1; $j = 6; } 
      for ($i; $i <= $j ; $i++)
      { 
            $maxday=date("t",mktime(0,0,0,$i));
              for ($x=1; $x <= $maxday ; $x++)
              { $y="d".$i."".$x;
                 $TableNameGen = $TableNameGen.",  ".$y." int(2) DEFAULT '0'";
              }
      }
      $TableNameGen = $TableNameGen.", total int(10))";
      $sql = $TableNameGen;
      $result = $conn->query($sql);
             


// Roll No Sync to newly generated table
      $sql2 =" SELECT COUNT(*) FROM studentlist where Semester=".$sem;
      $l = $conn->query($sql2);
      $r = $l->fetch_assoc();
      $totalrow = $r["COUNT(*)"];
      $halfrow = $totalrow/2;

      if($SubType == "tut1" || $SubType == "pra1" ) { $sql2 = "select * from studentlist Limit 0, $halfrow";  }
      else if($SubType == "tut2" || $SubType == "pra2" ) { $sql2 = "select * from studentlist Limit $halfrow, $totalrow";  }
      else { $sql2 = "select * from studentlist"; }
      
      $result = $conn->query($sql2);
      if ($result->num_rows > 0)
      {      
        while($row = $result->fetch_assoc())
        {  if( $sem == $row['Semester'])
          {
        $getRollNo=$row['RollNo'];
        $getName=$row['Name'];
           $sql3 = "INSERT INTO ".$names." (rollNo, name) VALUES ('$getRollNo', '$getName')";
           $result3 = $conn->query($sql3);
          }
        }
  }
     echo "<script>window.location.href='h_suballotment.php';alert('Subject has been successfully Registered, Next Step - assign this subject');</script> ";
     }
    else{ echo "<script>alert('Only 6 digit Subject Code Allowed, Please try again');</script>";}
}
  }
 
?>