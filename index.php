<?php
class Car
{
  public $make_type;
  public $cost;
  public $distance;
  public $status;

  function __construct($make_model = "Vehicle", $price = 100, $miles = "Many", $condition = "Good"){
    $this->make_type = $make_model;
    $this->cost = $price;
    $this->distance = $miles;
    $this->status = $condition;
  }
  function setPrice($new_price) {

  }
  function getPrice()
  {
    return $this->cost;
  }

}



$porsche = new Car("2014 Porsche 911", 114991, 7864, "Lightly used");
$ford = new Car("2011 Ford F450", 55995, 14241);
$lexus = new Car("2013 Lexus RX 350", 44700, 20000);
$mercedes = new Car("2025 Mercedes Benz CLS550", 3990000, 37979, "Fantastic");

$cars = array($porsche, $ford, $lexus, $mercedes);

$cars_matching_search = array();
foreach ($cars as $car) {
    if ($car->cost < $_GET["price"]) {
        array_push($cars_matching_search, $car);
    }
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
              echo "<li> $$car->cost </li>";
              echo "<li> Miles: $car->distance </li>";
              echo "<li> Condition: $car->status </li>";
          echo "</ul>";
      }
      ?>
    </ul>
  </body>
</html>
