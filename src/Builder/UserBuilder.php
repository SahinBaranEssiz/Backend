<?php


namespace App\Builder;

use JsonSerializable;


class UserBuilder implements JsonSerializable
{
    private $id;
    private $transactions;
    private $gender;
    private $type;
    private $age;
    private $nationality;
    private $isUser;
    private $point;
    private $cluster;

    private $name;


    public function __construct($user)
    {
        $this->id = $user->getId();
        $this->transactions = $user->getTransactions();
        $this->gender = $user->getGender();
        $this->type = $user->getType();
        $this->age = $user->getAge();
        $this->nationality = $user->getNationality();
        $this->isUser = $user->getIsUser();
        $this->point = $user->getPoint();
        $this->cluster = $user->getCluster();

        $this->name = 'User '.$user->getId();
    }


    public function jsonSerialize(){
        return[
            'user'=>[
                'id' => $this->id,
                'transactions' => $this->transactions,
                'gender' => $this->gender,
                'type' => $this->type,
                'age' => $this->age,
                'nationality' => $this->nationality,
                'isUser' => $this->isUser,
                'point' => $this->point,
                'cluster' => $this->cluster,
                'name' => $this->name
            ]
        ];
    }
}