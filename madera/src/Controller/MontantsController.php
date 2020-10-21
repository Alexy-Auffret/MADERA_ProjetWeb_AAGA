<?php

namespace App\Controller;

use App\Entity\Montants;
use App\Form\MontantsType;
use App\Repository\MontantsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/montants")
 */
class MontantsController extends AbstractController
{
    /**
     * @Route("/", name="montants_index", methods={"GET"})
     */
    public function index(MontantsRepository $montantsRepository): Response
    {
        return $this->render('montants/index.html.twig', [
            'montants' => $montantsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="montants_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $montant = new Montants();
        $form = $this->createForm(MontantsType::class, $montant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($montant);
            $entityManager->flush();

            return $this->redirectToRoute('montants_index');
        }

        return $this->render('montants/new.html.twig', [
            'montant' => $montant,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="montants_show", methods={"GET"})
     */
    public function show(Montants $montant): Response
    {
        return $this->render('montants/show.html.twig', [
            'montant' => $montant,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="montants_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Montants $montant): Response
    {
        $form = $this->createForm(MontantsType::class, $montant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('montants_index');
        }

        return $this->render('montants/edit.html.twig', [
            'montant' => $montant,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="montants_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Montants $montant): Response
    {
        if ($this->isCsrfTokenValid('delete'.$montant->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($montant);
            $entityManager->flush();
        }

        return $this->redirectToRoute('montants_index');
    }
}
