<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'Tool Project 2.0',
        ]);
    }
    /**
     * @Route("/allItems/{userid}", name="app_user_allItems")
     */
    public function allItemsByUser(String $userid)
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'Tool Project 2.0' . $userid,
        ]);
    }
}
