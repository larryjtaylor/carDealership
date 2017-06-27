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
  function getMiles()
  {
    return $this->distance;
  }

}

?>
