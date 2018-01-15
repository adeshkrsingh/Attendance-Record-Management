<?php  include('content1.php');   ?>


<section class="content">

<!-- scholarship section start  -->
    <div class="container-fluid">
            
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Post Your Question
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
                        <div class="body">
                                   <form class="form-horizontal" method="post" action="ques.php">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">TOPIC NAME</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="title" class="form-control" placeholder="Enter topic name">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">POST</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea rows="1" name="content" class="form-control no-resize auto-growth" placeholder="Please type what you want... And please don't forget the ENTER key press multiple times :)" style="overflow: hidden; word-wrap: break-word; height: 32px;"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <input type="submit" name="submit" class="btn btn-primary m-t-15 waves-effect" value="Post">
                                    </div>
                                </div>
                            </form>

                            
                        </div>
                    </div>
                </div>
            </div> 
    </div>
<!-- scholarship section ends   -->


</section>

<?php  include('content2.php');   ?>