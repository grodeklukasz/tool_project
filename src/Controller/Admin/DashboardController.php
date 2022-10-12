<?php

namespace App\Controller\Admin;

use App\Entity\Item;
use App\Entity\Benutzer;
use App\Entity\Hersteller;
use App\Entity\Kst;
use App\Entity\Location;
use App\Entity\Type;
use App\Entity\ItemStatus;
use App\Entity\Admin;
use App\Entity\Workstation;
use App\Entity\HddTypes;
use App\Entity\Laptop;
use App\Entity\Handy;
use App\Entity\Printer;
use App\Entity\Monitor;
use App\Entity\Netzwerk;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(WorkstationCrudController::class)->generateUrl();
        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('WJW DB Items');
            
    }

    public function configureMenuItems(): iterable
    {
        //yield MenuItem::linkToRoute('Back to the website', 'fas fa-home', 'app_home');
        yield MenuItem::linkToCrud('Start', 'fas fa-home', Workstation::class);
        yield MenuItem::section();
        yield MenuItem::linkToCrud('Workstations', 'fa fa-desktop', Workstation::class);
        yield MenuItem::linkToCrud('Laptops','fa fa-laptop', Laptop::class);
        yield MenuItem::linkToCrud('Handys','fa fa-mobile', Handy::class);
        yield MenuItem::linkToCrud('Drucker','fa fa-print', Printer::class);
        yield MenuItem::linkToCrud('Monitor','fa fa-television', Monitor::class);
        yield MenuItem::linkToCrud('Netzwerk','fa fa-server', Netzwerk::class);
        yield MenuItem::section();
        yield MenuItem::linkToCrud('Benutzer','fas fa-users', Benutzer::class);
        yield MenuItem::linkToCrud('Hersteller', 'fas fa-building', Hersteller::class);
        yield MenuItem::linkToCrud('KST', 'fas fa-money-bill', Kst::class);
        yield MenuItem::linkToCrud('Standorte', 'fas fa-map-marker-alt', Location::class);
        yield MenuItem::section('settings');
        yield MenuItem::linkToCrud('Status (Item)', 'fa fa-files-o', ItemStatus::class);
        yield MenuItem::linkToCrud('Hdd Types', 'fa fa-files-o', HddTypes::class);
        yield MenuItem::section('------------------------');
        yield MenuItem::linkToRoute('Add Admin','fas fa-user-plus','app_add_user');
        yield MenuItem::linkToCrud('Admins','fas fa-users',Admin::class);
        

        
    }
}
