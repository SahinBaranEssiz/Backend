<?php


namespace App\Chain;


class LastFlightChain extends AbstractHandler
{

    public function getTransactionsSortedByTicketDate($transactions)
    {
        $dates = array();
        foreach($transactions as $t){
            $dates[] = $t->getTicketDate();
        }

        return $transactions[array_search(max($dates), $dates)];
    }

    public function handle(array $result)
    {
        $result['last_flight'] = $this->getTransactionsSortedByTicketDate($result['user']->getTransactions()->getValues());
        return parent::handle($result);
    }
}