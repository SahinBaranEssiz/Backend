<?php


namespace App\Builder;


use JsonSerializable;

class TransactionBuilder implements JsonSerializable
{
    private $id;
    private $user;
    private $origin;
    private $destination;
    private $departure;
    private $isOneWay;
    private $amount;
    private $economy;
    private $big;
    private $ss;
    private $promo;
    private $environment;
    private $ticketDate;
    private $airline;
    private $passenger;
    private $senior;
    private $adult;
    private $student;
    private $child;
    private $woman;
    private $man;
    private $transactionStatus;
    private $isInstallment;
    private $dtf;


    public function __construct($transaction)
    {
        $this->id = $transaction->getId();
        $this->user = $transaction->getUser();
        $this->origin = $transaction->getOrigin();
        $this->destination = $transaction->getDestination();
        $this->departure = $transaction->getDeparture();
        $this->isOneWay = $transaction->getIsoneway();
        $this->amount = $transaction->getAmount();
        $this->economy = $transaction->getEconomy();
        $this->big = $transaction->getBig();
        $this->ss = $transaction->getSs();
        $this->promo = $transaction->getPromo();
        $this->environment = $transaction->getEnvironment();
        $this->ticketDate = $transaction->getTicketDate();
        $this->airline = $transaction->getAirline();
        $this->passenger = $transaction->getPassenger();
        $this->senior = $transaction->getSenior();
        $this->adult = $transaction->getAdult();
        $this->student = $transaction->getStudent();
        $this->child = $transaction->getChild();
        $this->woman = $transaction->getWoman();
        $this->man = $transaction->getMan();
        $this->transactionStatus = $transaction->getTransactionStatus();
        $this->isInstallment = $transaction->getIsInstallment();
        $this->dtf = $transaction->getDtf();
    }


    public function jsonSerialize()
    {
        return[
            'id' => $this->id,
            'user' => $this->user,
            'origin' => $this->origin,
            'destination' => $this->destination,
            'departure' => $this->departure,
            'isOneWay' => $this->isOneWay,
            'amount' => $this->amount,
            'economy' => $this->economy,
            'big' => $this->big,
            'ss' => $this->ss,
            'promo' => $this->promo,
            'environment' => $this->environment,
            'ticketDate' => $this->ticketDate,
            'airline' => $this->airline,
            'passenger' => $this->passenger,
            'senior' => $this->senior,
            'adult' => $this->adult,
            'student' => $this->student,
            'child' => $this->child,
            'woman' => $this->woman,
            'man' => $this->man,
            'transactionStatus' => $this->transactionStatus,
            'isInstallment' => $this->isInstallment,
            'dtf' => $this->dtf
        ];
    }
}