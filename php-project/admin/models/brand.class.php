<?php
class Brand{
    static public function readAll(){
    global $db;
    $sql = "select id, name from brands order by id";
    $result= $db->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>