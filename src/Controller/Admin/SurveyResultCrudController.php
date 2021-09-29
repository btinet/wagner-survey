<?php

namespace App\Controller\Admin;

use App\Entity\SurveyResult;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SurveyResultCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SurveyResult::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            NumberField::new('lineNumber')->hideOnForm(),
            TextField::new('title'),
            TextField::new('question'),
            TextField::new('answer'),
            ArrayField::new('content')->setColumns('2'),
        ];
    }

}
