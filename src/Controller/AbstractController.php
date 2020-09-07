<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as MustafaController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractController extends MustafaController
{
    public function successJsonResponse(array $data): JsonResponse
    {
        return new JsonResponse([
            'success' => true,
            'data' => $data
        ], Response::HTTP_OK
        );
    }

    public function errorJsonResponse(array $errors): JsonResponse
    {
        return new JsonResponse([
            'success' => false,
            'errors' => $errors
        ], Response::HTTP_NOT_FOUND
        );
    }
}