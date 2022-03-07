<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProfesseurRepository;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use App\Entity\Professeur;
use App\Entity\Avis;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;



#[Route('/api/professeurs', name: 'api_professeurs')]
class ProfesseurController extends AbstractController
{
    #[Route('', name: 'list', methods: ['GET'])]
    public function list(ProfesseurRepository $repository): Response
    {
        $professeurs = $repository->findAll();

        /*$response = new Response();
        $response->setStatusCode(Response::HTTP_OK);
        $response->setContent(
        
            return $this->json(array_map(fn ($professeur) => $professeur->toArray(), $professeurs),200);
        );
        $response->headers->set('Content-Type','application/json');

        return $response;
       */

      return $this->json($professeurs,200);
    }

    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(Professeur $professeur = null): JsonResponse
    {
        if (is_null($professeur))
        {
            return $this->json(['message' => 'Ce professeur est introuvable'],404);
        }
        return $this->json($professeur,200);
    }

    #[Route('/{id}/avis', name: 'avis', methods: ['GET'])]
    public function avis(Professeur $professeur = null): JsonResponse
    {
        if (is_null($professeur))
        {
            return $this->json(['message' => 'Ce professeur est introuvable'],404);
        }
        return $this->json($professeur->getAvis()->toArray(),200);
    }

    #[Route('/{id}/avis', name: 'create_avis', methods:['POST'])]
    public function createAvis(Request $request , Professeur $professeur = null, EntityManagerInterface $entityManager, ValidatorInterface $validator): JsonResponse
    {
        if (is_null($professeur))
        {
            return $this->json(['message' => 'Ce professeur est introuvable'],404);
        }

        $data = json_decode($request->getContent(), true);
        
        $avis = (new Avis)
            ->fromArray($data)
            ->setProfesseur($professeur);

            $errors = $validator->validate($avis);

            if($errors->count() > 0) {
            return $this->json($this->formatErrors($errors), 400);
        }

            $entityManager->persist($avis);
            $entityManager->flush();

            return new JsonResponse($avis,201);
       
    }

    private function formatErrors(ConstraintViolationListInterface $errors): array
    {
        $messages = [];
        foreach ($errors as $error){
            $messages[$error->getPropertyPath()] = $error->getMessage();
        }
        return $messages;
    }

    #[Route('/avis/{id}', name: 'delete_avis', methods:['DELETE'])]
    public function deleteAvis(EntityManagerInterface $entityManager, Avis $avis = null) : JsonResponse
    {
        if(!$avis) {
            return new JsonResponse([
                "message" => "cet avis n'existe pas"
            ], 404);
        }

        $entityManager->remove($avis);
        $entityManager->flush();

        return new JsonResponse(null, 204);
    }

    #[Route('/avis/{id}', name: 'edit_avis', methods:['PATCH'])]
    public function editAvis(EntityManagerInterface $entityManager, Avis $avis = null, Request $request, ValidatorInterface $validator) : JsonResponse
    {
        if(is_null($avis)) {
            return new JsonResponse([
                "message" => "cet avis n'existe pas"
            ], 404);
        }

        $data = json_decode($request->getContent(),true);

       // $avis->fromArray($data);
       $missingProperties = $avis->updateFromArray($data);

       if (count($missingProperties) > 0)
       {
           $messages = [];
           foreach ($missingProperties as $property)
           {
               $messages[$property] = "Cette propriété n'existe pas";
           }
           return new JsonResponse(['message' => $messages], 400);
       }


        $errors = $validator->validate($avis);

            if($errors->count() > 0) {
            return $this->json(['message' => $this->formatErrors($errors)], 400);
        }

        $entityManager->persist($avis);
        $entityManager->flush();

        return $this->json($avis,200);
    }
}
