<?php

namespace App\Controller;

use App\Entity\Compra;
use App\Form\CompraType;
use App\Repository\CompraRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/compra")
 */
class CompraController extends AbstractController
{
    /**
     * @Route("/", name="compra_index", methods={"GET"})
     */
    public function index(CompraRepository $compraRepository): Response
    {
        return $this->render('compra/index.html.twig', [
            'compras' => $compraRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new/{id}", name="compra_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $compra = new Compra();
        $form = $this->createForm(CompraType::class, $compra);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($compra);
            $entityManager->flush();

            return $this->redirectToRoute('compra_index');
        }

        return $this->render('compra/new.html.twig', [
            'compra' => $compra,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="compra_show", methods={"GET"})
     */
    public function show(Compra $compra): Response
    {
        return $this->render('compra/show.html.twig', [
            'compra' => $compra,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="compra_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Compra $compra): Response
    {
        $form = $this->createForm(CompraType::class, $compra);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('compra_index', [
                'id' => $compra->getId(),
            ]);
        }

        return $this->render('compra/edit.html.twig', [
            'compra' => $compra,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="compra_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Compra $compra): Response
    {
        if ($this->isCsrfTokenValid('delete'.$compra->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($compra);
            $entityManager->flush();
        }

        return $this->redirectToRoute('compra_index');
    }
}
