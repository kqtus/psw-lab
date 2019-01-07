<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <link rel="stylesheet" href="register.css">

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
                                    Do you already have account?
                                    <a href="login_form.php">Login.</a>
                                </p>

                                <h3 class="register-heading">Register.</h3>

                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="first_name" class="form-control" placeholder="Login *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="last_name" class="form-control" placeholder="Nick *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="pswd" class="form-control" placeholder="Password *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="conf_pswd" class="form-control"  placeholder="Confirm Password *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <div class="maxl">
                                                <label class="radio inline"> 
                                                    <input type="radio" name="gender" value="male" checked>
                                                    <span> Male </span> 
                                                </label>
                                                <label class="radio inline"> 
                                                    <input type="radio" name="gender" value="female">
                                                    <span>Female </span> 
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="Your Email *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="phone" minlength="11" maxlength="11" class="form-control" placeholder="Your Phone *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <select name="question" class="form-control">
                                                <option class="hidden" selected disabled>Please select your Sequrity Question</option>
                                                <option>1. How old were you in 2016?</option>
                                                <option>2. What is your height (meters)?</option>
                                                <option>3. What is name of your pet?</option>
                                                <option></option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="answer" class="form-control" placeholder="Enter Your Answer *" value="" />
                                        </div>
                                        <input type="submit" class="btnRegister"  value="Register" name="register_btn"/>
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