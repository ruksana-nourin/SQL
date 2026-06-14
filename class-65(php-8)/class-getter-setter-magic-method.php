<?php
class Person{
    private $name = "Ruksana";
    private $age;
    public function __get($_pname){
        echo "<p>Getter called</p>";
        return $this-> $_pname;
    }
    public function __set($_pname, $_pvalue){
        echo "<p>Setter called</p>";
        $this-> $_pname = $_pvalue;
    }
}
$person = new Person();
echo $person->name;
echo $person->name = "Nourin";
echo $person->age;
echo $person->age = "22";
?>