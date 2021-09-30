<?php

namespace App\Controller\Admin;

use App\Entity\SurveyLine;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SurveyLineCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SurveyLine::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title'),
            BooleanField::new('isRequired'),
            AssociationField::new('question'),
            AssociationField::new('answers'),
        ];
    }

}
