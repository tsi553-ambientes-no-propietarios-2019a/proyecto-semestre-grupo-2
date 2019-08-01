<?php

namespace App\Controller;

use App\Entity\Bus;
use App\Form\BusType;
use App\Repository\BusRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/bus")
 */
class BusController extends AbstractController
{
    /**
     * @Route("/", name="bus_index", methods={"GET"})
     */
    public function index(BusRepository $busRepository): Response
    {
        return $this->render('bus/index.html.twig', [
            'buses' => $busRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="bus_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $bus = new Bus();
        $form = $this->createForm(BusType::class, $bus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($bus);
            $entityManager->flush();

            return $this->redirectToRoute('bus_index');
        }

        return $this->render('bus/new.html.twig', [
            'bus' => $bus,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bus_show", methods={"GET"})
     */
    public function show(Bus $bus): Response
    {
        return $this->render('bus/show.html.twig', [
            'bus' => $bus,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="bus_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Bus $bus): Response
    {
        $form = $this->createForm(BusType::class, $bus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bus_index');
        }

        return $this->render('bus/edit.html.twig', [
            'bus' => $bus,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bus_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Bus $bus): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bus->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($bus);
            $entityManager->flush();
        }

        return $this->redirectToRoute('bus_index');
    }
}
