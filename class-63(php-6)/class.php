<?php

    class PersonInfo{
        public $name = "Jhon";
        public $age = "22";

        public function info(){
            echo "Name:" . $this->name . "<br>";
            echo "Age:" . $this->age . "<br>";
        }
    }

    // $arr =[1,2,3,4];
    $person = new PersonInfo();
    $person->info();
    // echo $person->age;
    $person->name = "Nourin";
    // echo $person->name;
    $person->info();


    echo "<pre>";
    print_r($person);
    // print_r($arr);
    echo "</pre>";

?>