<?php
abstract class Test{
    public $name = "Nourin";
    public function getName(){
        return $this->name;
    }
    abstract public function getAge();
    abstract public function viewdetails();
}
class Person extends Test{
    public $age = 22;
    public function getAge(){
        echo $this->age."<br>";
    }
    public function viewdetails(){
        echo "Name: $this->name <br> Age: $this->age <br>";
    }
}
$person = new Person();
$person->getAge();
$person->viewdetails();
echo $person->getName();
?>