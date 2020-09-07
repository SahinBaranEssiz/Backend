<?php


namespace App\Controller\v1;

use App\Builder\UserSchemaBuilder;
use App\Chain\Deneme;

use App\Chain\Segmentation;

use App\Controller\AbstractController;
use App\Entity\User;
use \Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SegmentationController extends AbstractController
{
    /**
     * @Route("/segmentation", name="segmentation")
     */
    public function segmentation(Request $request)
    {
//        $data = json_decode($request->getContent(), true);
//        $request->request->replace(is_array($data) ? $data : array());

        $result = $this->getDoctrine()->getRepository(User::class)->find(1);

        return new JsonResponse([
            'status' => 'success',
            'data' => (new Segmentation())->chain($result)
        ]);
    }

    /**
     * @Route("/deneme", name="deneme")
     */
    public function deneme()
    {
        $user = $this->getDoctrine()->getRepository(User::class)->find(2);
        $x = (new Segmentation())->chain($user);
        dd($x);
        return new JsonResponse($x,Response::HTTP_OK);
    }

    /**
     * @Route("/denemeSchema/{id}", name="denemeSchema")
     */
    public function denemeSchema(User $user)
    {
        $x = (new UserSchemaBuilder())->build($user);
        dd($x);
        return new JsonResponse(['x'=>5],Response::HTTP_OK);
    }
}