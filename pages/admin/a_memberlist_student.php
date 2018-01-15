<?php include('admincontent.php'); ?>
<?php include('package.php'); ?>

 

<div>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" role="form" >
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
    <div> <input type="submit" name="submit" value="show"> </div>
</form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
   $SubmitValue= $_POST['submit'];
   If($SubmitValue=="show")
    {
      $total = 0; $firstyr = 0; $secondyr = 0 ; $thirdyr = 0; $finalyr = 0;
      $dept= $_POST['dept'];
      $x = new Admin();
      $array2D = $x->getstructuretable("risinola_student", "studentlogin");
      echo "<table  class='table table-bordered' style='height: auto;'>";
      foreach ($array2D as $rownum => $rowvalue) { echo "<tr>";
        foreach ($rowvalue as $index => $columnvalue) {
        	
          if($rowvalue[7]==$dept) 
          { echo "<td> $columnvalue </td>"; $total = $total + 1; 
          
          if($rowvalue[8]==2) { $secondyr = $secondyr +1; }
          
          if($rowvalue[8]==4) { $thirdyr = $thirdyr +1; }
          if($rowvalue[8]==6) { $finalyr = $finalyr +1; }

          }
          
          if($rownum == 0) { echo "<td> $columnvalue </td>"; }
        } echo "</tr>";
      }  echo "</table>";
      
      echo "<h2>Total Member of this branch is =".($total/15)."</h2>";
      echo "</br> second year = &nbsp;  ".($secondyr/15)."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    Third year = &nbsp;".($thirdyr/15). " &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   final year =  &nbsp;&nbsp;&nbsp;&nbsp; ". ($finalyr/15) ;
  }

  }

?>

 </div>
</div>
</body></html>