<?php include('facultycontent.php') ;  ?>
<div style="width : 100%; height : 12px; "></div>
 <form method="post" style="margin-left : 50px" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" role="form" >
          <select name="department" id="department" class="custom-select form-control" style="width: 350px; float: left;">
             <option value="none">--Select Department--</option>
             <option value="it">Information Technology (IT)</option>
             <option value="ce">Civil Engineering (CE)</option>
             <option value="cs">Computer Science and Engineering(CSE)</option>
             <option value="me">Mechanical Engineering (ME)</option>
             <option value="ch">Chemical Engineering (CH)</option>
             <option value="ec">Electronics and Communication Engineering (EC)</option>
             <option value="ee">Electrical Engineering (EE)</option>
             <option value="ash">Applied Science and Humanities</option>
          </select>

          <select class="form-control" name="choose" id="subjectname" style="margin-left: 10px ; width: 350px; float: left;">  
          
        </select>
      
        <input type="submit" name="submit" id="submit" class="btn btn-primary"  value="Show" style="margin-left: 10px ; width: 150px; float: left;" />
        </form> <span id="Status" style="margin-left: 10px; font-weight: bold;  "> </span>
<br/></br>

     <div id="attendencepage" >
     
     
        <script type="text/javascript">
        	$(document).ready(function()
        	{
        		  $('#subjectname').prop('disabled', 'disabled');
        		  $('#submit').prop('disabled', 'disabled');
                  
        		   $( "#department" ).change(function() 
        		      { 
                         $("#attendencepage").html('');
                         $('#subjectname').find('option').remove();
                        if(this.value == 'none') 
                        	{ $("#subjectname").prop('disabled', 'disabled'); $("#submit").prop('disabled', 'disabled'); }
                        else 
                        	{ $("#subjectname").prop('disabled', false);  $("#submit").prop('disabled', false); 
                         
                            $.ajax({
                                 url: "f_searchsub.php",
                                 type:"POST", 
                                 data : { 'department' : this.value },          
                                 success: function(result)
                                             {
                                             $("#subjectname").html(result);
                                             }
                                  });

                            }

                      });

        		  $('#updt').Click(function()
        		    {
                      ('#Status').html("Uploading...");
        		    });

         	})
        </script>

        <script type="text/javascript">
    function selectall(source)
    {
        var jvalue = source.name;
     
         alert("All Boxes has been checked, uncheck the individual boxes");

         var select_all = document.getElementById(jvalue); //select all checkbox
          var checkboxes = document.getElementsByClassName(source.name); //checkbox items

              //select all checkboxes
         select_all.addEventListener("change", function(e){
         for (i = 0; i < checkboxes.length; i++) 
            { 
             checkboxes[i].checked = select_all.checked;
            }
                                     });

              //uncheck "select all", if one of the listed checkbox item is unchecked
         for (var i = 0; i < checkboxes.length; i++) 
            {
            checkboxes[i].addEventListener('change', function(e)
                 {
                 if(this.checked == false){
                 select_all.checked = false;
                 }
                                           });
            }
    }
  </script>


<?php
 
    function cbvisibility( $CheckMonth, $CheckDay)
      {
      $DayNow=date("d",mktime(0,0,0));
      $MonthNow=date("m",mktime(0,0,0));

      $DateWeekBefore=new DateTime('now');  date_add($DateWeekBefore,date_interval_create_from_date_string("-07 days"));
      $Day_WeekBefore = date_format($DateWeekBefore,"d");
      $Month_WeekBefore = date_format($DateWeekBefore,"m");
  
          if($CheckMonth == $Month_WeekBefore)
              { 
               if($CheckDay < $Day_WeekBefore )
                   {  return "disabled"; }
               else if ( $CheckDay > $DayNow)
                   {  return "disabled"; }
               else 
                   {  return ""; }
              }
           else if ($CheckMonth == $MonthNow)
              {
                if ( $CheckDay > $DayNow)
                   {  return "disabled"; }
                else 
                   {  return ""; }
              }
           else 
              {   return "disabled";  }
       }


    function abc($t, $index)
    {
      	 
         $MName = array('jan','feb','mar','apr' ,'may' ,'jun' ,'jul' ,'aug','sep' ,'oct' ,'nov' ,'dec');
         $x = $_SESSION['tempSubLoc'];
         $mysql_host="localhost"; $mysql_user="risinola_ironman"; $mysql_password="ironman123"; $dbname=$x;
         $conn= new mysqli($mysql_host, $mysql_user, $mysql_password, $dbname);
         @mysqli_select_db($dbname);
 
         $month=$index; $dis="";$date = new DateTime('now');
         $maxday=  date("d", mktime(0, 0, 0, $month+1, 0));    // 1 is added because this treats 2 as jan and so on
  
  
        $sql = "select * from ".$t;
        $result = $conn->query($sql); ?>
         
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" role="form" >
          <table  class="table table-bordered, table-hover" style="height: auto;"> <th> RollNo </th><th> Name </th>

              <?php  for ($i=1; $i <= $maxday; $i++) {  $mkcolor = cbvisibility( $month, $i); $clr = ($mkcolor == "")?"red":"black"; ?>
                  <th> <span style="color: <?php echo $clr; ?>"> <?php echo $i; ?> </span></th> <?php } ?>

                     <tr><td> <p style="color : red; height : 10px;"> <b> Check All </b></p></td> <td></td>
                       <?php for ($i=1; $i <= $maxday; $i++) 
                       { 
                        $temploc = "d".$month."".$i;  $dis=cbvisibility( $month, $i);
                       ?>
                          <td> <input type="checkbox" onclick="selectall(this)" id="<?php echo $temploc; ?>" name="<?php echo $temploc; ?>" <?php echo $dis; ?> > </input>  </td>  <?php  }
          
          // now we will print each row option format
        if ($result->num_rows > 0)
        {   
         while($row = $result->fetch_assoc())
              {   ?> <tr> <?php
              $r = $row['rollNo'];?> <td> <?php echo $r; ?> </td> <?php
              $n = $row['name']; ?> <td> <?php echo $n; ?> </td> <?php
              for ($i=1; $i <= $maxday; $i++) 
                  {  $dis=cbvisibility( $month, $i);
                     $temploc = "d".$month."".$i;
                     $d = $row[$temploc];
                     $tempValue = $row[$temploc];  $StaticName = $r."".$temploc;
                    ?> <td> <input  type="checkbox" class="<?php echo $temploc; ?>" id="d71[]" name="<?php echo $StaticName; ?>"  <?php if ($tempValue==0) { echo "unchecked"; } else { echo "checked"; }  ?> <?php echo $dis; ?> >  </td> <?php 
                   }
                   ?> </tr> <?php
               }  
        }  
           ?>  </table>
        <input style="{padding-left: 15px; }" type="submit" name="submit" id='updt' class="btn btn-primary" value="Update This Month" />
        <input type="hidden" name="MonthNumber" class="btn btn-primary" value='<?php echo $index ?>' hidden />
        <input type="hidden" name="xtn" class="btn btn-primary" value="<?php echo $t ?>"  />
    </form>


        <?php
    }


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  $SubmitValue= $_POST['submit'];


  If($SubmitValue=="Show")
    {    
    	 $opt = $_POST['choose'];
         $i=7; $m = array('', 'jan','feb','mar','apr' ,'may' ,'jun' ,'jul' ,'aug','sep' ,'oct' ,'nov' ,'dec');
          $tbn  = ""; 
          $tempdb = $_SESSION["tempSubLoc"];
          $mysql_host="localhost"; $mysql_user="risinola_ironman"; $mysql_password="ironman123"; $dbname=$tempdb;
          $conn= new mysqli($mysql_host, $mysql_user, $mysql_password, $dbname);
          @mysqli_select_db($dbname);
           $sql2 = 'SELECT * FROM submgmt WHERE SNo='.$opt;
           $result = $conn->query($sql2);
           if($result)
             {
             	if ($result->num_rows > 0)
                           {          
                           while($row = $result->fetch_assoc())
                              { 
                              $subcode= $row['Subject']; $sem = $row['Semester']; $year=$row['Year'];
                               $tbn  = $subcode."_semester".$sem."_".$year;
                            
                              }
                           }// $TableNameGen = "eit505_lect_semester5_2016_2017";
                      $TableNameGen = $tbn;
                    
                    ?>
                         <ul class="nav nav-tabs">
                   <li class="active"><a data-toggle="tab" href="#home">Subject Detail</a></li>
                   <li><a data-toggle="tab" href="#1"><?php echo $m[$i]; ?></a></li>
                   <li><a data-toggle="tab" href="#2"><?php echo $m[$i+1]; ?></a></li>
                   <li><a data-toggle="tab" href="#3"><?php echo $m[$i+2]; ?></a></li>
                   <li><a data-toggle="tab" href="#4"><?php echo $m[$i+3]; ?></a></li>
                   <li><a data-toggle="tab" href="#5"><?php echo $m[$i+4]; ?></a></li>
                   <li><a data-toggle="tab" href="#6"><?php echo $m[$i+5]; ?></a></li>
                   </ul>
                  <div class="tab-content">
                     <div id="home" class="tab-pane fade in active"><h3>
                       <?php
                        echo "<table class='table table-bordered, table-hover' style='width: 90%; margin-left: 5%; '>";
                        echo "<tr><td colspan='2'> Subject Details : </td></tr>";
                        echo "<tr><td>Subject Code  </td><td>".substr($TableNameGen, 0,3)." ".substr($TableNameGen, 3,3); echo "</td></tr>";
                        echo "<tr><td>Subject Type  </td><td>".substr($TableNameGen, 7,4); echo "</td></tr>";
                        echo "<tr><td>Applicable Semester </td><td> ".substr($TableNameGen, 20,1);  echo "</td></tr>";
                        echo "<tr><td>Current Session  </td><td>".substr($TableNameGen, 22,4)."-".substr($TableNameGen, 27,4); echo "</td></tr></table>";
             
                        ?><br>Click On Months Name</h3></div>
                      <div id="1" class="tab-pane fade" onclick=""  style="overflow: auto;"> <?php abc($TableNameGen, $i); ?></div>
                      <div id="2" class="tab-pane fade" onclick=""  style="overflow: auto;"> <?php abc($TableNameGen, $i+1); ?></div>
                      <div id="3" class="tab-pane fade" onclick="" style="overflow: auto;"> <?php abc($TableNameGen, $i+2); ?></div>
                      <div id="4" class="tab-pane fade" onclick="" style="overflow: auto;"> <?php abc($TableNameGen, $i+3); ?></div>
                      <div id="5" class="tab-pane fade" onclick="" style="overflow: auto;"> <?php abc($TableNameGen, $i+4); ?></div>
                      <div id="6" class="tab-pane fade" onclick="" style="overflow: auto;"> <?php abc($TableNameGen, $i+5); ?></div>
                   </div>
                     <?php
                 }
                 else { echo "Unable to Load Please Check your allotment subject department than Try again"; }
          echo "</div>";
    }

 

 If($SubmitValue=="Update This Month")
   {
         $x = $_SESSION['tempSubLoc'];
         $mysql_host="localhost"; $mysql_user="risinola_ironman"; $mysql_password="ironman123"; $dbname=$x;
         $conn= new mysqli($mysql_host, $mysql_user, $mysql_password, $dbname);
         @mysqli_select_db($dbname);

     $TName = $_POST['xtn'] ;
     $month=$_POST['MonthNumber'];
    
     $sql = "select * from ".$TName;
     $result = $conn->query($sql);
     if ($result->num_rows > 0)
       {   
         while($row = $result->fetch_assoc())
           { 
           $maxday=date("t",mktime(0,0,0,$month));
           $r = $row['rollNo']; $n = $row['name'];
             for ($i=1; $i <= $maxday; $i++) 
                {   
              $temploc = "d".$month."".$i;
              $StaticName = $r."".$temploc;
                    if (empty($_POST[$StaticName]))
                      {    
                        $sql3="UPDATE ".$TName." set ".$temploc."='0' where rollNo=".$r;
                        $result3 = $conn->query($sql3);
                      }
                     else 
                       { 
                         $sql3="UPDATE ".$TName." set ".$temploc."='1' where rollNo=".$r;
                         $result3 = $conn->query($sql3);
                       }
                 }
            }
        }

      // echo "<script type='text/javascript'>window.location.href='/4/hoddashboard.php';alert('Your Data Has Been Updated Successfully');</script>";
    } 

  

   else If($SubmitValue=="Report")
    { echo "<script type='text/javascript'>window.location.href='/4/hodreport.php';</script>"; }

}
 

?>

</div>
</div>
</body>