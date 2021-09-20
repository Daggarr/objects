<?php
require_once 'zoo.php';
require_once 'place.php';
require_once 'cage.php';
require_once 'freeroam.php';
require_once 'zooview.php';
require_once 'animal.php';
require_once 'caged.php';
require_once 'freeroaming.php';

$zoo = new Zoo();
$zoo->add(new Cage());
$zoo->add(new Cage());
$zoo->add(new Cage());
$zoo->add(new Freeroam());
$zoo->add(new Freeroam());

$zoo->getSpots()[0]->addAnimal(new Caged('Lion'));
$zoo->getSpots()[1]->addAnimal(new Caged('Tiger'));
$zoo->getSpots()[2]->addAnimal(new Caged('Leopard'));
$zoo->getSpots()[3]->addAnimal(new Freeroaming('Zebra'));
$zoo->getSpots()[4]->addAnimal(new Freeroaming('Giraffe'));

$zooView = new ZooView($zoo);
$zooView->displayAnimals();