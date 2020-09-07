<?php


namespace App\Chain;


abstract class AbstractHandler implements Handler
{
    private $next_handler;
    public function setNext(Handler $handler): Handler
    {
        $this->next_handler = $handler;
        return $handler;
    }

    public function handle(array $result)
    {
        if($this->next_handler){
            return $this->next_handler->handle($result);
        }
        return $result;
    }
}