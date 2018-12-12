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
        
        $db_mgr = new DbManager();
        if ($db_mgr->connect("localhost", "local_admin", "pswd")) {
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
    
            if (!$db_mgr->insert($user_data)) {
                print('Successfully registered.');
            }
            else {
                print('Error while performing database transaction. Probably caused by data disintegrity.' . $db_mgr->getLastError());
            }   
        }
        else {
            print('Could not establish connection with database.');
        }

        /*
        $hostname = $_SERVER['SERVER_NAME'];
        print("Hi " . $pb_data['fname'] . " " . $pb_data['lname'] . "!  
                Activation email has been sent to your e-mail (" . $pb_data['email'] . "). 
                Please remember answer to the question " . $pb_data['question']. " (" . decodeAnswer($pb_data['question'], $pr_data['answer']) . "). " .
                "Greetings from $hostname."
        );

        print("<p>Here is your public data:</p>");

        foreach ($pb_data as $k => $value)
            print("<p>$k: $value</p>");

        print("<p>Here is your private hashed data:</p>");

        for (reset($pr_data); $element = key($pr_data); next($pr_data)) {
            $value_hash = hashString($pr_data[$element]);
            print("<p>$element: $value_hash</p>");
        }
        */
    } else if (isset($_POST['login_btn'])) {
        $login = getValue($_POST['login']);
        $password = getValue($_POST['pswd']);

        print($login . " " . $password);
        
    }
}    
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Registration response</title>
    </head>

    <body>
        
    </body>
</html>