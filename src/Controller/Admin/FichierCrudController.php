<?php

namespace App\Controller\Admin;

use App\Entity\Fichier;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class FichierCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Fichier::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('legende'),
            TextField::new('imageFile')->setFormType(VichImageType::class),
            ImageField::new('url')->setBasePath('/uploads/images/realisation/')->onlyOnIndex(),
            AssociationField::new('realisationId'),
        ];
    }
}
