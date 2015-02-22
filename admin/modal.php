<div id="addNewUser" class="modal hide fade" tabindex="-1" role="dialog">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 id="myModalLabel">Add New Student User</h4>
    </div>
    <div class="modal-body">
        <form enctype="multipart/form-data" class="form-horizontal label-left" method="post" data-validate="parsley" novalidate="novalidate" id="form_newacc"/>
                        <fieldset> 
                            <legend class="section">
                            </legend>

                            <div class="control-group">
                                <label class="control-label" for="basic">Student Number:</label>
                                <div class="controls">
                                    <input type="text" id="basic" name="student_no" required="required" />
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
                                    <select class="selectpicker span4" data-style="btn-primary" name="gender" tabindex="-1" id="simple-big">
                                        <option value="Male" />Male
                                        <option value="Female" />Female
                                    </select>
                                </div>
                            </div>
                            <legend class="section" style="color:Black;">
                                Address
                            </legend>

                            <div class="control-group">
                                <label class="control-label" for="basic">Street No.</label>
                                <div class="controls">
                                    <input type="number" id="basic" name="stno" required="required" />
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
                                <label class="control-label" for="simple-big">Course</label>
                                <div class="controls controls-row">
                                    <select class="selectpicker span8" data-style="btn-primary" name="course" tabindex="-1" id="simple-big">
                                        <option value="bsit" />BS Information Technology 
                                        <option value="bscs" />BS Computer Science
                                        <option value="bsnetad" />BS Network Administration
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="simple-big">Year</label>
                                <div class="controls controls-row">
                                    <select class="selectpicker span8" data-style="btn-primary" name="year" tabindex="-1" id="simple-big">
                                        <option value="first" />1st
                                        <option value="second" />2nd
                                        <option value="third" />3rd
                                        <option value="fourth" />4th
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="simple-big">Section</label>
                                <div class="controls controls-row">
                                    <select class="selectpicker span3" data-style="btn-primary" name="section" tabindex="-1" id="simple-big">
                                        <option value="A" />A
                                        <option value="B" />B
                                        <option value="C" />C
                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="basic-change">
                                    Image <small>(At most 5 mb.)</small>
                                </label>
                                <div class="controls">
                                    <input name="file" type="file" id="userfile"/>
                                </div>
                            </div>
                             <div class="fileupload-loading"><i class="icon-spin icon-spinner"></i></div>
                            <table role="presentation" class="table table-striped"><tbody class="files" data-toggle="modal-gallery" data-target="#modal-gallery"></tbody></table>

                        </fieldset>

                    
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal">Close</button>
        <input type="submit" name="submit" class="btn btn-primary" value="Save changes">
    </div>
</div>

                        </form>