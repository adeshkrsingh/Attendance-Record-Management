<?php include('admincontent.php'); ?>
   <div style="width : 100%; height : 2% ;">
   </div>
<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
  $conn=mysqli_connect("localhost","risinola_ironman","ironman123");
    $db=mysqli_select_db($conn,"risinola_academics");
   

   $audiance=mysqli_real_escape_string($conn,$_POST['audiance']);
   $department=mysqli_real_escape_string($conn,$_POST['department']);
   $semester=mysqli_real_escape_string($conn,$_POST['semester']);
   $title=mysqli_real_escape_string($conn,$_POST['topic']);
   $content=mysqli_real_escape_string($conn,$_POST['content']);
   $pdate=date("Y-m-d");
   $ptime = date('H:i:s');
   
   $file_size=$_FILES['image']['size'];
   $image_tmp=$_FILES['image']['tmp_name'];
   $root = filter_input(INPUT_SERVER, 'DOCUMENT_ROOT');
   $post_image = $_FILES['image']['name'];
   $ext = pathinfo($post_image, PATHINFO_EXTENSION);
   $newname = date("dmY").date("hisa").".".$ext;
   
   move_uploaded_file($image_tmp, $dir = $root . '/notice/'.$newname);
   
     
     //$sql2 = "SELECT * from notices WHERE UserId= "."'".$UserIdLoaded."'";
     $sql2 = "INSERT INTO `notices` (`userid`, `audiance`, `noticetitle`, `noticecontent`, `dept`, `sem`, `date`, `time`, `img`) VALUES ('$UserID', '$audiance', '$title', '$content', '$department', '$semester', '$pdate', '$ptime', '$newname');";
     $result = $conn->query($sql2);
     if($result) { echo "<script>alert('Notice successfully posted') </script>"; }
     else { echo "<script>alert('Something went wrong, please retry or report bugg.')</script>"; }
}
?>      






<div class="col-md-3 right-news" style="width : 48%; height : auto ; float : left; overflow : auto;  background : #f0f0f0; ">
    <h3> <label for="audiance">New Notice</label> </h3>
 <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
               
    <div class="form-group">
       <label for="audiance">Notice Audiance</label>
       <select name="audiance" id="audiance" class="form-control">
        <option value="none" selected>---Select---</option>
        <option value="staff">Staff</option>
        <option value="student">Student</option>
       </select>
    </div>


    <div class="form-group col-md-6">
       <label for="department">Department</label>
       <select name="department" id="department" class="form-control">
        <option value="all">--All--</option>
        <option value="it">Information Technology (IT)</option>
        <option value="ce">Civil Engineering (CE)</option>
        <option value="cs">Computer Science and Engineering(CSE)</option>
        <option value="me">Mechanical Engineering (ME)</option>
        <option value="ch">Chemical Engineering (CH)</option>
        <option value="ec">Electronics and Communication Engineering (EC)</option>
        <option value="ee">Electrical Engineering (EE)</option>
       </select>
    </div>

    <div class="form-group col-md-6">
       <label for="department">Semester</label>
       <select name="semester" id="semester" class="form-control">
        <option value="0">--All--</option>
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
       <label for="topic">Notice Topic</label>
       <input type="topic" class="form-control" name="topic" required>
    </div>

    <div class="form-group">
       <label for="content">Notice Content</label>
       <textarea class="form-control" rows="7"  name="content"></textarea>
    </div>
    
    <div class="btn btn-default btn-file col-md-6">
       <label for="content">Browse (Only photo)</label>
       <input type="file" name="image" >
    </div>

    <div class="form-group col-md-6">
       <input type="submit" name="submit" id="submit" value="submit" class="btn btn-primary col-md-12">
    </div>

</form>

 </div>

   <div class="col-md-3 right-news" style="width : 3%; height : auto ; float : left; overflow : auto; ">
   </div>   

  <div class="col-md-3 right-news" style="width : 48%; height : auto ; float : left; overflow : auto; background : #f0f0f0; ">
            <div class="form-group"> <h3> <label for="topic"> Notice Till Date </label> </h3> </div>
      <?php include('a_notice_display.php'); ?>
   </div>
</div>
</div>

<script type="text/javascript">
       
          $(document).ready(OnloadFunction);
          function OnloadFunction ()
          {  
                 $("#submit").prop('disabled', 'disabled');
                 $("#department").prop('disabled', 'disabled');
                 $("#semester").prop('disabled', 'disabled');
                 
               $("#audiance").change(function() 
                  { 
                        
                         
                        if(this.value == 'none')  
                          { $("#department").prop('disabled', 'disabled'); $("#semester").prop('disabled', 'disabled'); $("#submit").prop('disabled', 'disabled'); }
                        else if(this.value == 'staff')
                          { $("#department").prop('disabled', false);  $("#submit").prop('disabled', false);  $("#semester").prop('disabled', 'disabled'); }
                        else
                          { $("#department").prop('disabled', false);  $("#semester").prop('disabled', false); $("#submit").prop('disabled', false); }
                        

                       });
          }
        </script>
</body></html>