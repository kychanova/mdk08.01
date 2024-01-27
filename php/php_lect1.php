<?php 
$j = 987;
echo '$j == 987 : '.($j == 987).'<br>';
echo '$j == "987" : '.($j == "987").'<br>';

$j = 987;
echo '$j === 987 : '.($j === 987).'<br>';
echo '$j === "987" : '.($j === "987").'<br>';

$author = "Scott Adams";
 $out = <<<_END
 Normal people believe that if it ain't broke, don't fix it. <br>
 Engineers believe that if it ain't broke, it doesn't have enough
 features yet.
 - $author.
_END;
echo $out;

// define("ROOT_LOCATION", "/usr/local/www/");
// $directory = ROOT_LOCATION;

?>
