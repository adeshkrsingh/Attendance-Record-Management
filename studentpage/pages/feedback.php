<?php include('content1.php');?>
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>FEEDBACK FORM</h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 style="font-size:30px; font-weight: bold; color: #555;">
                                We would love to hear your thoughts, concerns or problems about anything so we can improve!
                            </h2>
                            
                        </div>
                        <div class="body">
                            
                            
                            <form method="post" action="a.php" autocomplete="off">
                            <h3>What takes you here??</h3>
                            <div class="demo-checkbox">
                                
                                <input type="checkbox" id="basic_checkbox_1" name="takes[0]" value="Question" />
                                <label for="basic_checkbox_1">Question</label>
                                <input type="checkbox" name="takes[1]" id="basic_checkbox_2" value="Bug Report" />
                                <label for="basic_checkbox_2">Bug Report</label>
                                <input type="checkbox" name="takes[2]" id="basic_checkbox_3"  value="Suggestion"/>
                                <label for="basic_checkbox_3">Suggestion</label>
                            </div>
                            <div id="demo">
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group test">
                                        <h3>Ask any question or query??</h3>
                                            <div class="form-line">
                                                <textarea rows="4" class="form-control no-resize" name="t[0]"  placeholder="Please type what you want..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group test1">
                                        <h3>What is the bug??</h3>
                                            <div class="form-line">
                                                <textarea rows="4" class="form-control no-resize" name="t[1]"  placeholder="Please type what you want..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group test2">
                                        <h3>Feel free to give opinion??</h3>
                                            <div class="form-line">
                                                <textarea rows="4" class="form-control no-resize" name="t[2]" id="comment" placeholder="Please type what you want..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead >
                                  <tr style="border: 1px solid #000;">
                                    <th style="border: 1px solid #000;">&nbsp</th>
                                    <th class="text-center" style="border: 1px solid #000;"><bold>Very Satisfied</bold></th>
                                    <th class="text-center" style="border: 1px solid #000;"><bold>Satisfied</bold></th>
                                    <th class="text-center" style="border: 1px solid #000;"><bold>Neutral</bold></th>
                                    <th class="text-center" style="border: 1px solid #000;"><bold>Unsatisfied</bold></th>
                                    
                                  </tr>
                                </thead>
                                <tbody>
                                  
                                  <tr >
                                                    <th class="text-center" style="border: 1px solid #000;" scope="row">Timely Response</th>
                                                    <td class="text-center" style="border: 1px solid #000;"><input type="checkbox" name="rate[]" id="basic_checkbox"  value="1"/>
                                                                            <label for="basic_checkbox" ></label></td>
                                                    <td class="text-center" style="border: 1px solid #000;"><input type="checkbox" name="rate[]" id="basic_checkbox1" value="2" />
                                                                            <label for="basic_checkbox1"></label></td>
                                                    <td class="text-center" style="border: 1px solid #000;"><input type="checkbox" name="rate[]" id="basic_checkbox2" value="3" />
                                                                            <label for="basic_checkbox2"></label></td>
                                                    <td class="text-center" style="border: 1px solid #000;"><input type="checkbox" name="rate[]" id="basic_checkbox3" value="4" />
                                                                            <label for="basic_checkbox3"></label></td>
                                                  </tr>
                                                  <tr>
                                                    <th class="text-center" style="border: 1px solid #000;" scope="row">Ease Of Acess</th>
                                                    <td class="text-center" style="border: 1px solid #000;" ><input type="checkbox" name="rate[]" id="basic_checkbox4"  value="1"/>
                                                                            <label for="basic_checkbox4" ></label></td>
                                                    <td class="text-center" style="border: 1px solid #000;"><input type="checkbox" name="rate[]" id="basic_checkbox5" value="2" />
                                                                            <label for="basic_checkbox5"></label></td>
                                                    <td class="text-center" style="border: 1px solid #000;"><input type="checkbox" name="rate[]" id="basic_checkbox6" value="3" />
                                                                            <label for="basic_checkbox6"></label></td>
                                                    <td class="text-center" style="border: 1px solid #000;"><input type="checkbox" name="rate[]" id="basic_checkbox7" value="4" />
                                                                            <label for="basic_checkbox7"></label></td>
                                                  </tr>
                                                  <tr>
                                                    <th class="text-center" style="border: 1px solid #000;" scope="row"> User friendliness of interface</th>
                                                    <td class="text-center" style="border: 1px solid #000;"><input type="checkbox" name="rate[]" id="basic_checkbox8"  value="1"/>
                                                                            <label for="basic_checkbox8" ></label></td>
                                                    <td class="text-center" style="border: 1px solid #000;"><input type="checkbox" name="rate[]" id="basic_checkbox10" value="2" />
                                                                            <label for="basic_checkbox10"></label></td>
                                                    <td class="text-center" style="border: 1px solid #000;"><input type="checkbox" name="rate[]" id="basic_checkbox11" value="3" />
                                                                            <label for="basic_checkbox11"></label></td>
                                                    <td class="text-center" style="border: 1px solid #000;"><input type="checkbox" name="rate[]" id="basic_checkbox12" value="4" />
                                                                            <label for="basic_checkbox12"></label></td>
                                                  </tr>
                                                  
                                                  <tr>
                                                    <th class="text-center" style="border: 1px solid #000;"  scope="row">Overall Experience</th>
                                                    <td class="text-center" style="border: 1px solid #000;"><input type="checkbox" name="rate[]" id="basic_checkbox14"  value="1"/>
                                                                            <label for="basic_checkbox14" ></label></td>
                                                    <td class="text-center" style="border: 1px solid #000;"><input type="checkbox" name="rate[]" id="basic_checkbox15" value="2" />
                                                                            <label for="basic_checkbox15"></label></td>
                                                    <td class="text-center" style="border: 1px solid #000;"><input type="checkbox" name="rate[]" id="basic_checkbox16" value="3" />
                                                                            <label for="basic_checkbox16"></label></td>
                                                    <td class="text-center" style="border: 1px solid #000;"><input type="checkbox" name="rate[]" id="basic_checkbox17" value="4" />
                                                                            <label for="basic_checkbox17"></label></td>
                                                  </tr>
                                 
                                </tbody>
                                                        </table>
                        </div> 
                        <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group test">
                                        <h3>Feel free to add any other comments or suggestions:</h3>
                                            <div class="form-line">
                                                <textarea rows="1" class="form-control no-resize auto-growth" name="comment"  placeholder="Please type what you want..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                             <div class="text-center"><input type="submit" class="btn bg-cyan btn-lg  waves-effect" name="submit"> </div>       
                        </form>            
                        
                        </div>
                        </div>
                        </div>
                        </div>

                            

                            
                        
           
        </div>
    </section>

   
    <script src="plugins/jquery/jquery.min.js"></script>

   
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    
    <script src="plugins/node-waves/waves.js"></script>

    
    <script src="plugins/autosize/autosize.js"></script>

    
    <script src="plugins/momentjs/moment.js"></script>

    
    <script src="plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/forms/basic-form-elements.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
    //set initial state.
    $("#demo .test").hide();
    $("#demo .test1").hide();

$("#demo .test2").hide();

    $('#basic_checkbox_1').click(function() {
        if ($(this).is(':checked')) {
             
            $("#demo .test").show();
        }
        else{
            $("#demo .test").hide();
        }
        
    });
    $('#basic_checkbox_2').click(function() {
        if ($(this).is(':checked')) {
             
            $("#demo .test1").show();
        }
        else{
            $("#demo .test1").hide();
        }
        
    });
    $('#basic_checkbox_3').click(function() {
        if ($(this).is(':checked')) {
             
            $("#demo .test2").show();
        }
        else{
            $("#demo .test2").hide();
        }
        
    });
    
   
    
});
    </script>
</body>
</html>
