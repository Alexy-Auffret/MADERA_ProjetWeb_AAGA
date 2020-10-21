<?php

namespace App\Controller;

use App\Entity\Composants;
use App\Form\ComposantsType;
use App\Repository\ComposantsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/composants")
 */
class ComposantsController extends AbstractController
{
    /**
     * @Route("/", name="composants_index", methods={"GET"})
     */
    public function index(ComposantsRepository $composantsRepository): Response
    {
        return $this->render('composants/index.html.twig', [
            'composants' => $composantsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="composants_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $composant = new Composants();
        $form = $this->createForm(ComposantsType::class, $composant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($composant);
            $entityManager->flush();

            return $this->redirectToRoute('composants_index');
        }

        return $this->render('composants/new.html.twig', [
            'composant' => $composant,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="composants_show", methods={"GET"})
     */
    public function show(Composants $composant): Response
    {
        return $this->render('composants/show.html.twig', [
            'composant' => $composant,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="composants_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Composants $composant): Response
    {
        $form = $this->createForm(ComposantsType::class, $composant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('composants_index');
        }

        return $this->render('composants/edit.html.twig', [
            'composant' => $composant,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="composants_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Composants $composant): Response
    {
        if ($this->isCsrfTokenValid('delete'.$composant->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($composant);
            $entityManager->flush();
        }

        return $this->redirectToRoute('composants_index');
    }
}
