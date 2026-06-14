<?php
class User
{
    public $name;
    public $age;
    protected $address = "Dhaka";
    private $password = "1234";
    static $country = "Bangladesh";

    public function __construct($_name, $_age)
    {
        $this->name = $_name;
        $this->age = $_age;
    }
    final function test()
    {
        echo "Test form Parent calss <br>";
        // echo "Password:" . $this->password . "<br>";
    }
    static function checkAge($age = 18){
        if($age >= 18){
            echo "You are old enough";
        }else{
            echo "You are not old enough";
        }
    }
}
class Trainee extends User
{
    public $course;
    public $year;
    public function __construct($_course, $_year, $_name, $_age)
    {
        parent::__construct($_name, $_age);
        $this->course = $_course;
        $this->year = $_year;
    }
    public function info()
    {
        echo "Name:" . $this->name . "<br>";
        echo "Age:" . $this->age . "<br>";
        echo "Course:" . $this->course . "<br>";
        echo "Year:" . $this->year . "<br>";
        echo "Adress:" . $this->address . "<br>";
        // echo "Password:" . $this->password . "<br>";
    }
    // public function test()
    // {
    //     echo "Test form child calss <br>";
    // }
}
$user = new User("Nourin", 20);
// $user -> address;
// $user -> password;
// $$user->info();

$trainee = new Trainee("PHP", "2026", "Nourin", 20);
$trainee->info();
$trainee->test();
// $trainee->address = "Dhaka";

echo User::checkAge(17);
echo "<br>";
echo User::$country;



?>