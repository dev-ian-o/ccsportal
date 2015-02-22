<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php admin_confirm_logged_in()?>
<?php require_once("header.php"); ?>

<!-- TABLE -->
<div class="row-fluid">
            <div class="span10 offset1">
                <section class="widget">
                    <header>
                
                        <h4>
                            <i class="icon-file-alt"></i>
                            User Accounts<strong> | Students</strong>
<span class="pull-right">
   <a href="ua_student.php" class="btn btn-warning" id="btnAddNew"><i class="icon-undo"></i> Back to Student Users</a>
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
                                <th>Student No.</th>
                                <th>Last Name</th>
                                <th>First Name</th>
                                <th>Year</th>
                                <th>Section</th>
                                <th>Course</th>
                                <th>Password</th>
                                <th class="no-sort"></th>
                            </tr>
                            </thead>
                            <tbody>
           <span id="tableAjax">          

<?php

        $query = "SELECT *
                  FROM tblstudent";
        $result = @mysql_query($query);
        $a = 1;
        while($row = mysql_fetch_array($result))
        {

            if ($row['image'] == ""){ $image = "default.png";}
            else { $image = $row['image'];}

            if($row[12] == 'first'){ $yrandsec = '1ST'; } else if($row[12] == 'second'){ $yrandsec = '2ND'; }
            else if($row[12] == 'third'){ $yrandsec = '3RD'; } else if($row[12] == 'fourth') { $yrandsec = '4TH';}
            else { $yrandsec = '5TH';};
            echo "<tr>";
            echo "<td>".$a++."</td>";
            echo '<td><img src="upload/'.$image.'"/></td>';
            echo "<td>".$row['student_no']."</td>";

            echo "<td>".$row['lastname']."</td>";
            echo "<td>".$row['firstname']."</td>";
            echo "<td>".$yrandsec."</td>";
            echo "<td>".$row['section']."</td>";
            echo "<td>".$row['course']."</td>";
            echo "<td>".rtnDecrypt($row['password'])."</td>";
            echo "<td>";
            print  '<form id="'.$row[0].'" method="POST"><input type="hidden" name="newpass_id" value="'.$row[0].'"/>';
            echo '<button type="submit" class="delBtn btn btn-success" data-rel="tooltip" title="New Password" alt="New Password" name="newpass">
                        Change Password
                </button>';
            print '</form>';
            echo "</td>";

            echo "</tr>";           
        }
        

        if(isset($_POST['newpass'])){
            $id = $_POST['newpass_id'];
            $query = "UPDATE tblstudent SET
                    password = '".rtnEncrypt(randomPassword())."'
                    WHERE id_student = '$id'"; 
            $result = @mysql_query($query);
            print "<script>window.location = 'change_password.php';</script>";
        }   

?>

    </span>
</tbody></table></div>     


        
</div>

<div id="msg"></div>
<?php require_once("footer.php");?> 
<script type="text/javascript">
    $("document").ready(function(){

            
    });

</script>



</body></html>


