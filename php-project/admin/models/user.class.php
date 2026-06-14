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
        global $db;
        $sql = "INSERT INTO users (name, email, role_id, password)
         values ('$this->name', '$this->email', $this->role_id, '$this->password')";
         $result= $db->query($sql);
         if($db->error){
            return $db->error;
         }else{
            return true;
         }

        //  if($result){
        //     return $db->insert_id;
        //  }else{
        //     return $db->error;
        //  }
    }
    public function update(){
      global $db;
      $sql = "UPDATE users SET 
      name = '$this->name', 
      email = '$this->email', 
      role_id = $this->role_id 
      WHERE id= $this->id";
      
      $db->query($sql);

    }
    static public function readAll(){
    global $db;
    $sql = "select id, name, email from users order by id desc";
    $result= $db->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
    }
   static public function readById($_id){
   global $db;
    $sql = "select id, name, email,role_id from users where id=$_id";
    $result= $db->query($sql);
    return $result->fetch_assoc();
    }
    static public function delete($_id){
    global $db;
    $db->query("delete from users where id = $_id");
    if($db->error){
            return $db->error;
         }else{
            return true;
         }
    }
}
?>