<?php

namespace App\Controller\Admin;

use App\Entity\Tournament;
use App\Enum\TournamentTypeEnum;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TournamentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Tournament::class;
    }
    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            ChoiceField::new('type')
                ->setFormType(EnumType::class)
                ->setFormTypeOptions([
                    'class' => TournamentTypeEnum::class,
                ]),
            DateField::new('startDate'),
            DateField::new('endDate'),
            AssociationField::new('organizer'),
            AssociationField::new('platoons'),
            AssociationField::new('location'),
            
        ];
    }
}
