<?php

namespace App\Controller;

use App\Entity\Gammes;
use App\Form\GammesType;
use App\Repository\GammesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/gammes")
 */
class GammesController extends AbstractController
{
    /**
     * @Route("/", name="gammes_index", methods={"GET"})
     */
    public function index(GammesRepository $gammesRepository): Response
    {
        return $this->render('gammes/index.html.twig', [
            'gammes' => $gammesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="gammes_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $gamme = new Gammes();
        $form = $this->createForm(GammesType::class, $gamme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($gamme);
            $entityManager->flush();

            return $this->redirectToRoute('gammes_index');
        }

        return $this->render('gammes/new.html.twig', [
            'gamme' => $gamme,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="gammes_show", methods={"GET"})
     */
    public function show(Gammes $gamme): Response
    {
        return $this->render('gammes/show.html.twig', [
            'gamme' => $gamme,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="gammes_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Gammes $gamme): Response
    {
        $form = $this->createForm(GammesType::class, $gamme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('gammes_index');
        }

        return $this->render('gammes/edit.html.twig', [
            'gamme' => $gamme,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="gammes_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Gammes $gamme): Response
    {
        if ($this->isCsrfTokenValid('delete'.$gamme->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($gamme);
            $entityManager->flush();
        }

        return $this->redirectToRoute('gammes_index');
    }
}
