<?php

namespace App\Controller\Admin;

use App\Entity\SurveyResult;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
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
            TextField::new('title'),
            //CollectionField::new('content'),
        ];
    }

}
