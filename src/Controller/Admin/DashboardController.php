<?php

namespace App\Controller\Admin;

use App\Entity\Item;
use App\Entity\Benutzer;
use App\Entity\Hersteller;
use App\Entity\Kst;
use App\Entity\Standort;
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
        $url = $routeBuilder->setController(ItemCrudController::class)->generateUrl();
        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Tool Project');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute('Back to the website', 'fas fa-home', 'app_home');
        yield MenuItem::linkToCrud('Items','fa fa-laptop', Item::class);
        yield MenuItem::linkToCrud('Benutzer','fas fa-user', Benutzer::class);
        yield MenuItem::linkToCrud('Hersteller', 'fas fa-building', Hersteller::class);
        yield MenuItem::linkToCrud('KST', 'fas fa-money-bill', Kst::class);
        yield MenuItem::linkToCrud('Standort', 'fas fa-map-marker-alt', Standort::class);
    }
}
