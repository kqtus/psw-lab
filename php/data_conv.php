<!DOCTYPE html>
<html>
<?php
    $name = 'Marek';
    $testString = "3.5 seconds";
    $testDouble = 79.2;
    $testInteger = 12;
?>
    <head>
        <meta charset="utf-8">
        <title>
           Data conversion
        </title>
    </head>
    <body>
        <p class = "head">Converting to other data types:</p>
        <?php
            print("<p>$testString");
            settype($testString, "double");
            print(" as a double is $testString</p>");

            print("<p>$testString");
            settype($testString, "integer");
            print(" as a double is $testString</p>");

            $data = "98.6 degrees";
            print("<p class = 'space'>Before casting $data is a" . gettype($data) . "</p>");

            print("<p class='space'>Using type casting instead:</p>" .
                    "<p> as a double: " . (double)$data . "</p>" .
                    "<p> as an integer: " . (integer)$data);

            $a = 5;
            define("VALUE", 5);

            $a = $a + VALUE;

            print("<p>$a</p>");

            $first[0] = "zero";
            $first[1] = "one";
            $first[2] = "two";
            $first[] = "three";

            for ($i=0; $i < count($first); ++$i)
                print("<p>Element $i is $first[$i]</p>");

            $second = array("zero", "one", "two", "three");

            for ($i = 0; $i < count($second); ++$i)
                print("<p> Element $i is $second[$i]</p>");

            $third["Amy"] = 21;
            $third["Bob"] = 18;
            $third["Carol"] = 23;

            for (reset($third); $element = key($third); next($third))
                print("<p> $element is $third[$element]</p>");

            $fourth = array(
                "January" => "first",
                "February" => "second",
                "March" => "third",
                "April" => "fourth"
            );

            foreach ($fourth as $element => $value)
                print("<p>$element is the $value month</p>");

            $search = "Now is the time";

            if (preg_match("/Now/", $search))
                print("<p> 'Now' was found</p>");

            if (preg_match("/^Now/", $search))
                print("<p> 'Now' was found in the beginnng</p>");
              
            if (!preg_match("/Now$/", $search))
                print("<p> 'Now' was not found in the end</p>");

            if (preg_match("/\b[a-zA-Z]*ow\b/i", $search, $match)) {
                print("<p>Word found ending in 'ow': $match[0].</p>");
            }
                
            while ( preg_match( "/\b(t[[:alpha:]]+)\b/", $search, $match ) )
            {
               print( $match[ 1 ] . " " );

               // remove the first occurrence of a word beginning
               // with 't' to find other instances in the string
               $search = preg_replace("/" . $match[ 1 ] . "/", "", $search);
            } // end while
        ?>
    </body>
</html>