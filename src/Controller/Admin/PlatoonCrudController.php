<?php

namespace App\Controller\Admin;

use App\Entity\Platoon;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PlatoonCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Platoon::class;
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
