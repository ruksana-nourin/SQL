<?php
class User{
    public $name;
    public $age;
    public function __construct($_name,$_age){
        $this->name = $_name;
        $this->age = $_age;
        echo "construct <br>";
    }
    function __tostring(){
        echo "tostring <br>";
        return $this->name."".$this->age;
    }
    public function __destruct(){
        echo "destruct <br>";
    }
}

$user = new User("Nourin", 20);

echo $user;
// echo $user->name;
// echo "<br>";
// echo $user->age;
?>