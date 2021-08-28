<?php

class CryptoPriceTracker
{
    public function __construct(
        private CryptoCurrenciesRepository $repository,
        private PDO $pdo
    ) {}

    private function getCryptoPrice(string $symbol): array
    {
        $data = $this->repository->getAllCryptoPrices();
        $result = [];
        foreach($data as $index=>$element){
            if($element['quote_currency_symbol']['en']===$symbol){
                $result[]= $element;
            }
        }
        return empty($result) ? '' : $result;
    }

    public function trackPrices(): void
    {
        $arr= $this->getCryptoPrice('irr');

        foreach($arr as $element){
            $name=$element['base_currency_symbol']['fa'];
            $symbol=$element['base_currency_symbol']['en'];
            $id= $element['base_currency_id'];
            $sql="SELECT * FROM crypto_currencies 
                  WHERE name = '$name' AND symbol = '$symbol'";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $row=$stmt->fetch();
            if(empty($row)){
                $sql="insert into crypto_currencies values($id,'$name','$symbol')";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute();
                $row=['id'=>$id,'name'=>$name,'symbol'=>$symbol];
            }

            $crypto_currency_id = $row['id'];
            $open_price         = $element['financial']['last24h']['open'];
            $close_price        = $element['financial']['last24h']['close'];
            $highest_price      = $element['financial']['last24h']['highest'];
            $lowest_price       = $element['financial']['last24h']['lowest'];
            $sell_price         = $element['sell'];
            $buy_price          = $element['buy'];
            $at                 = time();

            $sql="insert into crypto_prices (
                                       crypto_currency_id,
                                       at,
                                       open_price,
                                       close_price,
                                       highest_price,
                                       lowest_price,
                                       sell_price,
                                       buy_price
                                       )
                  values($crypto_currency_id,
                         now(),
                         $open_price,
                         $close_price,
                         $highest_price,
                         $lowest_price,
                         $sell_price,
                         $buy_price)
                 ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        }
    }
}
