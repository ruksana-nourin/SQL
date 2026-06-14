<?php
$pass = "123";
$hash =password_hash($pass , PASSWORD_DEFAULT);

echo $hash;
echo "<br>";
// echo password_hash($pass , PASSWORD_DEFAULT);
if(password_verify($pass , $hash)){
    echo "Password is valid";
} else {
    echo "Password is not valid";
}
?>