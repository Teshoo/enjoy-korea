<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class eventKoreaController extends AbstractController
{
    #[Route('/what_to_do_tonight', name: 'app_eventKorea')]
    public function event(): Response
    {
        return $this->render('event/content.html.twig');
    }
}