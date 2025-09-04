<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ProductController extends AbstractController
{
    #[Route('/products', name: 'product_index')]
    public function index(): Response
    {
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }

    #[Route('/modul', name: 'modul_index')]
    public function modul(): Response
    {
        return $this->render('product/modul.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }

    #[Route('/racks', name:'rack_index')]
    public function racks(): Response
    {
        return $this->render('product/rack.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }

}
