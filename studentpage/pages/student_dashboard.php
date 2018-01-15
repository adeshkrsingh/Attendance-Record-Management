<?php  include('content1.php');   ?>


<section class="content">

<!-- block section starts  -->

	<div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>
		<div class="row clearfix">
		                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		                    <div class="info-box bg-pink hover-expand-effect">
		                        <div class="icon">
		                            <i class="material-icons">playlist_add_check</i>
		                        </div>
		                        <div class="content">
		                            <div class="text">TOTAL ASSIGNMENT</div>
		                           
		                             <?php
                                             

	                                       $totaltute = 0;  $tutetable = $dept."_tute";
	                                        $x = "SELECT * FROM ".$tutetable." WHERE semester='".$sem."'" ;
	                                      
	                                       $result = $conn->query($x);
                                              if ($result->num_rows > 0)
                                                     {   
                                                    while($row = $result->fetch_assoc())
                                                            { 
	                                                        $totaltute = $totaltute + 1;
                                                                 
                                                            }
                                                     }
                                                                
                                              ?>
		                            <div class="number count-to" data-from="0" data-to="<?php echo $totaltute ; ?>" data-speed="1" data-fresh-interval="1"></div>
		                        </div>
		                    </div>
		                </div>
		                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		                    <div class="info-box bg-cyan hover-expand-effect">
		                        <div class="icon">
		                            <i class="material-icons">help</i>
		                        </div>
		                        <div class="content">
		                            <div class="text">NEW NOTICES</div>
		                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"></div>
		                        </div>
		                    </div>
		                </div>
		                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		                    <div class="info-box bg-light-green hover-expand-effect">
		                        <div class="icon">
		                            <i class="material-icons">forum</i>
		                        </div>
		                        <div class="content">
		                            <div class="text">NEW COMMENTS</div>
		                            <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"></div>
		                        </div>
		                    </div>
		                </div>
		                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		                    <div class="info-box bg-orange hover-expand-effect">
		                        <div class="icon">
		                            <i class="material-icons">school </i>
		                        </div>
		                        <div class="content">
		                            <div class="text">Total Strength</div>
		                           
		                             <?php
		                              $totalstudents ;
                                        $dbn="risinola_student";
                                        $mysql_host="localhost"; $mysql_user="risinola_ironman"; $mysql_password="ironman123";
                                        $conn= new mysqli($mysql_host, $mysql_user, $mysql_password, $dbn);
                                        @mysqli_select_db($dbn);
                                        $sq = "select COUNT(*) AS id from studentlogin WHERE dept='".$dept."' and semester='".$sem."'";
                                        $res = $conn->query($sq);
                                        $data=mysqli_fetch_array($res);
                                        if($res)
                                              {
             	                             $totalstudents = $data['id'];
                                               }
                                         
                                         else
                                             {
                                              $totalstudents = 0;
                                             }
                                             ?>
                                             
		                            <div class="number count-to" data-from="0" data-to="<?php echo $totalstudents ;  ?>" data-speed="10" data-fresh-interval="5"></div>
		                        </div>
		                    </div>
		                </div>
		            </div>

          
</div>
<!-- block section ends  -->

<!-- notice section start  -->
    <div class="container-fluid">
            
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                BIET Official Page Notices
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
                            <iframe width="100%" src="http://anujtestmodule.online/studentpage/pages/bietnotices.php" frameborder="0" scrolling="yes" style="border: none; overflow-y: auto; overflow-x: hidden; min-height: 490px;"></iframe>

                        </div>
                    </div>
                </div>
            </div> 
    </div>
<!-- notice section ends   -->


<!-- downloads section start  -->
    <div class="container-fluid">
            
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                BIET Official Page Quick Downloads
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
                            <iframe width="100%" src="http://anujtestmodule.online/studentpage/pages/bietdownloads.php" frameborder="0" scrolling="yes" style="border: none; overflow-y: auto; overflow-x: hidden; min-height: 490px;"></iframe>

                        </div>
                    </div>
                </div>
            </div> 
    </div>
<!-- downloads section ends   -->

</section>

<?php  include('content2.php');   ?>