<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Repository\ScheduleRepository;
use App\Repository\CityRepository;
use App\Controller\BusRepository;
use App\Entity\Schedule;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Form\BusSearchType;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(Request $request, ScheduleRepository $ScheduleRepository)
    {
        $data=['Origen'=>null,'Destino'=>null,'Salida'=>null,'Retorno'=>null,'Adultos'=>null,'Ninos'=>null];
        $form1 = $this->createForm(BusSearchType::class, $data);
        $form1->handleRequest($request);
        if($form1->isSubmitted()&&$form1->isValid()){
            $data=$form1->getData();
            $date=date('l',strtotime($data['Salida']));           
             /*
            'search_results'=> $BusCityRepository->findBy(['city_id'=>$city['id'],'day'=>$date]),*/
            return $this->render('home/index.html.twig',[
            'res'=>$ScheduleRepository->findBy(['originCity'=>$data['Origen'], 'day'=>$date, 'destinyCity'=>$data['Destino']]),
            'form1'=>$form1->createView()
            ]);
        }
        $form2 = $this->createFormBuilder()
            ->add('Destino',TextType::class)
            ->add('ChIn',TextType::class)
            ->add('ChOut',TextType::class)
            ->add('Adultos',IntegerType::class)
            ->add('Ninos',IntegerType::class)
            ->add('Buscar',SubmitType::class)
            ->getForm();

        $form3 = $this->createFormBuilder()
            ->add('Origen',TextType::class)
            ->add('Destino',TextType::class)
            ->add('Salida',TextType::class)
            ->add('Retorno',TextType::class)
            ->add('Adultos',IntegerType::class)
            ->add('Ninos',IntegerType::class)
            ->add('Buscar',SubmitType::class)
            ->getForm();

        return $this->render('home/index.html.twig',[
            'form1'=>$form1->createView(),
            'form2'=>$form2->createView(),
            'form3'=>$form3->createView()
        ]);
    }
}
