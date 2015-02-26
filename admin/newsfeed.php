<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>CCS Portal Admin</title>
    <link href="css/application.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="img/favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta charset="utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
    .btn-file {
    position: relative;
    overflow: hidden;
}
img{
    height: 48px;
    width: 48px;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 999px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}
</style>

<?php

 unset($_SESSION['edit_id']);?>
<?php 

    if(isset($_GET['id'])){
        $id_post = $_GET['id'];
        $query3 = "DELETE FROM  tblpost WHERE id_post = '$id_post'";
        $result3 = @mysql_query($query3);      
    }
?>
<div class="row-fluid">
        <div class="span10 offset1">
           <section class="widget">
           <header><center><h4>Newsfeed</h4></center></header>
            <table id="datatable-table" class="table table-striped">
                <thead>
                    <tr>
                        <th>Post</th>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Level User</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                <?php

                $query = "SELECT * FROM tblpost";
                $result = @mysql_query($query);
                while($row = mysql_fetch_array($result)){
                   if($row['level_user'] == "student") {
                        $query2 = "SELECT * FROM tblstudent";
                        $result2 = @mysql_query($query2);
                        $row2 = mysql_fetch_array($result2);
                    }
                    else if($row['level_user'] == "teacher") {
                        $query2 = "SELECT * FROM tblteacher";
                        $result2 = @mysql_query($query2);
                        $row2 = mysql_fetch_array($result2);
                    }
                     echo '   <tr>';
                     echo '      <td>'.$row['post'].'</td>';
                     echo '      <td>'.$row2['firstname'].', '.$row2['lastname'].'</td>';
                     echo '      <td>'.full_date($row['date_post']).'</td>';
                     echo '      <td>'.$row['level_user'].'</td>';
                     echo '      <td>';


                    echo '<input type="hidden" name="id_post" value="'.$row['id_post'].'">';
                    echo '<a href="#confirmModal" class="btn btn-danger" data-toggle="modal" data-target="#confirmModal'.$row['id_post'].'">Delete</a>';
                    echo '<div id="confirmModal'.$row['id_post'].'" class="modal hide fade" tabindex="-1" role="dialog">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">×</button>
                                <h4 id="myModalLabel">Confirm Delete!</h4>
                            </div>
                            <div class="modal-body">
                                Are you sure that you want to delete?
                                            
                            </div>
                            <div class="modal-footer">';
                    echo '<form action="newsfeed.php?id='.$row['id_post'].'">';
                    echo '            <button class="btn" data-dismiss="modal">Close</button>
                                <a href="newsfeed.php?id='.$row['id_post'].'" class="yes btn btn-danger">Yes</a>
                            </div>

                        </div>';

                     echo '</form>';

                     echo '</td>';
                     echo '   </tr>';
                }
                ?>
                </tbody>
            </table>
            </section>
        </div>
</div>
<?php
    

?>





<?php require_once("footer.php"); ?>
</div></section></div></div></body></html>