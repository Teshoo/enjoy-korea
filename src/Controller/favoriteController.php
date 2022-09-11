<?php

namespace App\Controller;

use App\Entity\Hobby;
use App\Repository\HobbyRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

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

    #[Route('/hobby/{hobbyId}/add', name: 'app_addFavorite', methods: 'POST')]
    public function addFavorite(Environment $twig, Request $request, ManagerRegistry $doctrine, Hobby $hobbyId): RedirectResponse
    {
        $entityManager = $doctrine->getManager();
        $this->getUser()->addHobby($hobbyId);
        $entityManager->flush();

        return $this->redirectToRoute('app_favorites');
    }

    #[Route('/hobby/{hobbyId}/remove', name: 'app_removeFavorite', methods: 'POST')]
    public function removeFavorite(Environment $twig, ManagerRegistry $doctrine, Hobby $hobbyId): RedirectResponse
    {
        $entityManager = $doctrine->getManager();
        $this->getUser()->removeHobby($hobbyId);
        $entityManager->flush();

        return $this->redirectToRoute('app_favorites');
    }
}