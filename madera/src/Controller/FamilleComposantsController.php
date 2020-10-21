<?php

namespace App\Controller;

use App\Entity\FamilleComposants;
use App\Form\FamilleComposantsType;
use App\Repository\FamilleComposantsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/famille/composants")
 */
class FamilleComposantsController extends AbstractController
{
    /**
     * @Route("/", name="famille_composants_index", methods={"GET"})
     */
    public function index(FamilleComposantsRepository $familleComposantsRepository): Response
    {
        return $this->render('famille_composants/index.html.twig', [
            'famille_composants' => $familleComposantsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="famille_composants_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $familleComposant = new FamilleComposants();
        $form = $this->createForm(FamilleComposantsType::class, $familleComposant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($familleComposant);
            $entityManager->flush();

            return $this->redirectToRoute('famille_composants_index');
        }

        return $this->render('famille_composants/new.html.twig', [
            'famille_composant' => $familleComposant,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="famille_composants_show", methods={"GET"})
     */
    public function show(FamilleComposants $familleComposant): Response
    {
        return $this->render('famille_composants/show.html.twig', [
            'famille_composant' => $familleComposant,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="famille_composants_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, FamilleComposants $familleComposant): Response
    {
        $form = $this->createForm(FamilleComposantsType::class, $familleComposant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('famille_composants_index');
        }

        return $this->render('famille_composants/edit.html.twig', [
            'famille_composant' => $familleComposant,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="famille_composants_delete", methods={"DELETE"})
     */
    public function delete(Request $request, FamilleComposants $familleComposant): Response
    {
        if ($this->isCsrfTokenValid('delete'.$familleComposant->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($familleComposant);
            $entityManager->flush();
        }

        return $this->redirectToRoute('famille_composants_index');
    }
}
