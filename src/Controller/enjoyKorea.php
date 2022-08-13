<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class enjoyKorea extends AbstractController
{
    #[Route('/', name: 'app_enjoyKorea')]
    public function test(): Response
    {
        return $this->render('base.html.twig');
    }
}