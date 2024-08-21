<?php

namespace App\Controller;

use App\Entity\Equipe;
use App\Entity\Projet;
use App\Entity\Tache;
use App\Repository\EquipeRepository;
use App\Repository\NotificationRepository;
use App\Repository\ProjetRepository;
use App\Repository\TacheRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(Security $security, NotificationRepository $notificationRepo,ProjetRepository $projet,TacheRepository $tache, EquipeRepository $equipe): Response
    {
      if($security->getUser() instanceof \App\Entity\Employe){
        $notifications = $notificationRepo->findBy(['IsRead'=>false]);
        $notificationsfiltered =[];
        foreach ($notifications as $notification){
            if(!empty($notification->getTitre())&& !empty($notification->getDescription())&&!empty($notification->getClient())){
                $notificationsfiltered[]=$notification;
            }
        }
        return $this->render('admindek-html/index.html.twig', [
            'controller_name' => 'HomeController',
            'notifications'=>$notificationsfiltered,
            'tache'=>$tache->findAll(),
            'equipe'=>$equipe->findAll(),
            'projet'=>$projet->findAll()
        ]);
      }else{
        $user = $security->getUser();


        $projets = $projet->findByClient($user);
        return $this->render('home_user/service.html.twig', [
           'projets'=>$projets
        ]);
      }
        
        
    }
}
