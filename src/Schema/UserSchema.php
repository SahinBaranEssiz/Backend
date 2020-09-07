<?php


namespace App\Schema;


use JsonSerializable;

class UserSchema implements JsonSerializable
{
    private $id;
    private $transactions;
    private $gender;
    private $type;
    private $age;
    private $nationality;
    private $is_user;
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
        $this->is_user = $user->getIsUser();
        $this->point = $user->getPoint();
        $this->cluster = $user->getCluster();
        $this->name = "User ".$user->getId();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTransactions()
    {
        return $this->transactions;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @return mixed
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * @return mixed
     */
    public function getIsUser()
    {
        return $this->is_user;
    }

    /**
     * @return mixed
     */
    public function getPoint()
    {
        return $this->point;
    }

    /**
     * @return mixed
     */
    public function getCluster()
    {
        return $this->cluster;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }


    public function jsonSerialize()
    {
        return[
            'id' => $this->getId(),
            'gender' => $this->getGender(),
            'type' => $this->getType(),
            'age' => $this->getAge(),
            'nationality' => $this->getNationality(),
            'is_user' => $this->getIsUser(),
            'point' => $this->getPoint(),
            'cluster' => $this->getCluster()

        ];
    }
}