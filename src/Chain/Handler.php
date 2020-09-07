<?php


namespace App\Chain;


interface Handler
{
    public function setNext(Handler $handler): Handler;

    public function handle(array $result);
}