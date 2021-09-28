<?php

namespace App\Controller\Admin;

use App\Entity\Survey;
use App\Entity\SurveyAnswer;
use App\Entity\SurveyLine;
use App\Entity\SurveyQuestion;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
        //return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Wagner Survey');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute('Website','fa fa-globe', 'app_index');
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Surveys', 'fa fa-tags', Survey::class);
        yield MenuItem::linkToCrud('Lines', 'fa fa-tags', SurveyLine::class);
        yield MenuItem::linkToCrud('Questions', 'fa fa-tags', SurveyQuestion::class);
        yield MenuItem::linkToCrud('Answers', 'fa fa-tags', SurveyAnswer::class);
    }
}
