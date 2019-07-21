<?php

namespace App\Controller;

use App\Entity\Asiento;
use App\Form\AsientoType;
use App\Repository\AsientoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/asiento")
 */
class AsientoController extends AbstractController
{
    /**
     * @Route("/", name="asiento_index", methods={"GET"})
     */
    public function index(AsientoRepository $asientoRepository): Response
    {
        return $this->render('asiento/index.html.twig', [
            'asientos' => $asientoRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="asiento_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $asiento = new Asiento();
        $form = $this->createForm(AsientoType::class, $asiento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($asiento);
            $entityManager->flush();

            return $this->redirectToRoute('asiento_index');
        }

        return $this->render('asiento/new.html.twig', [
            'asiento' => $asiento,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="asiento_show", methods={"GET"})
     */
    public function show(Asiento $asiento): Response
    {
        return $this->render('asiento/show.html.twig', [
            'asiento' => $asiento,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="asiento_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Asiento $asiento): Response
    {
        $form = $this->createForm(AsientoType::class, $asiento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('asiento_index', [
                'id' => $asiento->getId(),
            ]);
        }

        return $this->render('asiento/edit.html.twig', [
            'asiento' => $asiento,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="asiento_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Asiento $asiento): Response
    {
        if ($this->isCsrfTokenValid('delete'.$asiento->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($asiento);
            $entityManager->flush();
        }

        return $this->redirectToRoute('asiento_index');
    }
}
