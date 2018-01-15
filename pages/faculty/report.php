<?php include('facultycontent.php');?>

<div style="width : 100%; height : 12px; "></div>
 <form method="post" style="margin-left : 50px" action="showreportgenerated.php" >
          <select name="department" id="department" class="custom-select form-control" style="width: 22%; float: left;">
             <option value="none">--Select Department--</option>
             <option value="it">Information Technology (IT)</option>
             <option value="ce">Civil Engineering (CE)</option>
             <option value="cs">Computer Science and Engineering(CSE)</option>
             <option value="me">Mechanical Engineering (ME)</option>
             <option value="ch">Chemical Engineering (CH)</option>
             <option value="ec">Electronics and Communication Engineering (EC)</option>
             <option value="ee">Electrical Engineering (EE)</option>
             <option value="ash">Applied Science and Humanities</option>
          </select>

          <select class="form-control" name="choose" id="subjectname" style="margin-left: 10px ; width: 22% ; float: left;">  
          </select>
      
          <input type="date" id="date1" class="form-control" name="strt" style="margin-left: 10px ; width: 22%; float: left;" />
          <input type="date" id="date2" class="form-control" name="last" style="margin-left: 10px ; width: 22%; float: left;" />
  
  <input type="submit" name="sub" id="sub" class="btn btn-primary"  value="Show" style="margin-left: 10px ; width: 8%; float: left;" />
</form>

 <span id="Status" style="margin-left: 10px; font-weight: bold;  "> </span>
<br/></br>

     <div id="attendencepage" >
     
     
        <script type="text/javascript">
        	$(document).ready(function()
        	{
        		  $('#subjectname').prop('disabled', 'disabled');
        		  $('#date1').prop('disabled', 'disabled');
        		  $('#date2').prop('disabled', 'disabled');
        		  $('#sub').prop('disabled', 'disabled');
                  
        		   $( "#department" ).change(function() 
        		      { 
                         $("#attendencepage").html('');
                         $('#subjectname').find('option').remove();
                        if(this.value == 'none') 
                        	{ $("#subjectname").prop('disabled', 'disabled'); $("#date1").prop('disabled', 'disabled'); $("#date2").prop('disabled', 'disabled'); $("#sub").prop('disabled', 'disabled'); }
                        else 
                        	{ $("#subjectname").prop('disabled', false); 
                         
                            $.ajax({
                                 url: "f_searchsub.php",
                                 type:"POST", 
                                 data : { 'department' : this.value },          
                                 success: function(result)
                                             {
                                             $("#subjectname").html(result);
                                             }
                                  });

                            }

                      });
                      
                      $( "#subjectname" ).click(function() 
        		      {
        		          $("#date1").prop('disabled', false); $("#date2").prop('disabled', false); $("#sub").prop('disabled', false); 
        		      }
        		);

        		  $('#updt').Click(function()
        		    {
                      ('#Status').html("Uploading...");
        		    });

         	})
        </script>

</body>
</html>