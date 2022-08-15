<?php

namespace App\Controller\Admin;

use App\Entity\HobbyCategory;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class HobbyCategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return HobbyCategory::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
