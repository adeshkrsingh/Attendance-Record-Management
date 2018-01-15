<?php include('facultycontent.php') ;  ?>
 <div style="width :100%; height : 15px;"></div>
<meta charset="UTF-8">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css"/>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>


<div>						
                                        <div class="form-group col-sm-6" style="padding-left:0px;">
							
							<label for="department">DEPARTMENT</label>
							<select name="department" id="department" class="form-control">
                             <option value="none">--Select--</option>
                             <option value="it">Information Technology (IT)</option>
                             <option value="ce">Civil Engineering (CE)</option>
                             <option value="cs">Computer Science and Engineering(CSE)</option>
                             <option value="me">Mechanical Engineering (ME)</option>
                             <option value="ch">Chemical Engineering (CH)</option>
                             <option value="ec">Electronics and Communication Engineering (EC)</option>
                             <option value="ee">Electrical Engineering (EE)</option>
                           </select>
                            </div>
							
							<div class="form-group col-sm-6" style="padding-left:0px;"> 
							<label for="Subjectcode">SUBJECT CODE</label>
							<select class="form-control" id="Subjectcode" name="Subjectcode">
							</select>
							</div>
</div> 
<div class="text-center">
<button name="submit" id="submit" class="btn btn-primary "><span id="status"> Show Assignments </span> </button>
</div>

<br></br>
<table id="tbshowtute" class="table-responsive table table-bordered, table-hover" style="padding-top:20px; margin-left:10px; margin-right:10px;">
            <thead>
                <tr>
                    <th>SNo.</th>
                    <th>TEACHER</th>
                    <th>SUBJECT</th>
                    <th>POST DATE</th>
                    <th>LAST DATE</th>
                    <th>DESCRIPTION</th>
                    <th>DOWNLOAD</th>
                </tr>
            </thead>
           <tbody id="tbbody">
          </tbody>
</table>

<div id="test"></div>
 <script type="text/javascript">
        	$(document).ready(function()
        	{
        		   $( "#department" ).change(function() 
        		      { 
                        
                         $('#Subjectcode').find('option').remove();
                        if(this.value == 'none') 
                        	{ $("#Subjectcode").prop('disabled', 'disabled'); $("#submit").prop('disabled', 'disabled'); }
                        else 
                        	{ $("#Subjectcode").prop('disabled', false);  $("#submit").prop('disabled', false); 
                         
                            $.ajax({
                                 url: "f_searchsubfortute.php",
                                 type:"POST", 
                                 data : { 'department' : this.value },          
                                 success: function(result)
                                             {
                                             $("#Subjectcode").html(result);
                                             }
                                  });

                            }

                      });
                    });
                    
                    $(document).ready(function()
        	{
                      
                      $('#submit').click(function()
                       {   $('#status').html('Loading...');  $( "#status" ).fadeIn( 1000, function() {  }); $( "#status" ).fadeOut( 3000, function() {  });
                            $( "#status" ).fadeIn( 1000, function() {  $('#status').html('Show Assignment');  }); 
                           var dept = $("#department").val();
                           var subcode = $("#Subjectcode").val();
                            $.ajax({
                                 url: "f_tute_generatetb.php",
                                 type:"POST", 
                                 data : { 'department' : dept, 'Subjectcode' : subcode, },          
                                 success: function(result)
                                             {
                                             $('#tbbody').html(result);
                                             }
                                  });  
                                
                       });

        		 

         	});
        </script>



  

