<?php

class CryptoConverterService
{
    public function __construct(private CryptoCurrenciesRepository $repository) {}

    public function convertSellPrice(string $baseCurrency, string $quoteCurrency, float $amount): ?float
    {
        // TODO: Implement
    }

    public function convertBuyPrice(string $baseCurrency, string $quoteCurrency, float $amount): ?float
    {
        // TODO: Implement
    }
}