<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class enjoyKorea extends AbstractController
{
    #[Route('/', name: 'app_enjoyKorea')]
    public function homepage(): Response
    {
        return $this->render('header/homepage.html.twig');
    }
}