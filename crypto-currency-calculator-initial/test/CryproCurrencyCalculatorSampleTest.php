<?php

use PHPUnit\Framework\TestCase;

final class CryproCurrencyCalculatorSampleTest extends TestCase
{
    private static $answer_files = [
        'CryptoCurrenciesRepository.php',
        'CryptoConverterService.php'
    ];
    private static $pid = 0;
    private static $base_url = 'http://127.0.0.1:8080';
    private static $server_dir = __DIR__.'/sample-server';

    public static function setUpBeforeClass(): void
    {
        foreach (self::$answer_files as $answer_file) {
            require __DIR__.'/../'.$answer_file;
        }
        $op = [];
        exec('nohup php -S ' . str_replace('http://', '', self::$base_url) . ' -t ' . self::$server_dir . ' ' . self::$server_dir . '/server.php > /dev/null 2>&1 & echo $!', $op);
        sleep(3);
        self::$pid = $op[0];
    }

    public function testGetAllCryptoPrices()
    {
        $repository = new CryptoCurrenciesRepository();
        $repository->setBaseUrl(self::$base_url);
        $expectedResult = file_get_contents(self::$server_dir.'/response.json');
        $expectedResult = json_decode($expectedResult, true);
        $expectedResult = $expectedResult['data'];
        $this->assertEquals($expectedResult, $repository->getAllCryptoPrices());
    }

    public static function tearDownAfterClass(): void
    {
        exec('kill '.self::$pid);
    }
}
