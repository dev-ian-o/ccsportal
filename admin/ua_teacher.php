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
                            User Accounts<strong> | Teacher</strong>
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


