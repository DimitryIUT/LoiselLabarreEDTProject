<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CoursRepository;

#[Route('/api/cours', name: 'api_cours')]
class CoursController extends AbstractController
{
    #[Route('', name: '_index',methods: ['GET'])]
    public function index(CoursRepository $repository): Response
    {
        $cours = $repository->findAll();
        return $this->json($cours,200);
    }
}
