<?php


namespace App\Controller\v1;

use App\Chain\Segmentation;
use \Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class RecommendationController
{
    /**
     * @Route("/recommendation", name="recommendation")
     */
    public function recommendation(Request $request)
    {
        return new JsonResponse([
            'status' => 'success',
            'data' =>$request->request->get('id')
        ]);
    }
}