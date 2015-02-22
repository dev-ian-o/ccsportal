<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php admin_confirm_logged_in()?>
<?php require_once("header.php"); 
                unset($_SESSION['fields']);
                unset($_SESSION['section']);
                unset($_SESSION['year']);
                unset($_SESSION['sort']);
                unset($_SESSION['course']);
                unset($_SESSION['teacher_rep']);
                unset($_SESSION['student_rep']);
?>
<div class="row-fluid">
     <div class="span10 offset1">
        <section class="widget">
            <header>
                        <h4>
                            <i class="icon-file-alt"></i>
                            Reports
                       </h4>
                    </header>
                    <form method="post">
                    <div class="body">  
                      <div class="row-fluid"> 
              
                            <legend class="section">
                        Student Records                                
                            </legend>
                            <div class="span4">
                        <div class="control-group">
                                <label class="control-label" for="simple-big">Sort</label>
                                <div class="controls controls-row">
                                    <select class="selectpicker span8" data-style="btn-primary" name="sort" tabindex="-1" id="sort" name="sort">
                                        <option value="all" />All
                                        <option value="peryear"/>Per Year
                                        <option value="percourse"/>Per Course 
                                        <option value="peryrandsec"/>Per Cousre,Year and Section
                                    </select>
                                  </div>
                              </div>
                              <span id="addSelect"></span>
                      </div>
                      <div class="span4">
                      <fieldset>


                <div class="control-group">
                                <label class="control-label">Fields</label>
                                <div class="controls">
                                      <label class="checkbox">
                                          <input type="checkbox" id="checkbox-1" checked="checked" class="uniform" disabled=""  name="fields[]" value="student_no">
                                        Student No.  
                                        </label>
                                      <label class="checkbox">
                                          <input type="checkbox" id="checkbox-2" checked="checked" class="uniform" disabled="" name="fields[]" value="name">
                                          Name
                                      </label>
                                      <label class="checkbox">
                                          <input type="checkbox" id="checkbox-3" checked="checked" class="uniform" disabled="" name="fields[]" value="yr">
                                          Year
                                      </label>
                                      <label class="checkbox">
                                          <input type="checkbox" id="checkbox-4" checked="checked" class="uniform" disabled="" name="fields[]" value="section">
                                          Section
                                      </label>
                                      <label class="checkbox">
                                          <input type="checkbox" id="checkbox-5" class="uniform" name="fields[]" value="gender">
                                          Gender
                                      </label>
                                      <label class="checkbox">
                                          <input type="checkbox" id="checkbox-6" class="uniform" name="fields[]" value="dob">
                                          Birthday
                                      </label>
                                      <label class="checkbox">
                                          <input type="checkbox" id="checkbox-7" class="uniform" name="fields[]" value="contact_no">
                                          Contact No.
                                      </label>
                                      <label class="checkbox">
                                          <input type="checkbox" id="checkbox-9" class="uniform" name="fields[]" value="add_no,add_street,add_brgy,add_city">
                                          Address
                                      </label>
                                      <label class="checkbox">
                                          <input type="checkbox" id="checkbox-8" class="uniform" name="fields[]" value="course">
                                          Course
                                      </label>
                                      <label class="checkbox">
                                          <input type="checkbox" id="checkbox-8" class="uniform" name="fields[]" value="password">
                                          Password
                                      </label>                             
                                </div>
                            </div>


                          </fieldset>     
                      </div>
                      <input type="hidden" name="student_rep" value="student_rep">
                      <div class="span2">
                         <button type="submit" class="btn btn-success" name="submit"><i class="icon-print"></i>Print</button>
                      </div>
                      </div>
                    </form>   

                    </div>
                    <form method="post">
                    <div class="body">  
                      <div class="row-fluid"> 
              
                            <legend class="section">
                        Teacher Records                                
                            </legend>
                            <div class="span4">
                        <div class="control-group">
                                <label class="control-label" for="simple-big">Sort</label>
                                <div class="controls controls-row">
                                    <select class="selectpicker span8" data-style="btn-primary" name="sort" tabindex="-1" id="sort" name="sort">
                                        <option value="all" />All
                                    </select>
                                  </div>
                              </div>
                              <span id="addSelect"></span>
                      </div>
                      <div class="span4">
                      <fieldset>


                <div class="control-group">
                                <label class="control-label">Fields</label>
                                <div class="controls">
                                      <label class="checkbox">
                                          <input type="checkbox" id="checkbox-1" checked="checked" class="uniform" disabled=""  name="fields[]" value="employee_no">
                                        Employee No.  
                                        </label>
                                      <label class="checkbox">
                                          <input type="checkbox" id="checkbox-2" checked="checked" class="uniform" disabled="" name="fields[]" value="name">
                                          Name
                                      </label>
                                      <label class="checkbox">
                                          <input type="checkbox" id="checkbox-5" class="uniform" name="fields[]" value="gender">
                                          Gender
                                      </label>
                                      <label class="checkbox">
                                          <input type="checkbox" id="checkbox-6" class="uniform" name="fields[]" value="dob">
                                          Birthday
                                      </label>
                                      <label class="checkbox">
                                          <input type="checkbox" id="checkbox-7" class="uniform" name="fields[]" value="contact_no">
                                          Contact No.
                                      </label>
                                      <label class="checkbox">
                                          <input type="checkbox" id="checkbox-9" class="uniform" name="fields[]" value="add_no,add_street,add_brgy,add_city">
                                          Address
                                      </label>
                                      <label class="checkbox">
                                          <input type="checkbox" id="checkbox-9" class="uniform" name="fields[]" value="emailadd">
                                          Email Address
                                      </label>
                                      <label class="checkbox">
                                          <input type="checkbox" id="checkbox-8" class="uniform" name="fields[]" value="password">
                                          Password
                                      </label>                             
                                </div>
                  </div>


                          </fieldset>     
                      </div>
                      <input type="hidden" name="teacher_rep" value="teacher_rep">
                      <div class="span2">
                         <button type="submit" class="btn btn-success" name="submit"><i class="icon-print"></i>Print</button>
                      </div>
                      </div>
                    </form>   


            </section>
     </div>
</div>





<?php require_once("footer.php");?> 
<?php
        if(isset($_POST['submit']))
        {
            unset($_SESSION['fields']);
            unset($_SESSION['section']);
            unset($_SESSION['year']);
            unset($_SESSION['sort']);
            unset($_SESSION['course']);
            unset($_SESSION['teacher_rep']);
            if(isset($_POST['fields'])){$_SESSION['fields'] = $_POST['fields'];}
            if(isset($_POST['section'])){$_SESSION['section'] = $_POST['section'];}
            if(isset($_POST['course'])){$_SESSION['course'] = $_POST['course'];}
            if(isset($_POST['year'])){$_SESSION['year'] = $_POST['year'];}
            if(isset($_POST['sort'])){$_SESSION['sort'] = $_POST['sort'];}
            if(isset($_POST['teacher_rep'])){$_SESSION['teacher_rep'] = $_POST['teacher_rep'];}
            if(isset($_POST['student_rep'])){$_SESSION['student_rep'] = $_POST['student_rep'];}
        redirect_2("print.php");            
        }
?>
<script type="text/javascript">
    $("document").ready(function(){

      print = '<div class="control-group">';
      print += '<label class="control-label" for="simple-big">Year:</label>';
    print += '<div class="controls controls-row">';
    print += '<select class="selectpicker span4" data-style="btn-primary" name="year" tabindex="-1" id="sort">';
    print += '<option value="first">First</option>';
    print += '<option value="second">Second</option>';
    print += '<option value="third">Third</option>';
    print += '<option value="fourth">Fourth</option>';
    print += '</select>';
        print += '</div>';
        print += '</div>';  

      print1 = '<div class="control-group">';
      print1 += '<label class="control-label" for="simple-big">Section:</label>';
    print1 += '<div class="controls controls-row">';
    print1 += '<select class="selectpicker span4" data-style="btn-primary" name="section" tabindex="-1" id="sort">';
    print1 += '<option value="A">A</option>';
    print1 += '<option value="B">B</option>';
    print1 += '<option value="C">C</option>';
    print1 += '</select>';
        print1 += '</div>';
        print1 += '</div>'; 
    
    print2 = '<div class="control-group">';
      print2 += '<label class="control-label" for="simple-big">Course:</label>';
    print2 += '<div class="controls controls-row">';
    print2 += '<select class="selectpicker span4" data-style="btn-primary" name="course" tabindex="-1" id="sort">';
    print2 += '<option value="BS Information Technology major in Service Management">ITSM</option>';
      print2 += '<option value="BS Computer Science">CSAD</option>';
      print2 += '<option value="BS Computer Network Administration">CNA</option>';
    print2 += '</select>';
        print2 += '</div>';
        print2 += '</div>'; 
    

         $("#sort").change(function() {
          value = $(this).val();
               if(value == "peryear")
               {
                  $("#addSelect").html(""); 
                  $("#addSelect").html(""+print+"");              
               }
               else if (value == "peryrandsec")
               {
                  $("#addSelect").html(""); 
                  $("#addSelect").html(""+print+print1+print2+"");              
               }
               else if(value == "percourse")
               {
                  $("#addSelect").html(""); 
                  $("#addSelect").html(""+print2+"");
               }
               else
               {
                  $("#addSelect").html("");
               }  

             });

        

          
            
    });

</script>

</body></html>
