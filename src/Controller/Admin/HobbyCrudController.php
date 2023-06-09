<?php

namespace App\Controller\Admin;

use App\Entity\Hobby;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class HobbyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Hobby::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextareaField::new('imageFile')->setFormType(VichImageType::class)->hideOnIndex(),
            TextField::new('imageName')->hideOnForm(),
            TextField::new('name'),
            TextField::new('hangeul_name'),
            AssociationField::new('hobbyCategories'),
            TextField::new('address'),
            TextField::new('gps_coordinates'),
            TelephoneField::new('phone_nb'),
            UrlField::new('website'),
            NumberField::new('price'),
            TextField::new('priceFor'),
            TextField::new('schedule'),
            TextField::new('frequency'),
            CollectionField::new('additionalInfo')->useEntryCrudForm(HobbyAdditionalInfoCrudController::class),
            DateTimeField::new('createdAt')->hideOnForm(),
            DateTimeField::new('updatedAt')->hideOnForm(),
        ];
    }

}
