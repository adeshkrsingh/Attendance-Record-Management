<?php include('facultycontent.php') ?>
    
<div style="width:100%; height:15px;"></div>
          
          <ol class="breadcrumb">
            <li class="breadcrumb-item active"><i class="fa fa-tachometer" aria-hidden="true"></i>
              Dashboard </li>
          </ol>

          <div class="row" style="margin: 2px;">
            <div class="col-lg-3 ">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div style="font-size: 40px;">26</div>
                                        <div>New Comments!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>


            <div class="col-lg-3 ">
              <div class="panel panel-success">
                    <div class="panel-heading" style="background-color: #5cb85c; border-color: #5cb85c;color: white;">
                      <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div id="NoOfTask" style="font-size: 40px;"></div>
                                        <div>New Tasks!</div>
                                    </div>
                                </div>
                    </div>
                    <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                </div>
            </div>


            <div class="col-lg-3 ">
                        <div class="panel panel-primary" style=" border-color: #f0ad4e;">
                            <div class="panel-heading" style="background-color: #f0ad4e; border-color: #f0ad4e;color: white;">
                                <div class="row">
                                    <div class="col-xs-3">
                                        
                                        <i class="fa fa-calendar fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div style="font-size: 40px;" id="nooftute">
                                             <?php
                                              $co=mysqli_connect("localhost","risinola_ironman","ironman123");
                                              $db=mysqli_select_db($co, $UserDepartmentLoaded);

	                                      $totaltute = 0; $x ; $y ; $date1 = date_create("2015-10-10") ; $date2; 
	                                      $x = "SELECT * FROM tutemgmt WHERE userid='".$UserIdLoaded."'" ;
	                                     $result = $co->query($x);
                                              if ($result->num_rows > 0)
                                                 {   
                                           while($row = $result->fetch_assoc())
                                                            { 
	                                                        $totaltute = $totaltute + $row['nooftute'];
$x = $row['date'];
$date2=date_create($x);
$diff=date_diff($date1,$date2);
if($diff->format("%R%a days")>0) { $date1= $date2; $y=$x;}
//echo $diff->format("%R%a days");

                                                             }
                                                 }
echo $totaltute ;
?>
                                       </div>
                                        <div id="tutelastdate">Last tute date! <?php echo $y; ?> </div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
            <div class="col-lg-3 ">
                        <div class="panel panel-primary" style=" border-color: #d9534f;">
                            <div class="panel-heading" style="background-color: #d9534f; border-color: #d9534f;color: white;">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-calendar-check-o fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div style="font-size: 40px;">26</div>
                                        <div>Last Attendance Date</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
          </div>
          
          <div class="panel-group"   style="float:left; margin-left: 1%; width : 48%; background:#99ff66;">
	  <div class="panel panel-primary">
           <div class="panel-heading">To Do List / Reminder </div>
	 
          <div class="panel-body"  style="background:#99ff66;">
          	<div class="wrap" >
		<div id="todolist" class="task-list">
			<ul>

			<?php 
			   
			     $UserIdLoaded = $_SESSION["UserId"];
                 $UserDepartmentLoaded = $_SESSION["Department"];

                 $con=mysqli_connect("localhost","risinola_ironman","ironman123");
                 $db=mysqli_select_db($con,$UserDepartmentLoaded);
                // 
                $x = "SELECT * FROM tasks WHERE UserId"."='".$UserIdLoaded."' ORDER BY date ASC, time ASC" ;
				$r2= $con->query($x);
                           if ($r2->num_rows > 0)
                                       {          
                                     while($row = $r2->fetch_assoc())
                                            {

						$task_id = $row['id'];
						$task_name = $row['task'];

						echo '<li  id="'.$task_id.'" ><i id="'.$task_id.'"  class="fa fa-trash-o fa-lg delete-button"></i>
								
								   <span  id="'.$task_id.'" >'.$task_name.'</span>
							  </li>';
				}	
                            }
			?>
				
			</ul>
		</div>
		
		
		<form class="add-new-task" autocomplete="off"><div class="input-group margin-bottom-sm">
  <span class="input-group-addon"><i class="fa fa-paper-plane"></i></span>
  <input class="form-control" type="text" name="new-task" placeholder="Add a new item..." />
</div></form>

	</div><!-- #wrap -->
 </div>
 </div></div></div>
          
          <div style="float:right; margin-top:1%; margin-right:5%; box-shadow: ;border-color: 1px solid black;"><img src="<?php if(!empty($img)){echo $img;} else{echo $default;}?>"  width="300px" height="300px" ></div>
          

        </div>
        
		


      </div>
      
      </div>

</body>
<!-- JavaScript Files Go Here -->
	
	<script>
		
		add_task(); // Call the add_task function
		delete_task(); // Call the delete_task function

		function add_task() {

			$('.add-new-task').submit(function(){

				var new_task = $('.add-new-task input[name=new-task]').val();

				if(new_task != ''){

					$.post('f_add-task.php', { task: new_task }, function( data ) {

						$('.add-new-task input[name=new-task]').val('');

						$(data).appendTo('.task-list ul').hide().fadeIn();

						delete_task();
					});
				}
                                   $.ajax({
                                 url: "f_counttask.php",
                                 type:"POST", 
                                 data : {  },          
                                 success: function(result)
                                             {
                                             $("#NoOfTask").html(result);
                                             }
                                  });
                                  
				return false; // Ensure that the form does not submit twice
			});
		}

		function delete_task() {

			$('.delete-button').click(function(){

				var current_element = $(this);

				var id = $(this).attr('id');
                               
				
                                  $.ajax({
                                 url: "f_delete-task.php",
                                 type:"POST", 
                                 data : { task_id: id },          
                                 success: function(result)
                                             {
                                             $('#'+id).remove();
                                             }
                                     
                                  }); $('#'+id).remove();
                                 				
				$.ajax({
                                 url: "f_counttask.php",
                                 type:"POST", 
                                 data : {  },          
                                 success: function(result)
                                             {
                                             $("#NoOfTask").html(result);
                                             }
                                      
                                  });
                                return false;  
			});
		}

	</script>
	<script type="text/javascript">
        	$(document).ready(function()
        	{
        		 
                            $.ajax({
                                 url: "f_counttask.php",
                                 type:"POST", 
                                 data : {  },          
                                 success: function(result)
                                             {
                                             $("#NoOfTask").html(result);
                                             }
                                  });

                            

         	});
        </script>
</html>