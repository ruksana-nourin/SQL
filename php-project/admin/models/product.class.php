<?php
class Product{
    public $id;
    public $name;
    public $category_id;
    public $brand_id;
    public $description;
    public $price;
    public $quantity;
    public $point_of_restock;
    public $image;
    public $active;
   

    public function __construct($id,$name,$category_id,$brand_id,$price,$quantity,$point_of_restock,$active,$image =null,$description = null){
    $this->id               = $id;
    $this->name             = $name;
    $this->category_id      = $category_id;
    $this->brand_id         = $brand_id;
    $this->price            = $price;
    $this->quantity         = $quantity;
    $this->point_of_restock = $point_of_restock;
    $this->active      = $active;
    $this->image            = $image;
    $this->description      = $description;
    }

    public function create() {
    global $db;

    $sql = "INSERT INTO products (
                name,
                category_id,
                brand_id,
                price,
                quantity,
                point_of_restock,
                active,
                image,
                description
            ) VALUES (
                '$this->name',
                $this->category_id,
                $this->brand_id,
                $this->price,
                $this->quantity,
                $this->point_of_restock,
                $this->active,
                " . ($this->image ? "'$this->image'" : "NULL") . ",
                " . ($this->description ? "'$this->description'" : "NULL") . "
            )";

    $result = $db->query($sql);

    if ($result) {
        return $db->insert_id; // return new product ID
    } else {
        return $db->error;
    }
}
static public function readAll(){
    global $db;
    $sql = "select p.id, p.name , p.price, p. quantity, b.name as brand , c.name as category, p.active, p.image
    from products p, brands b, categories c
    where p.brand_id=b.id and p.category_id =c.id
     order by id desc";
    $result= $db->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
    }


   
  
}
?>