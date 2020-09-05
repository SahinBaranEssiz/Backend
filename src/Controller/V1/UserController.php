<?php

namespace App\Controller\V1;

use App\Builder\UserBuilder;
use App\Controller\AbstractResponses;
use App\Entity\User;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
* @Route("/user/{id}", name="getUser")
*/
class UserController extends AbstractResponses
{

    public function __invoke(User $user = null): JsonResponse
    {
        if($user){
            $data = new UserBuilder($user);
            $response = $this->successJsonResponse([$data]);
        }else{
            $data = ["Kullanıcı bulunamadı..."];
            $response = $this->errorJsonResponse(array($data));
        }
        return $response;
    }
}
