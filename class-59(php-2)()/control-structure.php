<?php
/*
condition
    1.if
    2.if-else
    3.if-elseif-else
    4.switch
loop
    1.for
    2.while
    3.do-while
    4.foreach

*/

$x = 10;
if ($x > 5) {
    echo "X is greter then 5";
} else {
    echo "X is less then 5";
}
echo "<br>--------<br>";

$y = 5;
if ($y > 0) {
    echo "Y is positive number";
} elseif ($y < 0) {
    echo "Y is negetive number";
} else {
    echo "Y is zero";
}

echo "<br>--------<br>";

$day = "Friday";
switch ($day) {
    case "Sunday":
        echo "First day of week";
        break;
    case "Friday":
        echo "weekend day";
        break;
    case "Saturday":
        echo "weekend day";
        break;
    default:
        echo "weekdays";
}

echo "<br>|||||||||----------------------|||||||||<br>";

for ($i = 0; $i < 10; $i++) {
    if ($i == 5)
        continue;
    echo $i."<br>";
}
echo "<br>--------<br>";

$z = 5;
while ($z > 0) {
    echo $z . "<br>";
    $z--;
}
echo "<br>WHILE z = $z <br>";

echo "<br>---*********-----<br>";
do {
    echo "Do while z =" . $z . "<br>";
    $z--;
} while ($z > 0);

echo "<br>--------<br>";

$arr =["a","b","c","d","e"];
foreach($arr as $value){
    echo $value."<br>";
}

echo "<br>--------<br>";

foreach($arr as $index => $value){
    echo $index."-".$value."<br>";
}

?>