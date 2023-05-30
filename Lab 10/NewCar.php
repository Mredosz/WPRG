<?php

class NewCar
{
protected $made;
protected $price;
 protected $eurToPln = 4.51;

public function calculatePrice($price){
    $car = new NewCar();
    return $price* $car->eurToPln;
}

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }



}