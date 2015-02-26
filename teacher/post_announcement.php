<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="author" content="www.frebsite.nl" />
        <meta name="viewport" content="width=device-width initial-scale=1.0 maximum-scale=1.0 user-scalable=yes" />

        <title>Login | UMak-CCS Portal</title>
        <link type="text/css" rel="stylesheet" href="../css/demo.css" />
        <link type="text/css" rel="stylesheet" href="../css/jquery.mmenu.all.css" />
        <link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css" />
    </head>
    <body>
        <div id="page-content" class="hidden">
            <div id="header">
                UMak-CCS App
            </div>
            <div class="container">
                <h3 class="text-center">Send Message</h3>
                <form id="form-login">
                    <input type="hidden" name="login" value="1">
                    <input type="hidden" name="to" value="639151484349">

                    <input type="hidden" name="api_key" value="dad08c00">
                    <input type="hidden" name="api_secret" value="f2053df7">
                    <input type="hidden" name="from" value="CCSMOBILEAPP">
                   <!--  https://rest.nexmo.com/sms/json?api_key=dad08c00&api_secret=f2053df7&from=NEXMO&to=639151484349&text=Welcome+to+Nexmo -->
                    <div class="form-group">
                        <label>To:</label>
                        639151484349
                        <!-- <input type="text" name="to" class="form-control" placeholder="cp #" required/> -->
                    </div>

                    
                    <div class="form-group">
                        <label>Message:</label>
                        <input type="text" name="text" class="form-control" placeholder="Message" value="announcement message ccsmoblie app sample.." required/>
                    </div>
                    <div class="form-group text-center">

                        <button type="submit" class="btn btn-primary btn-lg">Send Message!</button>
                    </div>
                </form>
            </div>
        </div>


        <script type="text/javascript" src="js/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript" src="scripts/login.js"></script>
    </body>
</html>