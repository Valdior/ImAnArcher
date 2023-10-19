<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Controller\Admin\Trait\ReadOnlyTrait;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UserCrudController extends AbstractCrudController
{
    use ReadOnlyTrait;

    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('lastname'),
            TextField::new('firstname'),
            TextField::new('email'),
            BooleanField::new('isVerified'),
            DateTimeField::new('lastLoginAt'),
            TextField::new('status'),
        ];
    }
}
