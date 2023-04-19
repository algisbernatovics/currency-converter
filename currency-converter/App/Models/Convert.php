<?php

namespace App\Models;

class Convert
{
    protected string $userRequestCurrency;
    protected float $userRequestAmount;
    protected object $currencyRates;
    protected float $userRequestRate;

    protected float $result;

    public function __construct($currencyRates, $amount, $userRequestCurrency)
    {
        $this->userRequestAmount = $amount;
        $this->userRequestCurrency = $userRequestCurrency;
        $this->currencyRates = $currencyRates;
        $this->getRate();
        $this->calculate();
    }

    public function getRate(): float
    {
        {
            foreach ($this->currencyRates->Currencies->Currency as $currency) {
                if ($currency->ID == $this->userRequestCurrency) {
                    $this->userRequestRate = (float)$currency->Rate;

                    return $this->userRequestRate;
                }
            }
            if (!isset($this->userRequestRate)) {
                echo 'Error.Currency or Rate Not Found.' . PHP_EOL;
                die;
            }
        }
        return 0;

    }

    public function calculate()
    {
        $this->result = $this->userRequestRate * $this->userRequestAmount;
    }

    public function getResult(): float
    {
        return $this->result;
    }

    public function getUserRequestCurrency(): string
    {
        return $this->userRequestCurrency;
    }
}
