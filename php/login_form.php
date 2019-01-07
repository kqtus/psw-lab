<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <link rel="stylesheet" href="register.css">
        <link rel="stylesheet" href="login.css">

        <title>Hello, world!</title>
    </head>
    <body>
        <form method="post" action="registration_response.php">
            <div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="https://cdn4.iconfinder.com/data/icons/computer-monitor-vol-2/100/computer_screen21-512.png" alt=""/>
                        <h3>Welcome!</h3>
                        <p>You are 30 seconds away from accessing the most reliable source of informations about newest technologies out there!</p>
                    </div>
                    <div class="col-md-9 register-right">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <p class="register-heading">
                                    Don't have account?
                                    <a href="registration_form.php">Register.</a>
                                </p>

                                <h3 class="register-heading">Login.</h3>

                                <div class="row register-form">
                                    <div class="col">
                                        <div class="form-group">
                                            <input type="text" name="login" class="form-control" placeholder="Login" value="<?php echo((isset($_COOKIE['last_login_name'])) ? $_COOKIE['last_login_name'] : '');?>" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="pswd" class="form-control" placeholder="Password" value="" />
                                        </div>
                                        <input type="submit" class="btnLogin"  value="Login" name="login_btn"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>