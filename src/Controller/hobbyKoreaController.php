<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class hobbyKoreaController extends AbstractController
{
    #[Route('/practice_your_hobbies', name: 'app_hobbyKorea')]
    public function event(): Response
    {
        return $this->render('hobby/content.html.twig');
    }
}