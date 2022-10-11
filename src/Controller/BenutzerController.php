<?php

namespace App\Controller;

use App\Repository\BenutzerRepository;
use App\Repository\WorkstationRepository;
use App\Repository\LaptopRepository;
use App\Repository\HandyRepository;
use App\Repository\PrinterRepository;
use App\Repository\MonitorRepository;
use App\Repository\NetzwerkRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
}
