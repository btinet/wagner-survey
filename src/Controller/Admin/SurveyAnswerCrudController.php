<?php

namespace App\Controller\Admin;

use App\Entity\SurveyAnswer;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SurveyAnswerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SurveyAnswer::class;
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
