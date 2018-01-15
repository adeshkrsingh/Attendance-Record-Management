<?php

$conn=mysqli_connect("localhost","risinola_ironman","ironman123");
    $db=mysqli_select_db($conn,"risinola_academics");

$sql = "select * from notices ORDER BY id DESC";
        $result = $conn->query($sql);
                  
          if ($result->num_rows > 0)
          {         
            while($row = $result->fetch_assoc())
              {
             



      echo ' <div class="col-md-3 right-news" style="width : 100%; height : auto ; float : left;">
            <div class="panel panel-default panel-default-new">
               <div class="panel-heading panel-heading-left"> <b> Notice Title :'.' '. $row['noticetitle'] .'('.$row['dept'].')('.$row['audiance'].')'.'</b></div>
                    <div class="panel-body panel-body-bg circular">
                        <div class="row">
                            <div class="container-fluid">
                               '.  $row['noticecontent']  .'
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div> </br></br>';

   
            
              }
          }
?>