<?php include('content1.php'); ?>
<section class="content">
    <div class="container-fluid">
            <div class="block-header">
                <h2>TABS</h2>
            </div>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" role="form" >
 <div class="col-sm-6"  style="margin-top: 10px ;">
   <select class="form-control show-tick" name="subcode">

<?php 
 $sql2 = "SELECT * from syllabus";
 $result = $conn->query($sql2);
 $sno = 0;
  if($result)
    {
     if ($result->num_rows > 0)
      {          
       while($row = $result->fetch_assoc())
        {  
          
          $sno = $sno+1; $id= $row['id']; $subjectcode= $row['subjectcode'];
          
          echo "<option value='$id'> $subjectcode  </option>";
        }
      }
   }
   ?>
        </select>
       </div>  
        <div class="col-sm-6">
           <input type="submit" name="submit" id="submit" class="btn btn-primary"  value="Show" style="margin-top: 10px ; width: 150px; float: left;" /> 
        </div>
     </form>          


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  $SubmitValue= $_POST['submit'];
   $id= $_POST['subcode'];

  If($SubmitValue=="Show")
  {
   $sql2 = "SELECT * from syllabus where id='".$id."'";
   $result = $conn->query($sql2);
   $sno = 0;
    if($result)
      {
     if ($result->num_rows > 0)
        {          
       while($row = $result->fetch_assoc())
          {  
          
            $detail= $row['detail'];
            echo "</br></br>";
            echo '<div class="card"  style="margin-top: 10px ; margin-left: 10px ; margin-right: 10px ; text-align: justify ;">';
            echo "<p style='padding:5px;'> $detail </p>";
            echo "</div>";
          }
        }
      }
  }
}

?>

</div>

<br>
<!-- notice section start  -->
    <div class="container-fluid">
            
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                BIET Official Prescribed Syllabus
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Enlarge/Small</a></li>
                                        <li><a href="javascript:void(0);">Remove it</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <iframe width="100%" src="http://anujtestmodule.online/studentpage/pages/bietsyllabuslist.php" frameborder="0" scrolling="yes" style="border: none; overflow-y: auto; overflow-x: hidden; min-height: 490px;"></iframe>

                        </div>
                    </div>
                </div>
            </div> 
    </div>
<!-- notice section ends   -->



</section>
<?php include('content2.php');?>