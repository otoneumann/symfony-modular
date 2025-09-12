<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\ModularRacksRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class RackController extends AbstractController
{

    #[Route('/racks', name:'rack_index')]
    public function racks(ModularRacksRepository $repository): Response
    {
        return $this->render('racks/rack.html.twig', [
            'racks' => $repository->findAll(),
        ]);
    }
}
