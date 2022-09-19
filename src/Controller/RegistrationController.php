<?php

namespace App\Controller;

use App\Repository\AdminRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/registration", name="app_registration")
     */
    public function index(UserPasswordHasherInterface $passwordHasher, AdminRepository $adminRepository): Response
    {
     
        $users = $adminRepository->findAll();
        return $this->render('registration/list.html.twig', [
            'controller_name' => 'RegistrationController',
            'users' => $users,
        ]);
    }
}
