<?php

namespace App\Controller;

use App\Entity\AffCompany;
use App\Form\AffCompanyType;
use App\Repository\AffCompanyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/aff/company")
 */
class AffCompanyController extends AbstractController
{
    /**
     * @Route("/", name="aff_company_index", methods={"GET"})
     */
    public function index(AffCompanyRepository $affCompanyRepository): Response
    {
        return $this->render('aff_company/index.html.twig', [
            'aff_companies' => $affCompanyRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="aff_company_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $affCompany = new AffCompany();
        $form = $this->createForm(AffCompanyType::class, $affCompany);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($affCompany);
            $entityManager->flush();

            return $this->redirectToRoute('aff_company_index');
        }

        return $this->render('aff_company/new.html.twig', [
            'aff_company' => $affCompany,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="aff_company_show", methods={"GET"})
     */
    public function show(AffCompany $affCompany): Response
    {
        return $this->render('aff_company/show.html.twig', [
            'aff_company' => $affCompany,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="aff_company_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, AffCompany $affCompany): Response
    {
        $form = $this->createForm(AffCompanyType::class, $affCompany);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('aff_company_index');
        }

        return $this->render('aff_company/edit.html.twig', [
            'aff_company' => $affCompany,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="aff_company_delete", methods={"DELETE"})
     */
    public function delete(Request $request, AffCompany $affCompany): Response
    {
        if ($this->isCsrfTokenValid('delete'.$affCompany->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($affCompany);
            $entityManager->flush();
        }

        return $this->redirectToRoute('aff_company_index');
    }
}
