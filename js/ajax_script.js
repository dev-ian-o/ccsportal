
  $(document).ready(function() {
                            /*AJAX THE FORM*/      
        $('#form_pass').submit(function(){
            
            postData = $('#form_pass').serialize();
      
            $.post('process.php', postData+'&action=submit&ajaxrequest=1', function(msg) {
                $("#oldpass").html(""+msg+"");
            }); 
            return false;
        });
        $('#abouts').submit(function(){
            
            postData = $('#abouts').serialize();
            $.post('process.php', postData+'&action=submit&ajaxrequest=1', function(msg) {
                $("#about").html(""+msg+"");
            });
            return false;
        });        
        $('#form_login').submit(function(){
            
            postData = $('#form_login').serialize();
            
            $.post('process.php', postData+'&action=submit&ajaxrequest=1', function(msg) {
                $("#error").html(""+msg+"");
            }); 
            return false;
        });

        $('#posting').submit(function(){
            
            postData = $('#posting').serialize();
            $.post('process.php', postData+'&action=submit&ajaxrequest=1', function(msg) {
                $("#newpost").after(""+msg+"");
            }); 
            return false;
        });
        $('#posts').submit(function(){
            
            postData = $('#posts').serialize();

            $.post('process.php', postData+'&action=submit&ajaxrequest=1', function(msg) {
                $("#newpost").after(""+msg+"");
            }); 
            return false;
        });

        $("#form_pass").validate({
                "rules" : {
                    "old": {
                        "required" : true },
                    "new": {
                        "minlength" : 6,
                        "required" : true },
                    "retype": {
                        "equalTo" : "#password2"}
                } //rules

        }); //validate

        /*---VALIDATE FORM FUNCTION----*/
        $("#form_login").validate({
                 "rules" : {
                    "username": {
                        "required" : true },
                    "password": {
                        "required" : true }
                } //rules
        });
                /*---VALIDATE FORM FUNCTION----*/
        $("#grading").validate({
                 "rules" : {
                    "mgrade": {
                        "required" : true },
                    "fgrade": {
                        "required" : true }
                } //rules
        });

    }); //document ready
 