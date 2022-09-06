<?php

namespace App\Controller;

use App\Repository\HobbyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;
use App\Entity\Users;

#[Route('/favorites')]
class favoriteController extends AbstractController
{
    #[Route('/', name: 'app_favorites')]
    public function favorites(Environment $twig, HobbyRepository $hobbies): Response {
        return new Response($twig->render('favorite/content.html.twig', [
            'hobbies' => $this->getUser()->getHobbies(),
            'events' => [],
        ]));
    }

    public function addFavorites() {

    }
}