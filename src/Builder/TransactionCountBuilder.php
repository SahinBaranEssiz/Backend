<?php


namespace App\Builder;

use JsonSerializable;


class TransactionCountBuilder implements JsonSerializable
{
    private $transactionsCount;


    public function __construct($transactionsCount)
    {
        $this->transactionsCount = $transactionsCount;
    }


    public function jsonSerialize(){
        return $this->transactionsCount;
    }
}