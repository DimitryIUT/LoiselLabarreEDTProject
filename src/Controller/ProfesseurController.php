<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProfesseurRepository;
use App\Entity\Professeur;
use App\Form\ProfesseurType;
use Doctrine\ORM\EntityManagerInterface;

#[Route('/professeurs', name: 'professeurs_')]
class ProfesseurController extends AbstractController
{
    #[Route('/', name: 'list', methods: ['GET'])]
    public function list(ProfesseurRepository $repository): Response
    {
       $professeurs = $repository->findAll();
       return $this->render('professeurs/index.html.twig',[ 'professeurs' => $professeurs]);
    }

    #[Route('/create', name: 'create', methods: ['GET','POST'])]
    public function create(Request $request , EntityManagerInterface $entityManager): Response
    {
        $professeur = new Professeur();
        $form = $this->createForm(ProfesseurType::class, $professeur);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $professeur = $form->getData();

            $entityManager->persist($professeur);
            $entityManager->flush();

            return $this->redirect('/professeurs/');

        }
        return $this->render('professeurs/create.html.twig', ['form'=> $form->createView()]);
    }


    #[Route('/{id}/edit', name: 'edit', methods: ['GET','POST'])]
    public function edit(Request $request, Professeur $professeur,EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ProfesseurType::class, $professeur);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $professeur = $form->getData();

            $entityManager->persist($professeur);
            $entityManager->flush();

            return $this->redirect('/professeurs/');

        }
        return $this->render('professeurs/create.html.twig', ['form'=> $form->createView()]);
    }

    #[Route('/{id}/delete', name: 'delete', methods: ['GET'])]
    public function delete(Professeur $professeur,EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($professeur);
        $entityManager->flush();

        return $this->redirect('/professeurs/');
    }
}
