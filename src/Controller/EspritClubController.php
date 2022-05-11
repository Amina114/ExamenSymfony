<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EspritClubController extends AbstractController
{
    /**
     * @Route("/esprit/club", name="app_esprit_club")
     */
    public function index(): Response
    {
        return $this->render('esprit_club/index.html.twig', [
            'controller_name' => 'EspritClubController',
        ]);
    }
}
