<?php

namespace App\Controller\Admin;

use App\Entity\Post;
use App\Controller\Admin\PostCrudController;
use Dukecity\CommandSchedulerBundle\Entity\ScheduledCommand;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        if ($this->getUser()) {
  	    $adminUrlGenerator = $this->get(AdminUrlGenerator::class);
            return $this->redirect(
		$url = $adminUrlGenerator
            	    ->setController(PostCrudController::class)
            	    ->setAction('index')
            	    ->generateUrl()
 	    );
        }

	return $this->redirectToRoute('login');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Life');
    }

    public function configureMenuItems(): iterable
    {
//        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Posts', 'fas fa-newspaper', Post::class);
        yield MenuItem::linkToCrud('Cron', 'fas fa-list', ScheduledCommand::class);
        yield MenuItem::linkToLogout('Logout', 'fa fa-exit');
    }
}
