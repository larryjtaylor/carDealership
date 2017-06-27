<?php
date_default_timezone_set('America/Los_Angeles');
require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/../src/car.php";

$app = new Silex\Application();

$app->get("/", function(){
    return "<!DOCTYPE html>
    <html>
    <head>
        <title>Your Car Dealership's Homepage</title>
    </head>
    <body>
        <h1>Your Car Dealership</h1>
        <form action='/cars'>
            <div class='form-group'>
                <label for='make_model'>Preferred year</label>
                <input id='make_model' name='make_model' class='form-control' type='number'>
            </div><div class='form-group'>
                <label for='price'>Preferred Price</label>
                <input id='price' name='price' class='form-control' type='number'>
            </div><div class='form-group'>
                <label for='distance'>Preferred mileage</label>
                <input id='distance' name='distance' class='form-control' type='number'>
            </div>
            <div class='form-group'>
                <label for='status'>Preferred condition</label>
                <input id='status' name='status' class='form-control' type='text'>
            </div>
            <button type='submit' class='btn'>Go!</button>
        </form>
        <ul>

        </ul>
      </body>
    </html>";
});

    $app->get("/cars", function(){
        $porsche = new Car("2011 Porsche 911", 114991, 7864, "Lightly used", "porsche.jpg");
        $ford = new Car("2008 Ford F450", 80000, 14241, "Brilliant", "ford.jpg");
        $lexus = new Car("2016 Lexus RX 350", 44700, 20000, "Shiney", "lexus.jpg");
        $mercedes = new Car("2025 Mercedes Benz CLS550", 3990000, 37979, "Fantastic", "mercedes.jpg");

        $cars = array($porsche, $ford, $lexus, $mercedes);

        $cars_matching_search = array();

        foreach ($cars as $car) {
        if ($car->getMiles() < $_GET["distance"] && $_GET["price"] == ""){
              array_push($cars_matching_search, $car);
          } elseif ($car->getPrice() < $_GET["price"] && $_GET["distance"] == "") {
              array_push($cars_matching_search, $car);
          } elseif ($car->getPrice() < $_GET["price"] && $car->getMiles() < $_GET["distance"]) {
              array_push($cars_matching_search, $car);
            }
          }
          if (empty($cars_matching_search)) {
              echo "Your search has provided no results!";
          }

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
          return false;
    });
    return $app
?>
