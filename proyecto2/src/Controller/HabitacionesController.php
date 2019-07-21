<?php

namespace App\Controller;

use App\Entity\Habitaciones;
use App\Form\HabitacionesType;
use App\Repository\HabitacionesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/habitaciones")
 */
class HabitacionesController extends AbstractController
{
    /**
     * @Route("/", name="habitaciones_index", methods={"GET"})
     */
    public function index(HabitacionesRepository $habitacionesRepository): Response
    {
        return $this->render('habitaciones/index.html.twig', [
            'habitaciones' => $habitacionesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="habitaciones_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $habitacione = new Habitaciones();
        $form = $this->createForm(HabitacionesType::class, $habitacione);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($habitacione);
            $entityManager->flush();

            return $this->redirectToRoute('habitaciones_index');
        }

        return $this->render('habitaciones/new.html.twig', [
            'habitacione' => $habitacione,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="habitaciones_show", methods={"GET"})
     */
    public function show(Habitaciones $habitacione): Response
    {
        return $this->render('habitaciones/show.html.twig', [
            'habitacione' => $habitacione,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="habitaciones_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Habitaciones $habitacione): Response
    {
        $form = $this->createForm(HabitacionesType::class, $habitacione);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('habitaciones_index', [
                'id' => $habitacione->getId(),
            ]);
        }

        return $this->render('habitaciones/edit.html.twig', [
            'habitacione' => $habitacione,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="habitaciones_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Habitaciones $habitacione): Response
    {
        if ($this->isCsrfTokenValid('delete'.$habitacione->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($habitacione);
            $entityManager->flush();
        }

        return $this->redirectToRoute('habitaciones_index');
    }
}
