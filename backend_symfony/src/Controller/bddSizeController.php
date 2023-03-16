<?php

namespace App\Controller;
use App\Repository\Bdd2Repository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class bddSizeController extends AbstractController
{
    #[Route('/bdd-size', name: 'bdd-size')]
    public function bddSize(Bdd2Repository $BddRepository): JsonResponse
    {
        ;
        return $this->json([
            'tags' => $BddRepository->getBddSize('User')->findAll()
        ]);
        //return $this->json([
        //    'bddsize' => $BddRepository->getBddSize('User'),
        //]);

    }
}
