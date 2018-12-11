<?php
    define("TWO_DAYS", 60*60*24*2);

    setcookie("theme", $_POST["theme-style"], time() + TWO_DAYS);
    setcookie("text_col", $_POST["text-color"], time() + TWO_DAYS);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible">
    <title>Saving response</title>
</head>
<body>

</body>
</html>