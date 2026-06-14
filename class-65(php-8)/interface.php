<?php
interface iTest1{
    public function viewInfo();
}
interface iTest2{
    public function showText();
}

class ChildClass implements iTest1,iTest2{
    public $name = "Mina";
    public $email = "bjzina@gmail.com";

    public function viewInfo(){
        echo "Name: $this->name <br> email: $this->email <br>";
    }
    public function showText(){
        echo "Text show";
    }
}
$child = new ChildClass();
$child->viewInfo();
$child->showText();
?>