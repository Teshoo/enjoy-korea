<?php

namespace App\Controller;

use App\Entity\Hobby;
use App\Entity\HobbyCategory;
use App\Entity\HobbyFamily;
use App\Repository\HobbyFamilyRepository;
use App\Repository\HobbyRepository;
use App\Repository\HobbyCategoryRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

#[Route('/practice_your_hobbies')]
class hobbyKoreaController extends AbstractController
{
    #[Route('/', name: 'app_hobbyFamiliesKorea')]
    public function hobbyFamilies(Environment $twig, HobbyFamilyRepository $hobbyFamilyRepository): Response
    {
        return new Response($twig->render('hobby/content.html.twig', [
            'hobby_families' => $hobbyFamilyRepository->findAll(),
        ]));
    }

    #[Route('/{family}', name: 'app_hobbyCategoriesKorea')]
    public function hobbyCategories(Environment $twig, HobbyCategoryRepository $hobbyCategoryRepository, HobbyFamilyRepository $hobbyFamilyRepository): Response
    {
        return new Response($twig->render('hobby/content.html.twig', [
            'hobby_families' => $hobbyFamilyRepository->findAll(),
            'hobby_categories' => $hobbyCategoryRepository->findAll(),
        ]));
    }

    #[Route('/{family}/{category_name}', name: 'app_hobbiesKorea')]
    public function hobbies(Environment $twig, HobbyCategoryRepository $hobbyCategoryRepository, HobbyRepository $hobbyRepository, HobbyFamilyRepository $hobbyFamilyRepository, string $category_name): Response
    {
        $hobbyCategory = $hobbyCategoryRepository->findOneByName($category_name);

         return new Response($twig->render('hobby/content.html.twig', [
            'selected_category' => $category_name,
            'hobby_families' => $hobbyFamilyRepository->findAll(),
            'hobbies' => $hobbyCategory->getHobbies(),
        ]));

    }
}