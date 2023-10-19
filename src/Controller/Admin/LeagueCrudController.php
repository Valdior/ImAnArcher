<?php

namespace App\Controller\Admin;

use App\Entity\League;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class LeagueCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return League::class;
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
