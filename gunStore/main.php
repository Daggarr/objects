<?php

require_once 'buyer.php';
require_once 'gunStore.php';
require_once 'rifle.php';
require_once 'weapon.php';
require_once 'handgun.php';

$customer = new Buyer(500, ['HCL']);
$gunStore = new GunStore($customer);

$gunStore->addHandgun(new Handgun("Glock", 250));
$gunStore->addRifle(new Rifle("Bergara", 950));
$gunStore->displayGuns();

$gunNr = readline("Enter number of which gun you would like to buy: ");

$gunStore->buyGun($gunNr);