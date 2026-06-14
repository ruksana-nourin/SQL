<?php
class Person{
    private $name = "Ruksana";
    private $age = 22;
    // Customize getter setter method

    public function getAge(){
        return $this->age;
    }
    public function setAge($_age){
        $this->age = $_age;
    }


}
$person = new Person();
echo $person->getAge();
echo "<hr>";
$person->setAge(23);
echo $person->getAge();
?>