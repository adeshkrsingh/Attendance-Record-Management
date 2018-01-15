<?php include('admincontent.php'); 
$SubmitValue= $_POST['submit'];
   If($SubmitValue=="register")
    {
    
$start = $_POST['start'];
$end   = $_POST['end'];
$cat = "R";
$sem = $_POST['semester'];
$dept = $_POST['dept'];
$academic = "2015-2016";
$k = 0;

for ($i=$start; $i <= $end ; $i++)
{   echo "<br>".++$k."<br>";
	 $ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "http://anujtestmodule.online/pages/admin/curl2.php");
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_POST, 1);
    $stmt = "rollno=".$i."&resultCat=".$cat."&seme=".$sem."&Acedemic=".$academic;
    curl_setopt($ch, CURLOPT_POSTFIELDS, $stmt);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER , 1);  // RETURN THE CONTENTS OF THE CALL
    $res = curl_exec($ch);
    $array = Array();
//print_r(json_decode($res)); echo "<br>";
   $array = json_decode($res);
  // echo $array[1];
  print_r($array);
   if(!empty($array[3]))
   {
   

 
      $tempdept = "";
      $rollno = $i;
      $y= trim($array[3]);
      $stdName = $y;
      
      $seme= $sem;
      echo "entered".$rollno."<br>".$stdName."<br>".$dept."<br>";
      include('connectstudent.php');
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


      
    // echo "<script>window.location.href='a_dashboard.php';alert('Member has been successfully Registered');</script> ";
   curl_close($ch);
   }
   else
   {
   curl_close($ch);
   }
 }
  
  
  
  }
?>





 <h1>Direct member registration</h1>
  <form method="post" action="">
  
     <div>
     <label class="control-label"  for="start">Starting Roll No</label>
     <input type="number" class="form-control"  id="start" name="start" autofocus required>
     </div>


     <div>
     <label class="control-label"  for="end">ending Roll No</label>
     <input type="number" class="form-control"  id="end" name="end" autofocus required>
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
                              
                              <option value="2">2</option>
                              
                               <option value="4">4</option>
                              
                               <option value="6">6</option>
                              
                              <option value="8">8</option>
                            </select> 
    </div>

      
     <div>
     <input type="submit" name="submit" value="register">         
     </div>
</form>