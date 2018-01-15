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
      $dept= $_POST['dept'];
      $x = new Admin();
      $array2D = $x->getstructuretable("risinola_academics", "logindetail");
      echo "<table  class='table table-bordered' style='height: auto;'>";
      foreach ($array2D as $rownum => $rowvalue) { echo "<tr>";
        foreach ($rowvalue as $index => $columnvalue) {
        	if (($index == 2) || ($index == 3)) { continue ; }
          if($rowvalue[6]==$dept) { echo "<td> $columnvalue </td>"; }
          if($rownum == 0) { echo "<td> $columnvalue </td>"; }
        } echo "</tr>";
      }  echo "</table>";
  }

  }

?>

 </div>
</div>
</body></html>