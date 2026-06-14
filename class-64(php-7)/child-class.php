<?php
    class User{
        public $name;
        public $age;
        public function __construct($_name ,$_age){
            $this->name =$_name;
            $this->age =$_age;
        }
        public function test(){
            echo "Test form Parent calss";
        }
    }
    class Trainee extends User{
        public $course;
        public $year;
        public function __construct($_course ,$_year,$_name,$_age){
            parent::__construct($_name, $_age);
            $this->course =$_course;
            $this->year =$_year;
        }
    public function info()  {
        echo "Name:" . $this->name . "<br>";
        echo "Age:" . $this->age . "<br>";
        echo "Course:" . $this->course . "<br>";
        echo "Year:" . $this->year . "<br>";
    }  
    }
    class Academy extends Trainee{
        public $session;
        public function __construct($_session, $_course ,$_year,$_name,$_age){
            parent::__construct($_course ,$_year,$_name, $_age);
            $this->session = $_session;
        }

    }
    $trainee = new Trainee("PHP","2026","Nourin",20);
    $trainee->info();
    $trainee->test();

    $academy = new Academy(2026,"PHP","2026", "Roxy",22);
    $academy->info();
    $academy->test();
     echo "<br>"."session:" . $academy->session . "<br>";

?>