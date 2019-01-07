<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'database.php';
    require 'validation_utils.php';
    
    function decodeAnswer($question, $answer) {
        $question_num = (int)$question;

        if ($question_num == 1) {
            return (int)$answer;
        }
        if ($question_num == 2) {
            return (double)$answer;
        }
        if ($question_num == 3) {
            return (string)$answer;
        }
    }

    function getValue($value) {
        return isset($value) ? $value : '';
    }
    
    $db_mgr = new DbManager();
    $connected_to_db = $db_mgr->connect("localhost", "local_admin", "pswd");

    if (isset($_POST['register_btn'])) {
        // Public data
        $pb_data = array(
            "fname" => getValue($_POST["first_name"]),
            "lname" => getValue($_POST["last_name"]),
            "email" => getValue($_POST["email"]),
            "phone" => getValue($_POST["phone"]),
            "question" => getValue($_POST["question"])
        );
    
        // Private data
        $pr_data = array(
            "pswd" => getValue($_POST["pswd"]),
            "conf_pswd" => getValue($_POST["conf_pswd"]),
            "answer" => getValue($_POST["answer"])
        );
            
    
        if (isEmptyPassword($pr_data['pswd'])) {
            print(
                "<p>You have provided empty password.</p>"
                . "</body>"
                . "</html>"
            );
            die();
        }
    
        if (!isSamePassword($pr_data['pswd'], $pr_data['conf_pswd'])) {
            print(
                "<p>You have provided two different passwords. Please correct it and resubmit.</p>"
                . "</body>"
                . "</html>"
            );
            die();
        }
    
        /* Password validation */
        
        if (!isValidPassword($pr_data['pswd'])) {
            print(
                "<p>Your password does not satisfy requirements. It needs to contain at least: 1 digit, 3 upper letters, 3 lower letters, 1 special mark (@ or #).</p>"
                . "</body>"
                . "</html>"
            );
            die();
        }
        
    
        if (!isValidPhoneNumber($pb_data['phone'])) {
            print(
                "<p>Your phone number is invalid. It has to be provided in the following manner DDD-DDD-DDD, where 'D' is digit from 0 to 9."
                . "</body>"
                . "</html>"
            );
            die();
        }
        
        $did_register = false;

        if ($connected_to_db) {
            $user_data = new DbUserData(
                $db_mgr,
                $pb_data["fname"],
                $pb_data["lname"],
                $pr_data["pswd"],
                $pb_data["question"],
                $pr_data["answer"],
                $pb_data["phone"],
                $pb_data["email"]
            );
    
            if ($db_mgr->insert($user_data) != false) {
                $did_register = true;
            }
            else {
                print('Error while performing database transaction. Probably caused by data disintegrity.' . $db_mgr->getLastError());
            }   
        }
        else {
            print('Could not establish connection with database.');
        }
    } else if (isset($_POST['login_btn'])) {
        $login = getValue($_POST['login']);
        $password = getValue($_POST['pswd']);

        function authenticateUser($_login, $_pswd) {
            $query = "SELECT * FROM pr_users WHERE name=\"" . $_login . "\" AND pswd=\"" . $_pswd ."\";";

            if (!isset($GLOBALS['db_mgr']))
                return false;

            $result = $GLOBALS['db_mgr']->execQuery($query);
            
            $ret = mysqli_num_rows($result) > 0 ? true : false;

            return $ret;
        }

        if ($connected_to_db && authenticateUser($login, $password)) {
            session_start();
            $_SESSION['user_id'] = $login;
            $_SESSION['logged_in'] = TRUE;
            
            define( "FIVE_DAYS", 60 * 60 * 24 * 5 );
            setcookie( "last_login_name", $login, time() + FIVE_DAYS );

            require 'profile.php';
            die();
        } else {
            $_SESSION['logged_in'] = FALSE;
        }
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
            <div class="col-md-5">
            <?php
            if (isset($_POST['register_btn'])) {
                if (isset($GLOBALS['did_register'])) {
                    if ($GLOBALS['did_register'] == true) {
                        echo 
                        '
                        <h3 style="text-align: center; margin-bottom:40px;">
                            Successfully registered! Now you can 
                            <a href="login_form.php">login</a>.
                        </h3>
                        ';
                    } else {
                        echo 
                        '
                        <h3 style="text-align: center; margin-bottom:40px;">
                            Something went wrong... please try again later.
                        </h3>
                        ';
                    }
                    echo '        </div>
                            </div>
                        </form>
                    </body>
                    </html>';
                    die();
                }
            }
            ?>
                <h3 style="text-align: center; margin-bottom:40px;">
                    Could not login. Invalid username and/or password.
                    <a href="login_form.php">Try again</a>.
                </h3>
            </div>
        </div>
    </form>
</body>
</html>