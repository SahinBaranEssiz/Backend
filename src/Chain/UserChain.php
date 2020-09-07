<?php


namespace App\Chain;


use App\Builder\UserSchemaBuilder;
use Symfony\Component\HttpFoundation\JsonResponse;

class UserChain extends AbstractHandler
{
    public function handle(array $request)
    {
        $userBuilder = (new UserSchemaBuilder())->build($request['user']);
        $request['userBuilder'] = json_encode($userBuilder, true);
        return parent::handle($request);
    }
}