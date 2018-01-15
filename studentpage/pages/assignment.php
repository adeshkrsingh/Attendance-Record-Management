<?php include('content1.php') ;  ?>
 <section class="content">
    <div class="container-fluid">
            <div class="block-header">
                <h2>ASSIGNMENT</h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ASSIGNMENT TILL DATE
                                <small>Here you will get all assignment</small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <tr>
			                    <th>SNo.</th>
			                    <th>TEACHER</th>
			                    <th>SUBJECT</th>
			                    <th>POST DATE</th>
			                    <th>LAST DATE</th>
			                    <th>DESCRIPTION</th>
			                    <th>DOWNLOAD</th>
                			</tr>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
               
 $tutetb = $dept."_tute";
 
 $sql2 = "SELECT * from $tutetb WHERE semester= "."'".$sem ."'";
 $result = $conn->query($sql2);
  if($result)
    {
     if ($result->num_rows > 0)
      {          
       while($row = $result->fetch_assoc())
        {  
$sno= $row['SNo']; $teacher= $row['teacher']; $subcode= $row['subcode']; $postdate= $row['postd']; $lastdate= $row['lastds']; $desc= $row['content']; $file= $row['file'];

$fileref = "/assignment/".$dept."/".$subcode."/".$file;

          echo '<tr><td>'.$sno.' </td><td>'.$teacher .'</td><td>'.$subcode .'</td><td>'.$postdate .'</td><td>'.$lastdate .'</td><td>'.$desc .'</td><td><a href='.$fileref.'>'.$file.'</a></td></tr>';
        }
      }
   }
   ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>
 </section>   
 
<?php include('content2.php') ;  ?>