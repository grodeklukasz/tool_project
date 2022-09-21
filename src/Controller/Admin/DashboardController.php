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
            ->setTitle('Tool');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute('Back to the website', 'fas fa-home', 'app_home');
        yield MenuItem::section();
        yield MenuItem::linkToCrud('Workstations', 'fa fa-desktop', Workstation::class);
        yield MenuItem::linkToCrud('Laptops','fa fa-laptop', Laptop::class);
        yield MenuItem::section();
        yield MenuItem::linkToCrud('Kunden','fas fa-user', Benutzer::class);
        yield MenuItem::linkToCrud('Hersteller', 'fas fa-building', Hersteller::class);
        yield MenuItem::linkToCrud('KST', 'fas fa-money-bill', Kst::class);
        yield MenuItem::linkToCrud('Standorte', 'fas fa-map-marker-alt', Location::class);
        yield MenuItem::section('settings');
        yield MenuItem::linkToCrud('Types', 'fa fa-files-o', Type::class);
        yield MenuItem::linkToCrud('Status (Item)', 'fa fa-files-o', ItemStatus::class);
        yield MenuItem::linkToCrud('Hdd Types', 'fa fa-files-o', HddTypes::class);
        
    }
}
