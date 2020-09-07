<?php


namespace App\Builder;

use JsonSerializable;


class JourneyCountBuilder implements JsonSerializable
{
    private $journeyCount;


    public function __construct($journeyCount)
    {
        $this->journeyCount = $journeyCount;
    }


    public function jsonSerialize(){
        return $this->journeyCount;
    }
}