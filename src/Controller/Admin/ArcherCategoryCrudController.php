<?php

namespace App\Controller\Admin;

use App\Entity\ArcherCategory;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ArcherCategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ArcherCategory::class;
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
