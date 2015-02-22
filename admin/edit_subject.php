<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php admin_confirm_logged_in()?>
<?php require_once("header.php"); ?>


<?php
  function edit_subject($id,$desc,$code,$unit){
        $query = "UPDATE tblsubject SET subject_desc = '$desc',subject_code = '$code',subject_unit = '$unit' WHERE id_subject = '$id'";     
        $result = @mysql_query($query);
    }
        

    if(isset($_SESSION['edit_id3']))
    {
        $query = "SELECT * FROM tblsubject WHERE id_subject = '$_SESSION[edit_id3]'";        
        $result = @mysql_query($query);
        $row = mysql_fetch_array($result);

    }   


?>

<div class="row-fluid">
            <div class="span8 offset2">
                <section class="widget">
                    <header>
                
                        <h4>
                            <i class="icon-file-alt"></i>
                            Subjects                       
                        <span class="pull-right">
                            <a href="subjects.php" class="btn btn-warning" id="btnAddNew"><i class="icon-undo"></i> Back to Subjects</a>
                        </span>                            
                       </h4>
                    </header>
                    <div class="body">
                       <form class="form-horizontal label-left" method="post" data-validate="parsley" novalidate="novalidate" id="form_newacc" enctype="multipart/form-data"/>
                            <fieldset> 
                                                <legend class="section">Edit Subject
                                                </legend>
                                                <br>
                                                <div class="control-group">
                                                    <label class="control-label" for="basic">Subject Description :</label>
                                                    <div class="controls">
                                                        <input type="text" name="description" value=<?php if(isset($_SESSION['edit_id3'])){ echo "'".$row[1]."'";}?>>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label" for="basic">Subject Code :</label>
                                                    <div class="controls">
                                                        <input type="text" name="code" value=<?php if(isset($_SESSION['edit_id3'])){ echo "'".$row[2]."'";}?>>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label" for="basic">Subject Units :</label>
                                                    <div class="controls">
                                                        <input type="text" name="units" value=<?php if(isset($_SESSION['edit_id3'])){ echo "'".$row[3]."'";}?>>
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
