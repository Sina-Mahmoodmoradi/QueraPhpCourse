<?php

class CryptoCurrenciesRepository
{
    private string $baseUrl = "https://publicapi.ramzinex.com";

    public function setBaseUrl(string $baseUrl): void
    {
        $this->baseUrl = $baseUrl;
    }

    private function get($url)
    {
        $cu = curl_init($url);
        curl_setopt($cu, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($cu);
        curl_close($cu);
        $response = json_decode($response, true);
        return $response;
    }

    public function getAllCryptoPrices(): array
    {
        $response = $this->get($this->baseUrl . '/exchange/api/v1.0/exchange/pairs');
        return $response['data'];
    }
}
