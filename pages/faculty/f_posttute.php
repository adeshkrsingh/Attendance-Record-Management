<?php include('facultycontent.php') ?>



<div id="gap" style="width: 100%; height: 12px;"></div>

	<div class="row" style=" margin-top:50px;">
		 <div class="col-md-3"></div>
		 <div class="col-md-6">
			 <div class="panel-group">
			     <div class="panel panel-primary">
			      	 <div class="panel-heading">POST TUTE</div>
				      	 <div class="panel-body" style="padding-top:30px;">
				      		
				         <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
							 <div class="form-group">
							
							<label for="department">DEPARTMENT</label>
							<select name="department" id="department" class="form-control">
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
							
							<div class="form-group col-sm-6" style="padding-left:0px;"> 
							<label for="Subjectcode">SUBJECT CODE</label>
							<select class="form-control" id="Subjectcode" name="Subjectcode">
							</select>
							</div>
                            
                            <div class="form-group col-sm-6" style="padding-right:0px;" required> 
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
							<label for="ldate">LAST DATE OF SUBMISSION</label>
							<input type="date" class="form-control" name="ldate" required>
							</div>
								        
						    <div class="form-group">
							<label >UPLOAD FILE</label>
							<input type="file" class="form-control" name="file" required>
							</div>
							
							<div class="form-group">
							<label for="comment">DESCRIPTION:</label>
							<textarea class="form-control" rows="5" id="comment" placeholder="PLZ GIVE DESCRIPTION IF ANY" name="content" required></textarea>
							</div>
							
							<div class="text-center"><input type="submit" name="submit" id="submit" value="submit" class="btn btn-primary "></div>
					     </form>
				      			
				      	 </div>
				    </div>
			    </div>
			</div>
			    	  	
			<div class="col-md-3"></div>
        </div>

<script type="text/javascript">
        	$(document).ready(function()
        	{
        		   $( "#department" ).change(function() 
        		      { 
                        
                         $('#Subjectcode').find('option').remove();
                        if(this.value == 'none') 
                        	{ $("#Subjectcode").prop('disabled', 'disabled'); $("#submit").prop('disabled', 'disabled'); }
                        else 
                        	{ $("#Subjectcode").prop('disabled', false);  $("#submit").prop('disabled', false); 
                         
                            $.ajax({
                                 url: "f_searchsubfortute.php",
                                 type:"POST", 
                                 data : { 'department' : this.value },          
                                 success: function(result)
                                             {
                                             $("#Subjectcode").html(result);
                                             }
                                  });

                            }

                      });

        		 

         	})
        </script>
        
<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
    $con=mysqli_connect("localhost","risinola_ironman","ironman123");
    $db=mysqli_select_db($con,'risinola_student');
    
    $department=$_POST['department'];
    $sub=$_POST['Subjectcode'];
    $seme=$_POST['semester'];
	$pdate=date("Y-m-d");
	$time = date('H:i:s');
	$ldate=$_POST['ldate'];
    $post_file=$_FILES['file']['name']; //Original
    $file_tmp=$_FILES['file']['tmp_name'];
    $teacher=$Name;
    $content=$_POST['content'];
 
$root = filter_input(INPUT_SERVER, 'DOCUMENT_ROOT');
$dir = $root . '/assignment/'.$department.'/'.$sub;
$old = umask(0);

if( !is_dir($dir) ) {
    mkdir($dir, 0755, true);
}
umask($old);

$sql2="SELECT * from `risinola_student`.`tutetblist`";
$result = $con->query($sql2);
if($result)
    {
     if ($result->num_rows > 0)
      {          
       while($row = $result->fetch_assoc())
        { $tbname = $row[$department];
        }
      }
   }
	move_uploaded_file($file_tmp,$dir = $root . '/assignment/'.$department.'/'.$sub.'/'.$post_file);		
    
    $insert_query="INSERT INTO `risinola_student`.`$tbname` (`SNo`, `teacher`, `subcode`, `seen`, `semester`, `postd`, `lastds`, `content`, `file`) VALUES (NULL, '$teacher', '$sub', '', '$seme', '$pdate', '$ldate', '$content', '$post_file')";
    						if(mysqli_query($con,$insert_query))
    						   {
    							     echo "<script>alert('Post submitted successfully')</script>";
    							     
                                }
							 else{
									 echo "<script>alert('Post not submitted successfully')</script>";
}
     $x = "SELECT COUNT(*) FROM `risinola_student`.`$tbname` WHERE `subcode`='$sub'" ;
	$q = mysqli_query($con,$x);
	
        $r = $q->fetch_assoc();
         $totalrow = $r["COUNT(*)"];
         echo $totalrow;
         
         
         					 
 $UserIdLoaded = $_SESSION["UserId"];
 $UserDepartmentLoaded = $_SESSION["Department"];
 @mysqli_select_db($con,$UserDepartmentLoaded);
 
 $sql3="UPDATE `tutemgmt` set `date`='$pdate', `time`='$time',  `nooftute`='$totalrow' where `subcode`='$sub'";
 $result3 = $con->query($sql3);
 
 if($result3)
{
 $insert_query="INSERT INTO `$UserDepartmentLoaded`.`tutemgmt` (`id`, `userid`, `subcode`, `semester`, `date`, `time`, `nooftute`) VALUES (NULL, '$UserIdLoaded', '$sub', '$seme', '$pdate', '$time', '1');";
$result = $con->query($insert_query);
  }
   echo "<script>window.open('dashboard.php','_self')</script>";                     
 }

 ?>