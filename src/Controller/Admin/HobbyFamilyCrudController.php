<?php

namespace App\Controller\Admin;

use App\Entity\HobbyFamily;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class HobbyFamilyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return HobbyFamily::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            AssociationField::new('hobbyCategories'),
        ];
    }
}