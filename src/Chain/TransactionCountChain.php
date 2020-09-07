<?php


namespace App\Chain;


class TransactionCountChain extends AbstractHandler
{
    public function handle(array $result)
    {
        $result['transaction_count'] = $result['user']->getTransactions()->count();
        return parent::handle($result);
    }
}