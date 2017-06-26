<?php
class Car
{
  public $make_type;
  private $cost;
  public $distance;
  public $status;
  public $picture;

  function __construct($make_model, $price, $miles = 7864, $condition, $image_location){
    $this->make_type = $make_model;
    $this->cost = $price;
    $this->distance = $miles;
    $this->status = $condition;
    $this->picture = $image_location;
  }
  function setPrice($new_price) {
    $this->cost = $new_price;
  }
  function getPrice()
  {
    return $this->cost;
  }

}


$porsche = new Car("2011 Porsche 911", 114991, 7864, "Lightly used", "porsche.jpg");
$ford = new Car("2008 Ford F450", 80000, 14241, "Brilliant", "ford.jpeg");
$lexus = new Car("2016 Lexus RX 350", 44700, 20000, "Shiney", "Lexus.png");
$mercedes = new Car("2025 Mercedes Benz CLS550", 3990000, 37979, "Fantastic", "Mercedes.png");

$cars = array($porsche, $ford, $lexus, $mercedes);

$cars_matching_search = array();
foreach ($cars as $car) {
    if ($car->getPrice() < $_GET["price"]) {
        array_push($cars_matching_search, $car);
      }
    // } else if ($car->getMake_model() < $_GET["make_model"]) {
    //     array_push($cars_matching_search, $car);
    // } else if ($car->getMiles() < $_GET["miles"]) {
    //     array_push($cars_matching_search, $car);
    // } else if ($car->getConodition() < $_GET["condition"]) {
    //     array_push($cars_matching_search, $car);
    // }
}
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Your Car Dealership</title>
  </head>
  <body>
    <ul>
      <?php
      foreach ($cars_matching_search as $car) {
          echo "<li> $car->make_type </li>";
          echo "<ul>";
              echo "<li> <img src = img/$car->picture> </li>";
              $car_price = $car->getPrice();
              echo "<li> $$car_price </li>";
              echo "<li> Miles: $car->distance </li>";
              echo "<li> Condition: $car->status </li>";
          echo "</ul>";
      }
      ?>
    </ul>
  </body>
</html>
