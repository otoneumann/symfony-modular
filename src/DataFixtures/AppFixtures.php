<?php

namespace App\DataFixtures;

use App\Controller\RackController;
use App\Entity\ModularModules;
use App\Entity\ModularRacks;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Product;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $product = new Product();
        $manager->persist($product);
        $product->setDescription("First Product");
        $product->setSize(100);
        $manager->persist($product);

        $product = new Product();
        $manager->persist($product);
        $product->setDescription("Second Product");
        $product->setSize(100);
        $manager->persist($product);

        $modul = new ModularModules();
        $manager->persist($modul);
        $modul->setName("Module1");
        $modul->setDescription("Modular Modules");
        $modul->setPrice(200);
        $manager->persist($modul);

        $modul = new ModularModules();
        $manager->persist($modul);

        $modul->setDescription("Modular Modules2");
        $modul->setName("Module2");
        $modul->setPrice(300);
        $manager->persist($modul);

        $rack = new ModularRacks();
        $manager->persist($rack);
        $rack->setRackName("Rack1");
        $rack->setDescription("Rack Modules");
        $rack->setRackPrice(500);
        $manager->persist($rack);

        $rack = new ModularRacks();
        $manager->persist($rack);
        $rack->setRackName("Rack2");
        $rack->setDescription("Rack Modules");
        $rack->setRackPrice(300);
        $manager->persist($rack);

        // loads data in db
        $manager->flush();
    }
}
