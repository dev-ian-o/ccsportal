
    <form class="form-horizontal label-left" method="post" data-validate="parsley" novalidate="novalidate" id="form_newacc" enctype="multipart/form-data"/>
                        <fieldset> 
                            <legend class="section">
                            </legend>

                            <div class="control-group">
                                <label class="control-label" for="simple-big">Image:</label>
                                <div class="controls controls-row">
                                        <input name="file" type="file" class="btn-file" id="userfile"/>  
                                  
                                </div>
                            </div>
                            <br>
                            <div class="control-group">
                                <label class="control-label" for="basic">Student Number:</label>
                                <div class="controls">
                                    <input type="text" id="basic" name="student_no" required="required" data-minlength="8" data-maxlength="8" value=<?php if(isset($_POST['student_no'])){ echo "'".$_POST['student_no']."'";}?>>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="basic">First Name:</label>
                                <div class="controls">
                                    <input type="text" id="basic" name="firstname" required="required"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="basic">Middle Name:</label>
                                <div class="controls">
                                    <input type="text" id="basic" name="middlename" required="required"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="basic">Last Name:</label>
                                <div class="controls">
                                    <input type="text" id="basic" name="lastname" required="required"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="basic">Birthday</label>
                                <div class="controls">
                                    <input type="date" id="basic" name="bday" required="required"/>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="simple-big">Gender</label>
                                <div class="controls controls-row">
                                    <select class="selectpicker span2" data-style="btn-primary" name="gender" tabindex="-1" id="simple-big">
                                        <option value="Male"/>Male
                                        <option value="Female"/>Female
                                    </select>
                                </div>
                            </div>
                            <legend class="section" style="color:Black;">
                                Address
                            </legend>

                            <div class="control-group">
                                <label class="control-label" for="basic">Street No.</label>
                                <div class="controls">
                                    <input type="number" id="basic" name="stno" required="required"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="basic">Street</label>
                                <div class="controls">
                                    <input type="text" id="basic" name="st" required="required"/>
                                </div>
                            </div>  
                            <div class="control-group">
                                <label class="control-label" for="basic">Barangay</label>
                                <div class="controls">
                                    <input type="text" id="basic" name="brgy" required="required"/>
                                </div>
                            </div>  
                            <div class="control-group">
                                <label class="control-label" for="basic">City</label>
                                <div class="controls">
                                    <input type="text" id="basic" name="city" required="required"/>
                                </div>
                            </div>
                            <legend class="section">
                            </legend>
                            <div class="control-group">
                                <label class="control-label" for="basic">Contact Number<br><small>(Start with "09")</small></label>
                                <div class="controls">
                                    <input type="number" id="basic" name="contactno" required="required" data-minlength="11" data-maxlength="11"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="simple-big">Course</label>
                                <div class="controls controls-row">
                                    <select class="selectpicker span5" data-style="btn-primary" name="course" tabindex="-1" id="simple-big">
                                        <option value="bsit"/>BS Information Technology 
                                        <option value="bscs"/>BS Computer Science
                                        <option value="bsnetad"/>BS Network Administration
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="simple-big">Year</label>
                                <div class="controls controls-row">
                                    <select class="selectpicker span2" data-style="btn-primary" name="year" tabindex="-1" id="simple-big">
                                        <option value="first"/>1st
                                        <option value="second"/>2nd
                                        <option value="third"/>3rd
                                        <option value="fourth"/>4th
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="simple-big">Section</label>
                                <div class="controls controls-row">
                                    <select class="selectpicker span2" data-style="btn-primary" name="section" tabindex="-1" id="simple-big">
                                        <option value="A"/>A
                                        <option value="B"/>B
                                        <option value="C"/>C
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-actions">
                            <button type="submit" name="submit" class="btn btn-primary">Validate &amp; Submit</button>                           
                        </div>
</form>


<?php
if(isset($_POST['submit']))
    {

        $valid = true;
        $query = "SELECT student_no FROM tblstudent";        
        $result = @mysql_query($query);
        while($row = mysql_fetch_array($result))
        {
            if($row[0] == $_POST['student_no'])
            {
                $valid = false;
                echo "Invalid number student number(already exist)";
                break;
            }    
        }    


        if((!empty($_POST['student_no'])) && ($valid) && (!empty($_POST['firstname'])) && (!empty($_POST['lastname'])) 
            && (!empty($_POST['middlename'])) && (!empty($_POST['bday'])) && (!empty($_POST['gender'])) && (!empty($_POST['stno'])) 
            && (!empty($_POST['st'])) && (!empty($_POST['brgy'])) && (!empty($_POST['city'])) && (!empty($_POST['contactno'])) 
            && (!empty($_POST['course'])) && (!empty($_POST['year'])) && (!empty($_POST['contactno'])))
        {
            echo "work";
            $lastname = $_POST['lastname'];
            $firstname = $_POST['firstname'];
            $middlename = $_POST['middlename'];
            $dob = $_POST['bday'];
            $add_no = $_POST['stno'];
            $add_str = $_POST['st'];
            $add_brgy = $_POST['brgy'];
            $city= $_POST['city'];
            $contactno = $_POST['contactno'];
            $gender = $_POST['gender'];
            $student_no = $_POST['student_no'];
            $yr = $_POST['year'];
            $section = $_POST['section'];
            $password = rtnEncrypt(randomPassword());    
            $image = upload_pic(random_string());    
            echo $image;
            if($_POST['course']=="bsit")
            {
                $course = "BS Information Technology major in Service Management";
            }   
            else if($_POST['course']=="bscs")
            {
                $course = "BS Computer Science";
            }
            else
            {
                $course = "BS Network Administrator";
            }   
            $query = "INSERT INTO tblstudent
            (lastname,firstname,middlename,dob,add_no,add_street,add_brgy,add_city,contact_no,gender,student_no,yr,section,course,password,image)
            VALUES  ('$lastname','$firstname','$middlename','$dob','$add_no','$add_str','$add_brgy','$city','$contactno','$gender','$student_no','$yr','$section','$course','$password','$image')";
            $result = @mysql_query($query);
            // print "<script>window.location = 'ua_student.php';</script>";
        }

    }
?>