<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/car.php";

     session_start();

     if (empty($_SESSION['list_of_cars'])) {
         $_SESSION['list_of_cars'] = array();
     }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

     $app->get("/", function() use ($app){
        return $app['twig']->render('cars.html.twig', array('cars' => Car::getAll()));
     });

    $app->post("/cars", function() use($app){
        $porsche = new Car("2011 Porsche 911", 114991, 27864, "used", "/../img/porsche.jpg");
        $ford = new Car("2008 Ford F450", 80000, 24241, "used", "/../img/ford.jpg");
        $lexus = new Car("2016 Lexus RX 350", 44700, 20000, "new", "/../img/lexus.jpg");
        $mercedes = new Car("2025 Mercedes Benz CLS550", 3990000, 37979, "new", "/../img/mercedes.jpg");

        $cars = array($porsche, $ford, $lexus, $mercedes);

        $cars_matching_search = array();

            foreach ($cars as $car) {
                if ($car->getPrice() < $_POST['price'] && $car->getMileage() < $_POST['mileage']) {
                    array_push($cars_matching_search, $car);
                }
            }
         return $app['twig']->render('view_cars.html.twig', array('newcar' => $cars_matching_search));

    });
    return $app
?>
