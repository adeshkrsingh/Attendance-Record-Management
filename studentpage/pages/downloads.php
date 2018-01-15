<?php include('content1.php'); ?>

<section class="content">
    <div class="container-fluid">
            <div class="block-header">
                <h2>Downloads</h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Previous Year Paper
                                <small>Here you will get previous year papers</small>
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
			                    <th>Branch</th>
			                    <th>Semester</th>
			                    <th>Downloads</th>
			                </tr>
                                    </tr>
                                </thead>
                                <tbody>
				 <?php 
				 $sql2 = "SELECT * from downloads WHERE dept='$dept' and sem='$sem'";
				 $result = $conn->query($sql2);
				 $sno = 0;
				  if($result)
				    {
				     if ($result->num_rows > 0)
				      {          
				       while($row = $result->fetch_assoc())
				        {  
				          
				          $sno = $sno+1; $detail= $row['detail']; $link= $row['link'];
				          $fileref = "/downloads/".$link;
				          echo "<tr><td> $sno </td> <td> $dept </td> <td> $sem </td> <td><a href='$fileref'> $detail </a></td></tr>";
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


<?php include('content2.php');?>