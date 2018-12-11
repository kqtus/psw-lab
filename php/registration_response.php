<html>
    <head>
        <meta charset="utf-8">
        <title>Registration response</title>
    </head>

    <body>
        <?php
            function isEmptyPassword($password) {
                return strlen($password) == 0;
            }

            function isSamePassword($password, $conf_password) {
                return strcmp($password, $conf_password) == 0;
            }

            function isValidPassword($password) {
                define("MIN_DIGITS", "1");
                define("MIN_LOWERL", "3");
                define("MIN_UPPERL", "3");
                define("MIN_MARKS", "1");
                
                $digits = 0;
                $lower_letters = 0;
                $upper_letters = 0;
                $marks = 0;

                foreach (str_split($password) as $letter) {
                    if ($letter >= 'a' && $letter <= 'z')
                        $lower_letters++;
                    if ($letter >= 'A' && $letter <= 'Z')
                        $upper_letters++;
                    if ($letter >= '0' && $letter <= '9')
                        $digits++;
                    if ($letter == '@' || $letter == '#')
                        $marks++;
                }
                
                return $digits >= MIN_DIGITS &&
                        $lower_letters >= MIN_LOWERL &&
                        $upper_letters >= MIN_UPPERL &&
                        $marks >= MIN_MARKS;
            }

            function isValidPhoneNumber($phoneNum) {
                $mask = "/^[0-9]{3}-[0-9]{3}-[0-9]{3}$/";
                return preg_match($mask, $phoneNum);
            }

            function hashString($str) {
                settype($str, "string");
                $patterns = array();
                $patterns[] = '/@/';
                $patterns[] = '/#/';
                $patterns[] = '/\$/';
                $replacements = array();
                $replacements[] = '#';
                $replacements[] = '$';
                $replacements[] = '@';

                return crc32(preg_replace($patterns, $replacements, $str));
            }

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
        ?>
    </body>
</html>