<?php

namespace App\Controller\Admin;

use App\Entity\Admin;
use App\Entity\Bar;
use App\Entity\Barman;
use App\Entity\Customers;
use App\Entity\Groupe;
use App\Entity\Ingredient;
use App\Entity\Menu;
use App\Entity\Order;
use App\Entity\OrderItem;
use App\Entity\OrderStatus;
use App\Entity\ProductCategory;
use App\Entity\Products;
use App\Entity\Promotion;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(CustomersCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('DRIINK API');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::section('Users');
        yield MenuItem::linkToCrud('Admin', 'fas fa-list', Admin::class);
        yield MenuItem::linkToCrud('Barman', 'fas fa-list', Barman::class);
        yield MenuItem::linkToCrud('Customers', 'fas fa-list', Customers::class);
        yield MenuItem::section('Enseigne');
        yield MenuItem::linkToCrud('Bar', 'fas fa-list', Bar::class);
        yield MenuItem::linkToCrud('Groupe', 'fas fa-list', Groupe::class);
        yield MenuItem::section('Produits');
        yield MenuItem::linkToCrud('Menu', 'fas fa-list', Menu::class);
        yield MenuItem::linkToCrud('Ingrédient', 'fas fa-list', Ingredient::class);
        yield MenuItem::linkToCrud('Produits', 'fas fa-list', Products::class);
        yield MenuItem::linkToCrud('Catégorie de produits', 'fas fa-list', ProductCategory::class);
        yield MenuItem::linkToCrud('Promotion', 'fas fa-list', Promotion::class);
        yield MenuItem::section('Commandes');
        yield MenuItem::linkToCrud('Status', 'fas fa-list', OrderStatus::class);
        yield MenuItem::linkToCrud('Commandes', 'fas fa-list', Order::class);
        yield MenuItem::linkToCrud('Order\'s item', 'fas fa-list', OrderItem::class);

    }
}