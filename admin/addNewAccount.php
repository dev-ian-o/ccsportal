<div class="content container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <h2 class="page-title">Add new account</h2>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span7">
            <section class="widget">
                <div class="body">
                    <form class="form-horizontal label-left" method="post" data-validate="parsley" novalidate="novalidate" />
                        <fieldset>
                            <legend class="section">
                                By default validation is started only after at least 3 characters have been input.
                            </legend>
                            <div class="control-group">
                                <label class="control-label" for="basic">Simple required</label>
                                <div class="controls">
                                    <input type="text" id="basic" name="basic" required="required" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="basic-change">
                                    Min-length On Change
                                    <span class="help-block">
                                        At least 10
                                    </span>
                                </label>
                                <div class="controls">
                                    <input type="text" id="basic-change" name="basic-change" data-trigger="change" data-minlength="10" required="required" />
                                </div>
                            </div>
                        </fieldset>
                      
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>
