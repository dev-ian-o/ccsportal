<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php require_once("header.php"); ?>

<div class="row-fluid">
            <div class="span8 offset2">
                <section class="widget">
                    <header>
                
                        <h4>
                            <i class="icon-file-alt"></i>
                            Subjects
                        <span class="pull-right">
                            <a href="ua_student.php" class="btn btn-warning" id="btnAddNew"><i class="icon-undo"></i> Back to Student Users</a>
                        </span>                            
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
					                            <div class="form-actions">
                            						<button type="submit" name="submit" class="btn btn-primary">Validate &amp; Submit</button>
                        						</div>
							</fieldset>
						</form>
					</div>
				</section>
			</div>
</div>

<div class="row-fluid">
            <div class="span10 offset1">
                <section class="widget">
                    <header>
                
                        <h4>
                            <i class="icon-user"></i>
                            <strong> | Students</strong>
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
										<th></th>
									</tr>		
								</thead>		
								<tbody>
								<?php
								$query = "SELECT * FROM tblsubject";
								$result = @mysql_query($query);
								$a = 1;
								while($row = mysql_fetch_array($result)){
									echo"<tr>";
									echo "	<td>".$a++."</td>";
									echo "	<td>".$row[2]."</td>";
									echo "	<td>".$row[1]."</td>";
									echo "	<td>".$row[3]."</td>";
									print "<td>";
									print  '<form id="'.$row[0].'" method="POST"><input type="hidden" name="delete_id" value="'.$row[0].'"/>';
							            echo '<button type="submit" class="delBtn tooltip-success" data-rel="tooltip" title="Delete Subject" alt="Delete Subject" name="delete">Delete
							                </button>';
							                    //<i class="icon-edit bigger-120"></i>
							            print '<input type="hidden" name="edit_id" value="'.$row[0].'"/>';
							            echo '<button type="submit" class="delBtn tooltip-success" data-rel="tooltip" title="View Subject" alt="Edit Subject"  name="edit">
							                    Edit
							                 </button>';
							            print '</form>';
							        print "<td>";
									echo"</tr>";
								}


								?>
								</tbody>
							</table>
</div></section></div></div>


<?php

	if(isset($_POST['submit']))
	{
		if((!empty($_POST['description'])) && (!empty($_POST['code'])) && (!empty($_POST['units'])))
		{
			new_subject($_POST['description'],$_POST['code'],$_POST['units']);
		}
	}
	if(isset($_POST['edit']))
	{
		$_SESSION['edit_id'] = $_POST['edit_id'];
		echo "<script>window.location = 'edit_subject.php';</script>";
	}
	if(isset($_POST['delete']))
	{
		function delete_subject($id){
			$query = "DELETE FROM tblsubject WHERE id_subject ='$id'";
        	$result = @mysql_query($query);
		}
		delete_subject($_POST['delete_id']);
	}
?>

<?php require_once("footer.php"); ?>


</body></html>

<?php  function edit_subject($id,$desc,$code,$unit){
        $query = "UPDATE tblsubject SET subject_desc = '$desc',subject_code = '$code',subject_unit = '$unit' WHERE id_subject = '$id'";     
        $result = @mysql_query($query);
    }
        

    if(isset($_SESSION['edit_id']))
    {
        $query = "SELECT * FROM tblsubject WHERE id_subject = '$_SESSION[edit_id]'";        
        $result = @mysql_query($query);
        $row = mysql_fetch_array($result);

    }   


?>

Edit Subject
<form id="subjectFrm" method="post">
Subject Description :<input type="text" name="description" value=<?php if(isset($_SESSION['edit_id'])){ echo "'".$row[1]."'";}?> /><br>
Subject Code :<input type="text" name="code" value=<?php if(isset($_SESSION['edit_id'])){ echo "'".$row[2]."'";}?>/><br>
Subject Units :<input type="text" name="units" value=<?php if(isset($_SESSION['edit_id'])){ echo "'".$row[3]."'";}?>/><br>
<button type="submit" name="submit">Submit</button>
</form>
<?php
    if(isset($_POST['submit']))
    {
        if((!empty($_POST['description'])) && (!empty($_POST['code'])) && (!empty($_POST['units'])))
        {
            edit_subject($_SESSION['edit_id'],$_POST['description'],$_POST['code'],$_POST['units']);
        }
    }


?>


<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php admin_confirm_logged_in()?>
<?php require_once("header.php"); 

?>

<!-- TABLE -->
<div class="row-fluid">
            <div class="span10 offset1">
                <section class="widget">
                    <header>
                
                        <h4>
                            <i class="icon-user"></i>
                            User Accounts<strong> | Students</strong>
<span class="pull-right">
    <a href="add_teacher.php" class="btn btn-warning" id="btnAddNew"><i class="icon-plus"></i> Add New Account</a>
    <a href="reports.php" class="btn btn-warning" id="btnAddNew"><i class="icon-print"></i> Reports</a>
</span>
                       </h4>
                    </header>
                    <div class="body">
                    <br>           
                        <table id="datatable-table" class="table table-striped">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th class="no-sort">Image</th>
                                <th>Employee No.</th>
                                <th>Last Name</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Birthday</th>
                                <th>Gender</th>
                                <th>Address</th>
                                <th>Contact Number</th>
                                <th class="no-sort"></th>
                            </tr>
                            </thead>
                            <tbody>
           <span id="tableAjax">          

<?php

        $query = "SELECT *
                  FROM tblteacher";
        $result = @mysql_query($query);
        while($row = mysql_fetch_array($result))
        {

            if ($row['image'] == ""){ $image = "default.png";}
            else { $image = $row['image'];}
            echo "<tr>";
            echo "<td>".$row[0]."</td>";
            echo '<td><img src="upload/'.$image.'"/></td>';
            echo "<td>".$row['employee_no']."</td>";
            echo "<td>".$row['lastname']."</td>";
            echo "<td>".$row['firstname']."</td>";
            echo "<td>".$row['middlename']."</td>";
            echo "<td>".$row['dob']."</td>";
            echo "<td>".$row['gender']."</td>";
            echo "<td>".$row['add_city']."</td>";
            echo "<td>".$row['contact_no']."</td>";
            echo "<td>";

            print  '<form id="'.$row[0].'" method="POST">';
            print  '<input type="hidden" name="edit_id2" value="'.$row[0].'"/>';
            echo   '<button type="submit" class="editBtn btn btn-success" data-original-title="Edit" title="Edit" alt="Edit" name="editBtn">
                                        <i class="icon-edit"></i>
                    </button>';
            print '<input type="hidden" name="delete_id2" value="'.$row[0].'"/>';
            echo  '<button type="submit" class="delBtn btn btn-danger" data-original-title="Delete" title="Delete" alt="Delete" name="delBtn">
                                        <i class="icon-trash"></i>
                    </button>';     
            print '</form>';
            echo "</td>";
            echo "</tr>";           
        }
        

        if(isset($_POST['delBtn'])){
            $_SESSION['delete_id2'] = $_POST['delete_id2'];           
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

    if((isset($_SESSION['delete_id2'])) && $_SESSION['delete_id2'] != "")
    {
       echo '<form id="deleteFrm"><input type="hidden" name="id_delete" value="'.$_SESSION['delete_id2'].'"/></form>';
       echo '<script> $("#confirmModal").modal("show");            
            </script>';   
    }    
    if(isset($_POST['editBtn'])){
        $_SESSION['edit_id2'] = $_POST['edit_id2'];
        echo "<script>window.location = 'edit_teacher.php';</script>";
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


