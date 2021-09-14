<?php
 require_once 'covidData.php';
 require_once 'countryData.php';
 require 'src/LucidFrame/Console/ConsoleTable.php';

 $data = new CovidData();
 $data->readCovidData();




//$covidTable = new LucidFrame\Console\ConsoleTable();
//
//var_dump($data->getCovidData()[0]->getDate());
//
//$covidTable
//    ->addHeader($data->getCovidData()[0]->getDate())
//    ->addHeader($data->getCovidData()[0]->getCountry())
//    ->addRow()
//;

$table = new LucidFrame\Console\ConsoleTable();
$table->setHeaders(array(
    'Datums','Valsts','Skaits','Izcelosana','Pasizolacija',
    'Vakc_pasizolacija','vakc_TestsPirms','vakc_TestsPec',
    'citi_pasizolacija','citi_TestsPirms','citi_TestsPec'));

for ($i=1; $i < count($data->getCovidData()); $i++)
{
    $table->addRow((array) $data->getCovidData()[$i]);
}

$table->display();

