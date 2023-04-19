<?php

namespace App;
class App
{
    protected float $howMuch;
    protected string $toCurrency;
    protected object $convert;

    public function __construct($howMuch, $toCurrency)
    {
        $this->toCurrency = $toCurrency;
        $this->howMuch = $howMuch;

    }

    public function start(): void
    {
        $currencyRates = new ClientRequest();
        $this->convert = new Models\Convert($currencyRates->getCurrencyRates(), $this->howMuch, $this->toCurrency);
    }

    public function getConvert(): object
    {
        return $this->convert;
    }
}
