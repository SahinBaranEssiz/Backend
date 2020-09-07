<?php

namespace App\Service;

use App\Builder\TransactionBuilder;
use App\Controller\AbstractController;
use App\Entity\Transaction;
use App\Entity\User;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class LastFlight extends AbstractController
{

    private function getLastTransaction($user)
    {
        return $this->getDoctrine()
            ->getRepository(Transaction::class)
            ->findOneBy(
                ['user' => $user],
                ['ticketDate'=>'DESC']
            );
    }


    public function __invoke(User $user): JsonResponse
    {
        dd($user->getTransactions()->first());
        if($user){
            if($transaction = $this->getLastTransaction($user)){
                $data = new TransactionBuilder($transaction); //reset for getting array first element
                $response = $this->successJsonResponse(array($data));
            }else{
                $data = ["Transaction bulunamadı..."];
                $response = $this->errorJsonResponse(array($data));
            }
        }else{
            $data = ["Kullanıcı bulunamadı..."];
            $response = $this->errorJsonResponse(array($data));
        }
        return $response;
    }

}
