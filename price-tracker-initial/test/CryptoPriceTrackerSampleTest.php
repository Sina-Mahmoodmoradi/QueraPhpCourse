<?php

use PHPUnit\Framework\TestCase;

final class CryptoPriceTrackerSampleTest extends TestCase
{
    private static $answer_files = [
        'CryptoCurrenciesRepository.php',
        'CryptoPriceTracker.php'
    ];
    private static $pid = 0;
    private static $base_url = 'http://127.0.0.1:8080';
    private static $server_dir = __DIR__.'/sample-server';
    private static $db_host = 'localhost';
    private static $db_username = 'root';
    private static $db_password = '';
    private static $db_name = 'ramzinex';
    private static $db;
    private static $initialization_query = '
        DROP TABLE IF EXISTS crypto_currencies;
        DROP TABLE IF EXISTS crypto_prices;
        DROP TABLE IF EXISTS publishers;
        CREATE TABLE `crypto_currencies` (
          `id` bigint(20) UNSIGNED NOT NULL,
          `name` varchar(255) NOT NULL,
          `symbol` varchar(255) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        CREATE TABLE `crypto_prices` (
          `id` bigint(20) UNSIGNED NOT NULL,
          `crypto_currency_id` bigint(20) UNSIGNED NOT NULL,
          `at` datetime NOT NULL,
          `open_price` decimal(20,6) UNSIGNED NOT NULL,
          `close_price` decimal(20,6) UNSIGNED NOT NULL,
          `highest_price` decimal(20,6) UNSIGNED NOT NULL,
          `lowest_price` decimal(20,6) UNSIGNED NOT NULL,
          `sell_price` decimal(20,6) UNSIGNED NOT NULL,
          `buy_price` decimal(20,6) UNSIGNED NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ALTER TABLE `crypto_currencies`
          ADD PRIMARY KEY (`id`);
        ALTER TABLE `crypto_prices`
          ADD PRIMARY KEY (`id`),
          ADD KEY `crypto_currency_id` (`crypto_currency_id`);
        ALTER TABLE `crypto_currencies`
          MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
        ALTER TABLE `crypto_prices`
          MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
        ALTER TABLE `crypto_prices`
          ADD CONSTRAINT `crypto_prices_ibfk_1` FOREIGN KEY (`crypto_currency_id`) REFERENCES `crypto_currencies` (`id`);
    ';

    public static function setUpBeforeClass(): void
    {
        foreach (self::$answer_files as $answer_file) {
            require __DIR__.'/../'.$answer_file;
        }
        $db = new PDO('mysql:host=' . self::$db_host, self::$db_username, self::$db_password);
        $db->exec('DROP DATABASE IF EXISTS ' . self::$db_name . ';CREATE DATABASE ' . self::$db_name);
        $db = null;
        self::$db = new PDO('mysql:host=' . self::$db_host . ';dbname=' . self::$db_name, self::$db_username, self::$db_password);
        self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $op = [];
        exec('nohup php -S ' . str_replace('http://', '', self::$base_url) . ' -t ' . self::$server_dir . ' ' . self::$server_dir . '/server.php > /dev/null 2>&1 & echo $!', $op);
        sleep(3);
        self::$pid = $op[0];
    }

    public function setUp(): void
    {
        self::$db->exec(self::$initialization_query);
    }

    public function testTrackPrices()
    {
        $repository = new CryptoCurrenciesRepository();
        $repository->setBaseUrl(self::$base_url);
        $tracker = new CryptoPriceTracker($repository, self::$db);
        $tracker->trackPrices();

        $sql = 'SELECT * FROM crypto_currencies';
        $stmt = self::$db->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->assertEquals([['id' => '1', 'name' => 'بیت کوین', 'symbol' => 'btc']], $rows);

        $prices = [[
            'id' => 1,
            'crypto_currency_id' => 1,
            'at' => date('Y-m-d H:i:s'),
            'open_price' => 8321054538,
            'close_price' => 7890499250,
            'highest_price' => 8950000000,
            'lowest_price' => 7890499250,
            'sell_price' => 7890489999,
            'buy_price' => 7890490000
        ]];
        $sql = 'SELECT * FROM crypto_prices';
        $stmt = self::$db->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        for ($i = 0; $i < count($prices); $i++) {
            foreach ($prices[$i] as $key => $value) {
                if ($key == 'at') {
                    $this->assertEqualsWithDelta(strtotime($prices[$i][$key]), strtotime($rows[$i][$key]), 5);
                } else {
                    $this->assertEquals((float) $prices[$i][$key], (float) $rows[$i][$key]);
                }
            }
        }
    }

    public static function tearDownAfterClass(): void
    {
        self::$db->exec('DROP DATABASE IF EXISTS ' . self::$db_name);
        exec('kill '.self::$pid);
    }
}
