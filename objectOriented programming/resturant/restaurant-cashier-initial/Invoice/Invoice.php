<?php

namespace Invoice;
include 'InvoiceRecord.php';


class Invoice
{
    private $distance;
    private $records=[];

    public function __construct($distance)
    {
        $this->distance = $distance;
    }
    public function addRecord(InvoiceRecord $record)
    {
        $this->records[] = $record;
        return $this;
    }
    public function getRecords()
    {
        return $this->records;
    }
    public function getTotalPrice()
    {
        $result=0;
        foreach($this->records as $record){
            $result+=$record->getFinalPrice($this->distance);
        }
        return $result;
    }
}
