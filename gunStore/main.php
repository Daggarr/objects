<?php

require_once 'buyer.php';
require_once 'gunStore.php';
require_once 'rifle.php';
require_once 'weapon.php';
require_once 'handgun.php';
require_once 'cash.php';
require_once 'creditcard.php';
require_once 'paypal.php';
require_once 'paymentMethods.php';

$gunStore = new GunStore();

$gunStore->addHandgun(new Handgun("Glock", 250));
$gunStore->addRifle(new Rifle("Bergara", 950));
$gunStore->displayGuns();
$gunStore->paymentMethods();

