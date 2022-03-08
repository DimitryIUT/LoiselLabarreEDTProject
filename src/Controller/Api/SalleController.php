<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\SalleRepository;

#[Route('/api/salles', name: 'api_salle')]
class SalleController extends AbstractController
{
    #[Route('', name: '_index',methods: ['GET'])]
    public function index(SalleRepository $repository): Response
    {
        $salles = $repository->findAll();
        return $this->json($salles,200);
    }
}
