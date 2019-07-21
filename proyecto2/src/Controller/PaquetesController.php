<?php

namespace App\Controller;

use App\Entity\Paquetes;
use App\Form\PaquetesType;
use App\Repository\PaquetesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/paquetes")
 */
class PaquetesController extends AbstractController
{
    /**
     * @Route("/", name="paquetes_index", methods={"GET"})
     */
    public function index(PaquetesRepository $paquetesRepository): Response
    {
        return $this->render('paquetes/index.html.twig', [
            'paquetes' => $paquetesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="paquetes_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $paquete = new Paquetes();
        $form = $this->createForm(PaquetesType::class, $paquete);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($paquete);
            $entityManager->flush();

            return $this->redirectToRoute('paquetes_index');
        }

        return $this->render('paquetes/new.html.twig', [
            'paquete' => $paquete,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="paquetes_show", methods={"GET"})
     */
    public function show(Paquetes $paquete): Response
    {
        return $this->render('paquetes/show.html.twig', [
            'paquete' => $paquete,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="paquetes_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Paquetes $paquete): Response
    {
        $form = $this->createForm(PaquetesType::class, $paquete);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('paquetes_index', [
                'id' => $paquete->getId(),
            ]);
        }

        return $this->render('paquetes/edit.html.twig', [
            'paquete' => $paquete,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="paquetes_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Paquetes $paquete): Response
    {
        if ($this->isCsrfTokenValid('delete'.$paquete->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($paquete);
            $entityManager->flush();
        }

        return $this->redirectToRoute('paquetes_index');
    }
}
