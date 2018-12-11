<html>
    <head>
        <meta chraset="utf-8">
        <title>Form Validation</title>

        <style type="text/css">
            p {
                margin: 0px;
            }

            .error {
                color: red;
            }

            p.head {
                font-weight: bold;
                margin-top: 10px;
            }
        </style>
    </head>
    <body>
        <?php
            if (!preg_match("/^\([0-9]{3}\)[0-9]{3}-[0-9]{4}$/", $_POST["phone"])) {
                print(
                "<p class='error'>Invalid phone number</p>
                 <p>A valid phone number must be in the form (555)555-5555</p>
                 <p>Click the Back button, enter a valid phone number and resubmit.</p>
                 <p>Thank You.</p>
                 </body>
                 </html>
                ");
                die();
            }
        ?>

        <p>
            Hi <?php print($_POST["fname"]); ?>
            Thank you for completing the survey. You have been added
            to the 
            <?php print($_POST["book"]);?>mailing list.
        </p>
        <p class="head">
            The following information has been saved in our database;
        </p>

        <p>Name: <?php print($_POST["fname"]); print($_POST["lname"]);?>
        </p>

        <p>Email: <?php print($_POST["email"])?>
        </p>
    </body>
</html>