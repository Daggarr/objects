<?php

class CovidData
{
    private array $covidData;

    public function __construct()
    {
        $this->covidData = [];
    }

    public function readCovidData()
    {
        $this->covidData = [];

        $open = fopen("covid/covid_19_valstu_saslimstibas_raditaji.csv",'r');

        while (($data = fgetcsv($open, 1000, ";")) !== false)
        {
            $this->covidData[] = new CountryData(
                $this->formatData($data[0]),
                $this->formatData($data[1]),
                $this->formatData($data[2]),
                $this->formatData($data[3]),
                $this->formatData($data[4]),
                $this->formatData($data[5]),
                $this->formatData($data[6]),
                $this->formatData($data[7]),
                $this->formatData($data[8]),
                $this->formatData($data[9]),
                $this->formatData($data[10]),
            );
        }

        fclose($open);
    }

    public function formatData($formatting)
    {
        if (strlen($formatting) > 25) {
            return substr($formatting, 0, 25)."...";
        }
        else
        {
            return $formatting;
        }
    }

    public function getCovidData(): array
    {
        return $this->covidData;
    }

    public function filterByCountry($country): array
    {
        $filteredArray = [];

        foreach ($this->covidData as $row)
        {
            if ($row->getCountry() === $country)
            {
                $filteredArray[] = $row;
            }
        }
        return $filteredArray;
    }

}