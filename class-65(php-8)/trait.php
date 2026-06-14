<?php
trait Calculator
{
    public function add($a, $b)
    {
        return $a + $b;
    }
    public function sub($a, $b)
    {
        return $a - $b;
    }
    public function mul($a, $b)
    {
        return $a * $b;
    }
    public function div($a, $b)
    {
        return $a / $b;
    }
}
trait Operation{
    public function power($a, $b){
        return $a ** $b;
    }   
    public function mod($a, $b){
        return $a % $b;
    }
}

class Result {
    use Calculator, Operation;
    public $num1;
    public $num2;
}
$result = new Result();
echo "ADD : ";
echo $result->add(10, 5);
echo "<br>";

echo "SUBSTRACTION : ";
echo $result->sub(10, 5);
echo "<br>";

echo "Multiply : ";
echo $result->mul(10, 5);
echo "<br>";

echo "Division : ";
echo $result->div(50, 2);
echo "<br>";

echo "POWER : ";
echo $result->power(2, 5);
echo "<br>";

echo "MODULAS : ";
echo $result->mod(11, 5);
?>