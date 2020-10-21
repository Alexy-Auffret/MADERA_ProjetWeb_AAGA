<?php

namespace App\Controller;

use App\Entity\Huisserie;
use App\Form\HuisserieType;
use App\Repository\HuisserieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/huisserie")
 */
class HuisserieController extends AbstractController
{
    /**
     * @Route("/", name="huisserie_index", methods={"GET"})
     */
    public function index(HuisserieRepository $huisserieRepository): Response
    {
        return $this->render('huisserie/index.html.twig', [
            'huisseries' => $huisserieRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="huisserie_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $huisserie = new Huisserie();
        $form = $this->createForm(HuisserieType::class, $huisserie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($huisserie);
            $entityManager->flush();

            return $this->redirectToRoute('huisserie_index');
        }

        return $this->render('huisserie/new.html.twig', [
            'huisserie' => $huisserie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="huisserie_show", methods={"GET"})
     */
    public function show(Huisserie $huisserie): Response
    {
        return $this->render('huisserie/show.html.twig', [
            'huisserie' => $huisserie,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="huisserie_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Huisserie $huisserie): Response
    {
        $form = $this->createForm(HuisserieType::class, $huisserie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('huisserie_index');
        }

        return $this->render('huisserie/edit.html.twig', [
            'huisserie' => $huisserie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="huisserie_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Huisserie $huisserie): Response
    {
        if ($this->isCsrfTokenValid('delete'.$huisserie->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($huisserie);
            $entityManager->flush();
        }

        return $this->redirectToRoute('huisserie_index');
    }
}
