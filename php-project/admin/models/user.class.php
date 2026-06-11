<?php
class User{
    public $id;
    public $name;
    public $email;
    public $role_id;
    private $password;

    public function __construct($id,$name,$email,$role_id,$password = null){
    $this->id = $id;
    $this->name = $name;
    $this->email = $email;
    $this->role_id = $role_id;
    $this->password = $password;
    }


    public function create(){
        
    }
    public function update(){

    }
    public function readAll(){

    }
    public function readById(){

    }
    public function delete(){

    }
}
?>