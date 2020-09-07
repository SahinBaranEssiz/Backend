<?php

namespace App\Service;

use App\Builder\JourneyCountBuilder;
use App\Controller\AbstractController;
use App\Entity\User;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class Userx extends AbstractController
{

    public function __invoke(Userx $user): JsonResponse
    {
        if($user){
            $data = new JourneyCountBuilder($user);
            $response = $this->successJsonResponse([$data]);
        }else{
            $data = ["Kullanıcı bulunamadı..."];
            $response = $this->errorJsonResponse(array($data));
        }
        return $response;
    }

//    /**
//     * @Route("/user/{id}", name="getUser")
//     */
//    public function getUser(User $user)
//    {
//        dd($user);
//        return null;
//    }
}
