<?php


namespace App\Chain;


class JourneyCountChain extends AbstractHandler
{
    public function handle(array $result)
    {
        $result['journey_count'] = $result['user']->getTransactions()->count();
        return parent::handle($result);
    }
}