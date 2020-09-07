<?php


namespace App\Chain;


class Segmentation
{
    private $user_chain;
    private $transaction_count_chain;
    private $season_chain;
    private $last_flight_chain;
    private $journey_count_chain;

    public function __construct()
    {
        $this->user_chain = new UserChain();
        $this->transaction_count_chain = new TransactionCountChain();
        $this->season_chain = new SeasonChain();
        $this->last_flight_chain = new LastFlightChain();
        $this->journey_count_chain = new JourneyCountChain();
    }

    public function chain($user)
    {
        $this->user_chain
            ->setNext($this->transaction_count_chain)
            ->setNext($this->season_chain)
            ->setNext($this->last_flight_chain)
            ->setNext($this->journey_count_chain);

        $result = $this->user_chain->handle(['user'=>$user]);
        $result['user'] = $result['userBuilder'];
        unset($result['userBuilder']);
        return $result;
    }
}