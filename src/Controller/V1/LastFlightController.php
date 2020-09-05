<?php

namespace App\Controller\V1;

use App\Builder\TransactionBuilder;
use App\Controller\AbstractResponses;
use App\Entity\Transaction;
use App\Entity\User;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
* @Route("/lastflight/{id}", name="lastflight")
*/
class LastFlightController extends AbstractResponses
{

    private function getLastTransaction($user)
    {
        return $this->getDoctrine()
            ->getRepository(Transaction::class)
            ->findBy(
                ['user' => $user->getId()],
                ['ticketDate'=>'DESC'],
                1
            );
    }


    public function __invoke(User $user = null): JsonResponse
    {
        if($user){
            $transaction = $this->getLastTransaction($user);
            if($transaction){
                $data = new TransactionBuilder(reset($transaction)); //reset for getting array first element
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
