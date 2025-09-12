<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\ModularModulesRepository;

class ModulContoller extends AbstractController
{
    #[Route('/modul', name: 'modul_index')]
    public function modul(ModularModulesRepository $repository): Response
    {
        return $this->render('modules/modul.html.twig', [
            'modules' => $repository->findAll(),
        ]);
    }
}
