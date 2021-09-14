<?php
 require_once 'covidData.php';
 require_once 'countryData.php';
 require 'src/LucidFrame/Console/ConsoleTable.php';

 $data = new CovidData();
 $data->readCovidData();

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


$country = readline('Search by country?: ');

if ($country !== "no")
{
    $table2 = new LucidFrame\Console\ConsoleTable();
    $filteredArray = $data->filterByCountry($country);

    $table2->setHeaders(array(
        'Datums','Valsts','Skaits','Izcelosana','Pasizolacija',
        'Vakc_pasizolacija','vakc_TestsPirms','vakc_TestsPec',
        'citi_pasizolacija','citi_TestsPirms','citi_TestsPec'));

    for ($i=1; $i < count($filteredArray); $i++)
    {
        $table2->addRow((array) $filteredArray[$i]);
    }

    $table2->display();
}