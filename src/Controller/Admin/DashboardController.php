<?php

namespace App\Controller\Admin;

use App\Entity\Club;
use App\Entity\User;
use App\Entity\League;
use App\Entity\Region;
use App\Entity\Tournament;
use App\Controller\Admin\UserCrudController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\Admin\TournamentCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(RegionCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('I\'m An Archer');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::section('Tournament');
        yield MenuItem::linkToCrud('Tournaments', 'fa fa-home', Tournament::class);
        yield MenuItem::section('Clubs');
        yield MenuItem::linkToCrud('Clubs', 'fa fa-bow-arrow', Club::class);
        yield MenuItem::linkToCrud('Regions', 'fa fa-home', Region::class);
        yield MenuItem::linkToCrud('Leagues', 'fa fa-home', League::class);
        yield MenuItem::section('User');
        yield MenuItem::linkToCrud('Users', 'fa fa-user', User::class);
    }
}
