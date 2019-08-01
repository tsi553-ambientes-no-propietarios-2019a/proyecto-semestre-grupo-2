<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DestinosController extends AbstractController
{
    /**
     * @Route("/destinos", name="destinos")
     */
    public function index()
    {
        return $this->render('destinos/index.html.twig', [
            'controller_name' => 'DestinosController',
        ]);
    }
}
