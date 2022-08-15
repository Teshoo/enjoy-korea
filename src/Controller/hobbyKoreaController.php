<?php

namespace App\Controller;

use App\Entity\HobbyCategory;
use App\Repository\HobbyRepository;
use App\Repository\HobbyCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class hobbyKoreaController extends AbstractController
{
    #[Route('/practice_your_hobbies', name: 'app_hobbyCategoriesKorea')]
    public function hobbyCategories(Environment $twig, HobbyCategoryRepository $hobbyCategoryRepository): Response
    {
        return new Response($twig->render('hobby/content.html.twig.', [
            'hobby_categories' => $hobbyCategoryRepository->findAll(),
        ]));
    }
    #[Route('/practice_your_hobbies/{name}', name: 'app_hobbyKorea')]
    public function hobbies(Environment $twig, HobbyCategory $hobbyCategory, HobbyCategoryRepository $hobbyCategoryRepository, HobbyRepository $hobbyRepository): Response
    {
        return new Response($twig->render('hobby/content.html.twig', [
            'hobby_categories' => $hobbyCategoryRepository->findAll(),
            //'hobby_category' => $hobbyCategory,
            'hobby_category' => $hobbyCategoryRepository->findByHobby(['hobby_category' => $hobbyCategory]),
            'hobbies' => $hobbyRepository->findBy($hobbyCategoryRepository->findByHobby(['hobby_category' => $hobbyCategory]), ['name' => 'DESC']),
            //'hobbies' => $hobbyCategoryRepository->findByHobby(['hobby_category' => $hobbyCategory]),
        ]));
    }
}