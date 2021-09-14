<?php

class CountryData
{
    private string $date;
    private string $country;
    private string $numberOfCovid;
    private string $traveling;
    private string $selfIsolation;
    private string $vaccSelfIsolationLatvia;
    private string $vaccTestBeforeArrival;
    private string $vaccTestAfterArrival;
    private string $SelfIsolationLatvia;
    private string $TestBeforeArrival;
    private string $TestAfterArrival;

    public function __construct(string $date,
                                string $country,
                                string  $numberOfCovid,
                                string $traveling,
                                string $selfIsolation,
                                string $vaccSelfIsolationLatvia,
                                string $vaccTestBeforeArrival,
                                string $vaccTestAfterArrival,
                                string $SelfIsolationLatvia,
                                string $TestBeforeArrival,
                                string $TestAfterArrival
    )
    {
        $this->date = $date;
        $this->country = $country;
        $this->numberOfCovid = $numberOfCovid;
        $this->traveling = $traveling;
        $this->selfIsolation = $selfIsolation;
        $this->vaccSelfIsolationLatvia = $vaccSelfIsolationLatvia;
        $this->vaccTestBeforeArrival = $vaccTestBeforeArrival;
        $this->vaccTestAfterArrival = $vaccTestAfterArrival;
        $this->SelfIsolationLatvia = $SelfIsolationLatvia;
        $this->TestBeforeArrival = $TestBeforeArrival;
        $this->TestAfterArrival = $TestAfterArrival;
    }

}