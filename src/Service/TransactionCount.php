<?php

namespace App\Service;

use App\Builder\TransactionBuilder;
use App\Builder\TransactionCountBuilder;
use App\Controller\AbstractController;
use App\Entity\Transaction;
use App\Entity\User;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
* @Route("/transactionscount/{id}", name="transactionscount")
*/
class TransactionCount extends AbstractController
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
            $data = new TransactionCountBuilder(count($transactions));
            $response = $this->successJsonResponse(['transactionsCount'=>$data]);
        }else{
            $data = ["Kullanıcı bulunamadı..."];
            $response = $this->errorJsonResponse(array($data));
        }
        return $response;
    }
}
