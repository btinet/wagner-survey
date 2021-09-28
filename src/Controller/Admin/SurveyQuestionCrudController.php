<?php

namespace App\Controller\Admin;

use App\Entity\SurveyQuestion;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SurveyQuestionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SurveyQuestion::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('question'),
        ];
    }

}
