<?php 
class Car {
    // 1. property (noun)
    public $color = "";
    public $model = "";
    public $year = "";
    public $brand = "";
    // 2. method (verb)
    public function getBrand() {
        return $this->brand;
    }
    public function setBrand($brand) {
        $this->brand = $brand;
    }
    public function message()
    {
        return "My car is a " . $this->color . " " . $this->brand . "!";
    }
    // 3. contructor (special method)
    public function __construct($mycolor, $mybrand)
    {
        $this->color = $mycolor;
        $this->brand = $mybrand;
    }
    // 4. destructor (special method)
    public function __destruct()
    {
        $this->color = "";
        $this->model = "";
        $this->year = "";
        $this->brand = "";
    }
    
}
$myCar = new Car("black", "Ford");
echo $myCar->message();
echo $myCar->color;
echo $myCar->brand;
