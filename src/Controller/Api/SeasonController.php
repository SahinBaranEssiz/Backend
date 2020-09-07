<?php


namespace App\Controller\Api;


use App\Builder\TransactionBuilder;
use App\Controller\AbstractController;
use App\Entity\Transaction;
use App\Entity\User;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/season/{id}", name="season")
 */
class SeasonController extends AbstractController
{

    public function getSeason($user){
        $summer = 0;
        $winter = 0;
        $spring = 0;
        $autumn = 0;

        $travels = $this->getDoctrine()
            ->getRepository(Transaction::class)
            ->findBy(
                ['user' => $user->getId()]
            );

        foreach ($travels as $travel){
            $month = (int)$travel->getTicketDate()->format('m');

            if ($month>=3  && $month<=5){
                $spring++;
            }
            elseif ($month>=6  && $month<=8) {
                $summer++;
            }
            elseif ($month>=9  && $month<=11) {
                $autumn++;
            }
            else {
                $winter++;
            }
        }
        $maxFlight = max([$autumn,$winter,$summer,$spring]);
        $result = array();

        if($summer == $maxFlight){
            $result[] = 'summer';
        }if($spring == $maxFlight){
            $result[] = 'spring';
        }if($autumn == $maxFlight){
            $result[] = 'autumn';
        }if($winter == $maxFlight){
            $result[] = 'winter';
        }

        return $result;
    }

    public function __invoke(User $user = null): JsonResponse
    {
        if($user){
            $season = $this->getSeason($user);
//            $data = new TransactionBuilder($season); //reset for getting array first element
            $response = $this->successJsonResponse(array($season));
        }else{
            $data = ["Kullanıcı bulunamadı..."];
            $response = $this->errorJsonResponse(array($data));
        }
        return $response;
    }

}