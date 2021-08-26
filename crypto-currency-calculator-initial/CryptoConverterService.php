<?php

require 'CryptoCurrenciesRepository.php';

class CryptoConverterService
{
    public function __construct(private CryptoCurrenciesRepository $repository) {}

    public function convertSellPrice(string $baseCurrency, string $quoteCurrency, float $amount): ?float
    {
        $prices = $this->repository->getCryptoPrice($baseCurrency);
        foreach ($prices as $price){
            if($price['quote_currency_symbol']['en']===$quoteCurrency){
                return $price['sell'] * $amount;
            }
        }
    }

    public function convertBuyPrice(string $baseCurrency, string $quoteCurrency, float $amount): ?float
    {
        $prices = $this->repository->getCryptoPrice($baseCurrency);
        foreach ($prices as $price){
            if($price['quote_currency_symbol']['en']===$quoteCurrency){
                return $price['buy'] * $amount;
            }
        }
    }
}

$repo = new CryptoCurrenciesRepository();
$convert = new CryptoConverterService($repo);
echo $convert->convertSellPrice('win','btc',5);

