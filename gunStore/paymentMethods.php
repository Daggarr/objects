<?php
abstract class PaymentMethods
{
    abstract function payForGun($gunNr): void;
}