<?php

class CryptoPriceTracker
{
    public function __construct(
        private CryptoCurrenciesRepository $repository,
        private PDO $pdo
    ) {}

    public function trackPrices(): void
    {
        // TODO: Implement
    }
}
