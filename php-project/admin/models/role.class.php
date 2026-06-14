<?php
class Role{
    public $id;
    public $name;
   

    public function __construct($_id,$_name){
    $this->id = $_id;
    $this->name = $_name;
    }


    public function create(){
      //   global $db;
      //   $sql = "INSERT INTO users (name, email, role_id, password)
      //    values ('$this->name', '$this->email', $this->role_id, '$this->password')";
      //    $result= $db->query($sql);
      //    if($db->error){
      //       return $db->error;
      //    }else{
      //       return true;
      //    }

        //  if($result){
        //     return $db->insert_id;
        //  }else{
        //     return $db->error;
        //  }
    }
    public function update(){

    }
    static public function readAll(){
    global $db;
    $sql = "select id, name from roles order by id";
    $result= $db->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function readById(){

    }
    static public function delete($_id){
   //  global $db;
   //  $db->query("delete from users where id = $_id");
   //  if($db->error){
   //          return $db->error;
   //       }else{
   //          return true;
   //       }
    }
}
?>