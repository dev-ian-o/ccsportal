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
                            Subjects
                       </h4>
                    </header>
                    <div class="body">
					   <form class="form-horizontal label-left" method="post" data-validate="parsley" novalidate="novalidate" id="form_newacc" enctype="multipart/form-data"/>
							<fieldset> 
					                            <legend class="section">Add New Subject
					                            </legend>
					                            <br>
					                            <div class="control-group">
					                                <label class="control-label" for="basic">Subject Description :</label>
					                                <div class="controls">
					                                	<input type="text" name="description" required="required" />
					                                </div>
					                            </div>
					                            <div class="control-group">
					                                <label class="control-label" for="basic">Subject Code :</label>
					                                <div class="controls">
					                                	<input type="text" name="code" required="required" />
					                                </div>
					                            </div>
					                            <div class="control-group">
					                                <label class="control-label" for="basic">Subject Units :</label>
					                                <div class="controls">
					                                	<input type="text" name="units" required="required" />
					                                </div>
					                            </div>

					                            <div class="control-group">
					                                <label class="control-label" for="basic">Semester :</label>
					                                <div class="controls">

					                                    <select class="selectpicker span5" data-style="btn-primary" name="semester" tabindex="-1" id="simple-big">
					                                        <option value="first" />First Semester
					                                        <option value="second" />Second Semester
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

					                            <div class="form-actions">
                            						<button type="submit" name="submit" class="btn btn-primary">Validate &amp; Submit</button>
                        						</div>
							</fieldset>
						</form>
					</div>
				</section>
			</div>
</div>











<!-- TABLE -->
<div class="row-fluid">
            <div class="span10 offset1">
                <section class="widget">
                    <header>
                
                        <h4>
                            <i class="icon-user"></i>
       						List of Subjects
                       </h4>
                    </header>
                    <div class="body">
                    <br>           
                        <table id="datatable-table" class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Subject Code</th>
                                <th>Subject Description</th>
                                <th>Subject Units</th>
                                <th class="no-sort"></th>
                            </tr>
                            </thead>
                            <tbody>
           <span id="tableAjax">          

<?php
		$query = "SELECT * FROM tblsubject";
		$result = @mysql_query($query);
		$a = 1;
        while($row = mysql_fetch_array($result))
        {

        
            echo "<tr>";
           	echo "	<td>".$a++."</td>";
			echo "	<td>".$row[2]."</td>";
			echo "	<td>".$row[1]."</td>";
			echo "	<td>".$row[3]."</td>";
            echo "<td>";

            print  '<form id="'.$row[0].'" method="POST">';
            print  '<input type="hidden" name="edit_id3" value="'.$row[0].'"/>';
            echo   '<button type="submit" class="editBtn btn btn-success" data-original-title="Edit" title="Edit" alt="Edit" name="edit">
                                        <i class="icon-edit"></i>
                    </button>';
            print '<input type="hidden" name="delete_id3" value="'.$row[0].'"/>';
            echo  '<button type="submit" class="delBtn btn btn-danger" data-original-title="Delete" title="Delete" alt="Delete" name="delete">
                                        <i class="icon-trash"></i>
                    </button>';     
            print '</form>';
            echo "</td>";
            echo "</tr>";           
        }
        

	if(isset($_POST['submit']))
	{
		if((!empty($_POST['description'])) && (!empty($_POST['code'])) && (!empty($_POST['units'])))
		{
			new_subject($_POST['description'],$_POST['code'],$_POST['units'],$_POST['semester'],$_POST['course'],$_POST['course_year']);
		}
	}
	if(isset($_POST['edit']))
	{
		$_SESSION['edit_id3'] = $_POST['edit_id3'];
		echo "<script>window.location = 'edit_subject.php';</script>";
	}
	if(isset($_POST['delete']))
	{
		function delete_subject($id){
			$query = "DELETE FROM tblsubject WHERE id_subject ='$id'";
        	$result = @mysql_query($query);
		}
		delete_subject($_POST['delete_id3']);
	}

?>
<div id="confirmModal" class="modal hide fade" tabindex="-1" role="dialog">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 id="myModalLabel">Confirm Delete!</h4>
    </div>
    <div class="modal-body">
        Are you sure that you want to delete?
                    
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal">Close</button>
        <input type="button" name="submit" class="yes btn btn-primary" value="Yes">
    </div>
</div>


    </span>
</tbody></table></div>     


        
</div>

<div id="msg"></div>
<?php require_once("footer.php");?> 


<?php

    if((isset($_SESSION['delete_id3'])) && $_SESSION['delete_id3'] != "")
    {
       echo '<form id="deleteFrm"><input type="hidden" name="id_delete" value="'.$_SESSION['delete_id3'].'"/></form>';
       echo '<script> $("#confirmModal").modal("show");            
            </script>';   
    }    
    if(isset($_POST['editBtn'])){
        $_SESSION['edit_id3'] = $_POST['edit_id3'];
        echo "<script>window.location = 'edit_subjects.php';</script>";
    }
?>

<script type="text/javascript">
    $("document").ready(function(){        
          $('.yes').click(function(){
            $("#confirmModal").modal('hide');
            postData = $('#deleteFrm').serialize();
            $.post('process.php', postData+'&action=submit', function(msg) {
                $("#msg").html(""+msg+"");  
            }); 
         });
    });
</script>

</body></html>


