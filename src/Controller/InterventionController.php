<?php

namespace App\Controller;

use App\Entity\Intervention;
use App\Form\InterventionType;
use App\Repository\InterventionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/intervention')]
class InterventionController extends AbstractController
{
    #[Route('/new', name: 'intervention_new')]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $intervention = new Intervention();
        $form = $this->createForm(InterventionType::class, $intervention);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($intervention);
            $em->flush();
            $this->addFlash('success', 'Intervention créée avec succès.');
            return $this->redirectToRoute('intervention_list');
        }

        return $this->render('intervention/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/list', name: 'intervention_list')]
    public function list(Request $request, InterventionRepository $repo): Response
    {
        $technicien = $request->query->get('technicien');
        $etat = $request->query->get('etat');

        if (!$technicien && !$etat) {
            // si aucun filtre -> toutes les interventions
            $interventions = $repo->findAll();
        } else {
            // appliquer les filtres
            $interventions = $repo->findByTechnicienOrEtat($technicien, $etat);
        }

        dump($interventions); // 👈 debug pour vérifier les données
        die;

        return $this->render('intervention/list.html.twig', [
            'interventions' => $interventions,
        ]);
    }

    #[Route('/{id}/show', name: 'intervention_show')]
    public function show(Intervention $intervention): Response
    {
        return $this->render('intervention/show.html.twig', [
            'intervention' => $intervention,
        ]);
    }

    #[Route('/{id}/print', name: 'intervention_print')]
    public function print(Intervention $intervention): Response
    {
        return $this->render('intervention/print.html.twig', [
            'intervention' => $intervention,
        ]);
    }
}
