<?php

class CryptoCurrenciesRepository
{
    private string $baseUrl = "https://publicapi.ramzinex.com";

    public function setBaseUrl(string $baseUrl): void
    {
        $this->baseUrl = $baseUrl;
    }

    public function getAllCryptoPrices(): array
    {
        // TODO: Implement
    }
}
