<?php

namespace App\Controller;

use App\Entity\Client;
use App\Repository\ProjetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

#[Route('/home-user')]
class UserProjectController extends AbstractController
{
    #[Route('/projet', name: 'app_user_project', methods: ['GET'])]
    public function index(Security $security, ProjetRepository $projetRepository): Response
    {
        $user = $security->getUser();


        $projets = $projetRepository->findByClient($user);
        return $this->render('home_user/service.html.twig', [
           'projets'=>$projets
        ]);
    }
}
