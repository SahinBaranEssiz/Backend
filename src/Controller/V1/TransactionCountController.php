<?php

namespace App\Controller\V1;

use App\Builder\TransactionBuilder;
use App\Controller\AbstractResponses;
use App\Entity\Transaction;
use App\Entity\User;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
* @Route("/transactionscount/{id}", name="transactionscount")
*/
class TransactionCountController extends AbstractResponses
{

    private function getTransactionCount($user)
    {
        return $this->getDoctrine()
            ->getRepository(Transaction::class)
            ->findBy(
                ['user' => $user->getId()]
            );
    }


    public function __invoke(User $user = null): JsonResponse
    {
        if($user){
            $transactions = $this->getTransactionCount($user);
            $response = $this->successJsonResponse(['transactionsCount'=>count($transactions)]);
        }else{
            $data = ["Kullanıcı bulunamadı..."];
            $response = $this->errorJsonResponse(array($data));
        }
        return $response;
    }
}
