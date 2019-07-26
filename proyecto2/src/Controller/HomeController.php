<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\SearchBusType;
use App\Form\SearchHotelType;
use App\Form\SearchPaqueteType;


class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $form1 = $this->createForm(SearchBusType::class,null);
        $form2 = $this->createForm(SearchHotelType::class,null);
        $form3 = $this->createForm(SearchPaqueteType::class,null);
        return $this->render('home/index.html.twig', [
            'form1'=>$form1->createView(),
            'form2'=>$form2->createView(),
            'form3'=>$form3->createView()
        ]);
    }
}
