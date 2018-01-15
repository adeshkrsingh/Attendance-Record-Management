<?php include('content.php') ;  ?>
<?php include('package.php') ;  ?>

<div style="width : 100%; height: 10px; "></div>

 <form style="margin-left : 60px;" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" role="form" >
             <input type="submit" name="submit" value="View All Subject" class="btn btn-primary" />
             <input type="submit" name="submit" value="View Alloted Subject Only" class="btn btn-primary" />
             <input type="submit" name="submit" value="Assign Subject" class="btn btn-primary" />
             <input type="submit" name="submit" value="Modify All Allotment" class="btn btn-primary" />
            </form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
 {  $SubmitValue= $_POST['submit'];
     global $UserDepartmentLoaded;

    
     If($SubmitValue=="View All Subject")
     {  
       $x = new Admin();
          $arr = $x->getstructuretable("$UserDepartmentLoaded","submgmt");
          $arropt = $x->generateoption();
          $temp1;
      
          echo "<table  class='table table-bordered' style='height: auto;'>";
          foreach ($arr as $key => $smallarr)
            {
             
             echo "<tr>";
             foreach ($smallarr as $smallkey => $value)
               { 
                   echo "<td>".$value."</td>"; 

                }
            
             echo "</tr>"; 
            } 
          echo "</table>";
     }



      else If($SubmitValue=="View Alloted Subject Only")
      {
         
         $conn=mysqli_connect("localhost","risinola_ironman","ironman123");
        $db=mysqli_select_db($conn,$UserDepartmentLoaded);
  
         $sql2 = "select * from submgmt";
         $result = $conn->query($sql2);
   
         ?> <table class="table table-bordered" style="height: auto;"> <td> SNo </td> <th> Subject </td> <td> UserId </td> <td> Year </td> <td> SubDetail </td> <td> Semester </td> <?php
    
         if ($result->num_rows > 0)
            {          
            while($row = $result->fetch_assoc())
               {
                $sno = $row['SNo']; $Sub = $row['Subject']; $uid = $row['UserId']; $year = $row['Year']; $subd = $row['SubDetail']; $seme = $row['Semester'];
                  if($uid != "") 
                     {
                      ?> <tr> <td> <?php echo $sno; ?> </td> <td> <?php echo $Sub; ?> </td> <td> <?php echo $uid; ?> </td> <td> <?php echo $year; ?> </td> <td> <?php echo $subd; ?> </td> <td> <?php echo $seme; ?> </td> </tr> <?php 
                     }
               }
            }  ?> </table> <?php
      }
                   
          
      



      else If($SubmitValue=="Assign Subject")
       {
   
          $x = new Admin();
          $arr = $x->getstructuretable("$UserDepartmentLoaded","submgmt");
          $arropt = $x->generateoption();
          $temp1;
      
          echo "<table  class='table table-bordered' style='height: auto;'>";
          foreach ($arr as $key => $smallarr)
            {
             ?> <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" role="form" > <?php
             echo "<tr>";
             foreach ($smallarr as $smallkey => $value)
               {  $temp1 = $value;
                  if($smallkey==2 && $value=="")
                    { 
                       echo "<td><select name='allot' class='custom-select form-control'>"; 
                       foreach ($arropt as $x => $y) 
                          {
                          echo "<option value='$y'> $y </option>";
                          }
                  echo "</select></td>";
                    }

                  else { echo "<td>".$value."</td>"; }

                }
             if(empty($smallarr[2])) {echo "<td><button type='submit' class='custom-button form-control' style='Background:aqua;' name='submit' value='$smallarr[1]'>Assign</button></td>";}
             else {echo "<td></td>";}
             echo "</tr>"; echo "</form>";
            } 
          echo "</table>";
       }




       else If($SubmitValue=="Modify All Allotment")
       {
         $x = new Admin();
         $arr = $x->getstructuretable("$UserDepartmentLoaded","submgmt");
         $arropt = $x->generateoption();
         $temp1;
 
         echo "<table  class='table table-bordered' style='height: auto;'>";
         foreach ($arr as $key => $smallarr)
           {
             ?> <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" role="form" > <?php
             echo "<tr>";
             foreach ($smallarr as $smallkey => $value)
             {  $temp1 = $value;
               if($smallkey==2 && $value=="")
                  { 
                    echo "<td><select name='allot' class='custom-select form-control'>"; 
                     foreach ($arropt as $x => $y) 
                        {
                          echo "<option value='$y'> $y </option>";
                        }
                   echo "</select></td>";
                   }

                else if($smallkey==2 && $value!="" && $key!=0)
                  { 
                  echo "<td><select name='allot' class='custom-select form-control' style='Background:Azure;'>"; 
                     foreach ($arropt as $x => $y) 
                       {
                          echo "<option value='$y' style='Background:Azure;' ";if($value==$y){echo "selected";} echo "> $y </option>";
                       }
                   echo "</select></td>";
                  }

                else { echo "<td>".$value."</td>"; }

              }
           
              if($key!=0) {echo "<td><button type='submit' class='custom-button form-control' style='Background:aqua;' name='submit' value='$smallarr[1]'>Update</button></td>";}
              else {echo "<td></td>";}
         
            echo "</tr>"; echo "</form>";
           } 
           echo "</table>";
       
       }



       else
       {
          $allot= $_POST['allot'];
          $x = new Admin();
          $x->UpdateValue("$UserDepartmentLoaded","submgmt", "UserId", "$allot", "Subject" , "$SubmitValue");
          echo "Data Updated Successfully";
        }
}
