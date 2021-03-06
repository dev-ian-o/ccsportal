<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("header.php"); unset($_SESSION['edit_id'])?>



<div class="row-fluid">
            <div class="span8 offset2">
                <section class="widget">
                    <header>
                
                        <h4>
                            <i class="icon-file-alt"></i>
                            User Accounts<strong> | Teachers</strong><small> (Add Account)</small>
                        <span class="pull-right">
                            <a href="ua_teacher.php" class="btn btn-warning" id="btnAddNew"><i class="icon-undo"></i> Back to Teacher Users</a>
                        </span>                            
                       </h4>
                    </header>
                    <div class="body">

    <form class="form-horizontal label-left" method="post" data-validate="parsley" novalidate="novalidate" id="form_newacc" enctype="multipart/form-data"/>
                        <fieldset> 
                            <legend class="section">
                            </legend>
                            <br>
                            <div class="control-group">
                                <label class="control-label" for="basic">Employee Number:</label>
                                <div class="controls">
                                    <input type="text" id="basic" name="employee_no" required="required" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="basic">First Name:</label>
                                <div class="controls">
                                    <input type="text" id="basic" name="firstname" required="required" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="basic">Middle Name:</label>
                                <div class="controls">
                                    <input type="text" id="basic" name="middlename" required="required" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="basic">Last Name:</label>
                                <div class="controls">
                                    <input type="text" id="basic" name="lastname" required="required" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="basic">Birthday</label>
                                <div class="controls">
                                    <input type="date" id="basic" name="bday" required="required" />
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
                                    <input type="text" id="basic" name="st" required="required" />
                                </div>
                            </div>  
                            <div class="control-group">
                                <label class="control-label" for="basic">Barangay</label>
                                <div class="controls">
                                    <input type="text" id="basic" name="brgy" required="required" />
                                </div>
                            </div>  
                            <div class="control-group">
                                <label class="control-label" for="basic">City</label>
                                <div class="controls">
                                    <input type="text" id="basic" name="city" required="required" />
                                </div>
                            </div>
                            <legend class="section">
                            </legend>
                            <div class="control-group">
                                <label class="control-label" for="basic">Contact Number</label>
                                <div class="controls">
                                    <input type="number" id="basic" name="contactno" required="required" />
                                </div>
                            </div>
                            <div class="control-group">
                            <label class="control-label" for="basic">Email Address</label>
                                    <div class="controls">
                                        <input id="email" type="email" id="basic" data-trigger="change" required="required" class="span6 parsley-validated parsley-success" name="email">
                                    </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="simple-big">Image:</label>
                                <div class="controls controls-row">
                                    <span class="btn btn-small fileinput-button">
                                        <i class="icon-plus"></i>
                                        <span>Choose Image</span>
                                        <input name="file" type="file"  id="userfile"/>  
                                    </span>
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

        if((!empty($_POST['employee_no'])) && (!empty($_POST['firstname'])) && (!empty($_POST['lastname'])) && (!empty($_POST['middlename'])) && (!empty($_POST['bday'])) && (!empty($_POST['gender'])) && (!empty($_POST['stno'])) && (!empty($_POST['st'])) && (!empty($_POST['brgy'])) && (!empty($_POST['city'])) && (!empty($_POST['email'])) && (!empty($_POST['contactno'])))
        {
            $lastname = $_POST['lastname'];
            $firstname = $_POST['firstname'];
            $middlename = $_POST['middlename'];
            $dob = $_POST['bday'];
            $add_no = $_POST['stno'];
            $add_street = $_POST['st'];
            $add_brgy = $_POST['brgy'];
            $add_city= $_POST['city'];
            $contactno = $_POST['contactno'];
            $gender = $_POST['gender'];
            $employee_no = $_POST['employee_no'];
            $password = rtnEncrypt(randomPassword());
            $filename = random_string();
            $emailadd = $_POST['email'];
            $image = upload_pic($filename); 
            
            addua_teacher($lastname,$firstname,$middlename,$dob,$add_no,$add_street,$add_brgy,$add_city,$contactno,$gender,$employee_no,$password,$image,$emailadd);
            print "<script>window.location = 'ua_teacher.php';</script>";
        }

    }
?>

<?php require_once("footer.php"); ?>
</div></section></div></div></body></html>