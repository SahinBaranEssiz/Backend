<?php


namespace App\Builder;



use App\Entity\User;
use App\Schema\UserSchema;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class UserSchemaBuilder extends AbstractController
{
    public static function build(User $user)
    {
        return new UserSchema($user);
    }
//    public function __invoke($id)
//    {
//        $user = $this->getDoctrine()->getRepository(User::class)->find($id);
//        dd($user);
//        return new UserSchema($user);
//    }
}