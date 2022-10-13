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
use App\Repository\AdminRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\Persistence\ManagerRegistry;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
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
    public function addNewAdmin(Request $request, UserPasswordHasherInterface $passwordHasher, ManagerRegistry $doctrine, AdminRepository $adminRepository) 
    {
        $errorMsg = "";

        $admin = new Admin();

        $entityManager = $doctrine->getManager();
        
        $form = $this->createFormBuilder($admin)
            ->add('Email', TextType::class,[
                'required'=>true,
                'attr'=>['class'=>'form-control form-control-sm']
            ])
            ->add('Password', PasswordType::class,[
                'required'=>true,
                'attr'=>['class'=>'form-control form-control-sm']
            ])
            ->add('create', SubmitType::class, [
                'label'=>'Create',
                'attr'=>['class'=>'btn btn-info']
                ])
            ->getForm();
        
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $data = $form->getData();

            $findAdmin = $adminRepository->findOneBy(['email'=>$data->getEmail()]);

            if(!$findAdmin){

                $admin->setEmail($data->getEmail());

                $plaintextPassword = $data->getPassword();

                $hashedPassword = $passwordHasher->hashPassword(
                    $data,
                    $plaintextPassword
                );

                $admin->setPassword($hashedPassword);

                $admin->setRoles(["ROLE_ADMIN"]);
                
                $entityManager->persist($admin);

                $entityManager->flush();

                return $this->redirectToRoute('admin');
            
            }else{
                $errorMsg = "Die Email Adresse ist bereit besetzt";
            }
            
           
        }

        return $this->renderForm('user/addNewAdmin.html.twig',[
            'form' => $form,
            'errorMsg' => $errorMsg
        ]);
    }
    /**
     * @Route("/editAdmin/{admin_id}", name="app_edit_admin")
     */
    public function editAdmin(int $admin_id, Request $request, UserPasswordHasherInterface $passwordHasher, AdminRepository $adminRepository, ManagerRegistry $doctrine){

        $msg = "";

        $adminUser = $adminRepository->findOneBy(['id' => $admin_id]);

        $entityManager = $doctrine->getManager();

        $form = $this->createFormBuilder($adminUser)
        ->add('Email', TextType::class, [
            'disabled'=>True,
            'attr'=>['class'=>'form-control form-control-sm']
        ])
        ->add('Password', PasswordType::class,[
            'required'=>true,
            'attr'=>['class'=>'form-control form-control-sm']
        ])
        ->add('update', SubmitType::class,[
            'attr'=>['class'=>'btn btn-warning']
        ])
        ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted()){

            $data = $form->getData();
        
            $admin = $entityManager->getRepository(Admin::class)->find($data->getId());
        
            $plaintextPassword = $data->getPassword();

            $hashedPassword = $passwordHasher->hashPassword(
                $data,
                $plaintextPassword
            );

            $admin->setPassword($hashedPassword);

            $entityManager->flush();

            //return $this->redirectToRoute('admin');

            $msg = "Benutzerkonto wurde aktualisiert";

        }

        return $this->renderForm('user/editAdmin.html.twig',[
            'form' => $form,
            'msg' => $msg,
        ]);


    }
}
