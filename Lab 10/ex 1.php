<?php
require_once "CarWithExtras.php";
require_once "NewCar.php";
require_once "Insurance.php";

$car = new NewCar();
$car2 = new CarWithExtras();
$car3 = new Insurance();

echo $car->calculatePrice(1000)."<br>";

$car2->setAlarm(800);
$car2->setAc(1000);
$car2->setRadio(500);
//echo $car2 ->getAlarm()."<br>";

echo $car2->calculatePrice(1000)."<br>";

$car3->setYears(20);
echo $car3->calculatePrice(1000);