<?php
    $user_logged = false;
    if (isset($_SESSION['logged_in'])) {
        if ($_SESSION['logged_in'] == true) {
            $user_logged = true;
        }
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body>
    <form method="post" action="registration_response.php">
        <div class="container" style="margin-left:35%; margin-right:20%; margin-top:10%;">

            <?php

            if (isset($user_logged) && $user_logged == TRUE)
            {
                echo 
                '
                <div class="col-md-5">
                    <h3 style="text-align: center; margin-bottom:40px;">
                        You can change your personal data here
                    </h3>
                    <div class="form-group">
                        <input type="text" name="first_name" class="form-control" placeholder="First Name *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="text" name="last_name" class="form-control" placeholder="Last Name *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="text" name="login" class="form-control" placeholder="Login *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="password" name="pswd" class="form-control" placeholder="Password *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="password" name="conf_pswd" class="form-control"  placeholder="Confirm Password *" value="" />
                    </div>
                    <div>
                        <input type="submit" class="btn btn-success" style="float: right;"  value="Save" name="saveBtn"/>
                    </div>
                </div>
                ';
            } else {
                echo
                '
                <div class="col-md-5">
                    <h3 style="text-align: center; margin-bottom:40px;">
                        Sorry, you cannot access this page. Please 
                        <a href="login_form.php">login</a> first.
                    </h3>
                </div>
                ';
            }
            ?>
        </div>
    </form>
</body>
</html>