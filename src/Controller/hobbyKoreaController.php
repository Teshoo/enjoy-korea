<?php

namespace App\Controller;

use App\Entity\Hobby;
use App\Repository\HobbyFamilyRepository;
use App\Repository\HobbyCategoryRepository;
use App\Repository\HobbyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

#[Route('/practice_your_hobbies')]
class hobbyKoreaController extends AbstractController
{
    #[Route('/', name: 'app_hobbyFamilies')]
    public function hobbyFamilies(Environment $twig, HobbyFamilyRepository $hobbyFamilyRepository): Response
    {
        return new Response($twig->render('hobby/content.html.twig', [
            'hobby_families' => $hobbyFamilyRepository->findAll(),
        ]));
    }

    #[Route('/{family_name}', name: 'app_hobbyCategoriesKorea')]
    public function hobbyCategories(Environment $twig, HobbyCategoryRepository $hobbyCategoryRepository, HobbyFamilyRepository $hobbyFamilyRepository, string $family_name): Response
    {
        $hobbyFamily = $hobbyFamilyRepository->findByName($family_name);

        return new Response($twig->render('hobby/content.html.twig', [
            'hobby_families' => $hobbyFamilyRepository->findAll(),
            'hobby_categories' => $hobbyCategoryRepository->findBy(['hobbyFamilies' => $hobbyFamily]),
        ]));
    }

    #[Route('/{family_name}/{category_name}', name: 'app_hobbiesKorea')]
    public function hobbies(Environment $twig, HobbyCategoryRepository $hobbyCategoryRepository, HobbyFamilyRepository $hobbyFamilyRepository, string $category_name): Response
    {
        $hobbyCategory = $hobbyCategoryRepository->findOneByName($category_name);
        $hobbies = $hobbyCategory->getHobbies();

        $latlong = [];
        foreach ($hobbies as $hobby) {
            $latlong[] = $hobby->getGpsCoordinates();
        }

         return new Response($twig->render('hobby/content.html.twig', [
            'selected_category' => $category_name,
            'hobby_families' => $hobbyFamilyRepository->findAll(),
            'hobbies' => $hobbyCategory->getHobbies(),
            'coordinates' => $latlong,
        ]));
    }
}