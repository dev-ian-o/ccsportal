<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php admin_confirm_logged_in()?>
<?php require_once("header.php"); ?>
<div class="row-fluid">
            <div class="span8 offset2">
                <section class="widget">
                    <header>
                
                        <h4>
                            <i class="icon-file-alt"></i>
                            Schedule
                       </h4>
                    </header>
                    <div class="body">
					   <form class="form-horizontal label-left" method="post" data-validate="parsley" novalidate="novalidate" id="form_newacc" enctype="multipart/form-data"/>
							<fieldset> 
					                            <legend class="section">Add School Year
					                            </legend>
					                            <br>
					                            <div class="control-group">
					                                <label class="control-label" for="basic">School Year :</label>
					                                <div class="controls">
					                                	<input type="text" name="school_year" required="required" placeholder="YYYY-YYYY" />
					                                </div>
					                            </div>

					                            <div class="form-actions">
                            						<button type="submit" name="submit" class="btn btn-primary">Validate &amp; Submit</button>
                        						</div>
							</fieldset>
						</form>
					</div>
				</section>
			</div>
</div>

<?php
if(isset($_POST['submit']))
{
	if($_POST['school_year'] != "")
	{	
		$school_year = $_POST['school_year'];
		$query = "INSERT INTO tblschool_year(school_year)
        VALUES  ('$school_year')";
        $result = @mysql_query($query);
    }
}
?>

<div class="row-fluid">
            <div class="span8 offset2">
                <section class="widget">
                    <header>
                
                        <h4>
                            <i class="icon-file-alt"></i>
                            Schedule
                       </h4>
                    </header>
                    <div class="body">
					   <form class="form-horizontal label-left" method="post" data-validate="parsley" novalidate="novalidate" id="form_newacc" enctype="multipart/form-data"/>
							<fieldset> 
					                            <legend class="section">Add Schedule
					                            </legend>
					                            <br>

												<div class="control-group">
					                                <label class="control-label" for="simple-big">School Year</label>
					                                <div class="controls controls-row">
													<select class="selectpicker span4" data-style="btn-primary" name="school_year" tabindex="-1" id="simple-big">
													       	<?php 
														       	$query = "SELECT * FROM tblschool_year";
														        $result = @mysql_query($query);
														        while($row = mysql_fetch_array($result))
													        	{
																	echo "<option value'".$row[1]."'' >".$row[1]."</option>";
													        	}

													        ?>
													</select>
					                                </div>
					                            </div>


					                            <div class="control-group">
					                                <label class="control-label" for="simple-big">Course</label>
					                                <div class="controls controls-row">
					                                    <select class="selectpicker span5" data-style="btn-primary" name="course" tabindex="-1" id="simple-big">
					                                        <option value="BS Information Technology major in Service Management" />BS Information Technology 
					                                        <option value="BS Computer Science" />BS Computer Science
					                                        <option value="BS Computer Network Administration" />BS Network Administration
					                                    </select>
					                                </div>
					                            </div>

					                            <div class="control-group">
					                                <label class="control-label" for="simple-big">Course Year</label>
					                                <div class="controls controls-row">
					                                    <select class="selectpicker span2" data-style="btn-primary" name="course_year" tabindex="-1" id="simple-big">
					                                        <option value="1"/>1st
					                                        <option value="2"/>2nd
					                                        <option value="3"/>3rd
					                                        <option value="4"/>4th
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
					                            <div class="control-group">
					                                <label class="control-label" for="simple-big">Semester</label>
					                                <div class="controls controls-row">
					                                    <select class="selectpicker span4" data-style="btn-primary" name="semester" tabindex="-1" id="simple-big">
															<option value="first"/>First Semester
															<option value="second"/>Second Semester
														</select>
					                                </div>
					                            </div>

					                            <div class="form-actions">
                            						<button type="submit" name="submit2" class="btn btn-primary">Validate &amp; Submit</button>
                        						</div>
							</fieldset>
						</form>
					</div>
				</section>
			</div>
</div>

<?php
	if(isset($_POST['submit2']))
	{
		$_SESSION['section'] = $_POST['section'];
		$_SESSION['course_year'] = $_POST['course_year'];
		$_SESSION['course'] = $_POST['course'];
		$_SESSION['school_year'] = $_POST['school_year'];
		$_SESSION['semester'] = $_POST['semester'];
		redirect_2("edit_sem_sched.php");
	}
?>







    </span>
</tbody></table></div>     


        
</div>

<div id="msg"></div>
<?php require_once("footer.php");?> 


</body></html>


