<?php

namespace App\Controller\Admin;

use App\Entity\Hobby;
use App\Entity\HobbyAdditionalInfo;
use App\Entity\HobbyCategory;
use App\Entity\HobbyFamily;
use App\Entity\Users;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use http\Client\Curl\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(HobbyCrudController::class);

        return $this->redirect($url);

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Enjoy Korea');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute('Back to Enjoy Korea', 'fas fa-home', 'app_enjoyKorea');
        yield MenuItem::linkToCrud('Users', 'fa-solid fa-user', Users::class);
        yield MenuItem::linkToCrud('Hobby Families', 'fa-solid fa-broom-ball', HobbyFamily::class);
        yield MenuItem::linkToCrud('Hobby Categories', 'fas fa-list', HobbyCategory::class);
        yield MenuItem::linkToCrud('Hobbies', 'fas fa-list', Hobby::class);
        yield MenuItem::linkToCrud('Hobby Additional Info', 'fas fa-list', HobbyAdditionalInfo::class);
    }
}
