<?php
$str = "Hello World!";
echo substr($str,0);
echo "<br>";
echo substr($str,7,4);
echo "<br>";
echo strlen($str);
echo "<br>";
echo stripos($str,"w");
echo "<br>";
var_dump(strpos($str,"A"));
echo "<br>";
echo str_replace("World","Everyone",$str);
echo "<br>";
echo strtolower($str);
echo "<br>";
echo strtoupper($str);
echo "<br>";

// $html = htmlspecialchars("<h1 style = 'color:red'>Hello World</h1>");
         
$html =htmlentities ("<h1 style = 'color:#790352'>Hello World</h1>");
echo $html;



?>