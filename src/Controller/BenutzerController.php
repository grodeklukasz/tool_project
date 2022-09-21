<?php

namespace App\Controller;

use App\Repository\BenutzerRepository;
use App\Repository\WorkstationRepository;
use App\Repository\LaptopRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BenutzerController extends AbstractController
{
    
    /**
     * @Route("/allItems/{userid}", name="app_user")
     */
    public function allItemsByUser(String $userid, WorkstationRepository $workstationRepository, LaptopRepository $laptopRepository, BenutzerRepository $benutzerRepository)
    {
        $benutzer = $benutzerRepository->findOneBy(['id' => $userid]);
        $allWorkstations = $workstationRepository->findBy(['benutzer' => $userid]);
        $allLaptops = $laptopRepository->findBy(['benutzer'=>$userid]);

        return $this->render('benutzer/index.html.twig', [
            'benutzer' => $benutzer,
            'allWorkstations' => $allWorkstations,
            'allLaptops' => $allLaptops,
        ]);
    }
}
