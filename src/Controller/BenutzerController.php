<?php

namespace App\Controller;

use App\Entity\Admin;
use App\Repository\BenutzerRepository;
use App\Repository\WorkstationRepository;
use App\Repository\LaptopRepository;
use App\Repository\HandyRepository;
use App\Repository\PrinterRepository;
use App\Repository\MonitorRepository;
use App\Repository\NetzwerkRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class BenutzerController extends AbstractController
{
    
    /**
     * @Route("/allItems/{userid}", name="app_user")
     */
    public function allItemsByUser(
        String $userid, 
        WorkstationRepository $workstationRepository, 
        LaptopRepository $laptopRepository, 
        BenutzerRepository $benutzerRepository,
        HandyRepository $handyRepository,
        PrinterRepository $printerRepository,
        MonitorRepository $monitorRepository,
        NetzwerkRepository $netzwerkRepository
        )
    {
        $benutzer = $benutzerRepository->findOneBy(['id' => $userid]);
        $allWorkstations = $workstationRepository->findBy(['benutzer' => $userid]);
        $allLaptops = $laptopRepository->findBy(['benutzer'=>$userid]);
        $allHandy = $handyRepository->findBy(['benutzer'=>$userid]);
        $allPrinters = $printerRepository->findBy(['benutzer'=>$userid]);
        $allMonitors = $monitorRepository->findBy(['user'=>$userid]);
        $allNetzwerk = $netzwerkRepository->findBy(['user'=>$userid]);


        return $this->render('benutzer/index.html.twig', [
            'benutzer' => $benutzer,
            'allWorkstations' => $allWorkstations,
            'allLaptops' => $allLaptops,
            'allHandy' => $allHandy,
            'allPrinters' => $allPrinters,
            'allMonitors' => $allMonitors,
            'allNetzwerk' => $allNetzwerk,
        ]);
    }
    /**
     * @Route("/addNewAdmin", name="app_add_user")
     */
    public function addNewAdmin(Request $request, UserPasswordHasherInterface $passwordHasher) 
    {
        $admin = new Admin();

        
        $form = $this->createFormBuilder($admin)
            ->add('Email', TextType::class)
            ->add('Password', PasswordType::class)
            ->add('create', SubmitType::class, ['label'=>'Create'])
            ->getForm();
        
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $admin = $form->getData();

            return $this->redirectToRoute('admin');
        }

        return $this->renderForm('user/addNewAdmin.html.twig',[
            'form' => $form,
        ]);
    }
}
