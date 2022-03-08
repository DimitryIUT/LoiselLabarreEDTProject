<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CoursRepository;

#[Route('/api/cours', name: 'api_cours_')]
class CoursController extends AbstractController
{
    #[Route('', name: 'index',methods: ['GET'])]
    public function index(CoursRepository $repository): Response
    {
        $cours = $repository->findAll();
        return $this->json($cours,200);
    }

    #[Route('/{date}', name: 'showDaily',methods: ['GET'])]
    public function showDaily($date, CoursRepository $coursRepository): JsonResponse {
        $dateCours = \DateTime::createFromFormat('Y-m-d', $date);

        if (!$dateCours) {
            return $this->json([
                'message' => 'Veuillez entrer la date au format AAAA-MM-JJ'
            ], 404);
        }

        $cours = $coursRepository->findByDate($dateCours);

        return $this->json($cours, 200);
    }
}
