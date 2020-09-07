<?php


namespace App\Service;


use App\Builder\JourneyCountBuilder;
use App\Controller\AbstractController;
use App\Entity\Transaction;
use App\Entity\User;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;


class JourneyCount extends AbstractController
{
    public function getJourneyCount($user){

        $transactions = $this->getDoctrine()
            ->getRepository(Transaction::class)
            ->findBy(
                ['user' => $user->getId()]
            );

        $destinations = array();

        foreach ($transactions as $t){
            $destinations[] = $t->getDestination();
        }

        return count(array_count_values($destinations));
    }
//
//    /**
//     * @Route("/journey/{id}", name="journey")
//     */
//    public function journey(User $user): JsonResponse
//    {
//        if($user){
//            $journeyCount = $this->getJourneyCount($user);
//            $data = new JourneyCountBuilder($journeyCount); //reset for getting array first element
//            $response = $this->successJsonResponse(['journeyCount'=>$data]);
//        }else{
//            $data = ["Kullanıcı bulunamadı..."];
//            $response = $this->errorJsonResponse(array($data));
//        }
//        return $response;
//    }
}