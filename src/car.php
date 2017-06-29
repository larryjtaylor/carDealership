<?php
class Car
{
  private $type;
  private $price;
  private $mileage;
  private $condition;
  private $image;


  function __construct($type, $price, $mileage, $condition, $image){
    $this->type = $type;
    $this->price = $price;
    $this->mileage = $mileage;
    $this->condition = $condition;
    $this->image = $image;
  }

  function setImage($image)
  {
    $this->image = (string) $image;
  }

  function getImage()
  {
    return $this->image;
  }

  function setType($image)
  {
    $this->type = (string) $type;
  }

  function getType()
  {
    return $this->type;
  }

  function setPrice($price)
  {
    $this->price = (string) $price;
  }

  function getPrice()
  {
    return $this->price;
  }

  function setMileage($mileage)
  {
      $this->mileage = (string) $mileage;
  }

  function getMileage()
  {
    return $this->mileage;
  }

  function setCondition($condition)
  {
      $this->condition = (string) $condition;
  }

  function getCondition()
  {
    return $this->condition;
  }

   function save()
   {
       array_push($_SESSION['list_of_cars'], $this);
   }
   static function getAll()
   {
       return $_SESSION['list_of_cars'];
   }
   static function deleteAll()
   {
       $_SESSION['list_of_cars'] = array();
   }

}

?>
