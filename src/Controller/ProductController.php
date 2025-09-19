<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ProductRepository;

class ProductController extends AbstractController
{
    #[Route('/products', name: 'product_index')]
    public function index(ProductRepository $repository): Response
    {
        return $this->render('product/index.html.twig', [
            'products' => $repository->findAll(),
        ]);
    }

    #[Route('/product/{id<\d+>}', name: 'product_show')]
    public function show(Product $product): Response
    {
        return $this->render('product/show.html.twig', [
            'product' => $product,
        ]);
    }

    #[Route('/product/new', name: 'product_new')]
    public function new(Request $request, EntityManagerInterface $manager): Response
    {
        $product = new Product();

        $form = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($product);

            $manager->flush();

            $this->addFlash(
                'notice',
                'Product created success'
            );

            return $this->redirectToRoute('product_show', [
                'id' => $product->getId()]);
        }


        return $this->render('product/new.html.twig', [
            'form' => $form,
        ]);

    }
    #[Route('/product/{id<\d+>}/edit}', name:'product_edit')]
    public function edit(Product $product, Request $request, EntityManagerInterface $manager): Response
    {
        $form = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->flush();

            $this->addFlash(
                'notice',
                'Product updted success'
            );

            return $this->redirectToRoute('product_show', [
                'id' => $product->getId()]);
        }


        return $this->render('product/edit.html.twig', [
            'form' => $form,
        ]);

    }

    #[Route('/product/{id<\d+>}/delete', name:'product_delete')]
    public function delete(Request $request, Product $product, EntityManagerInterface $manager): Response
    {
        if($request->isMethod('POST')) {
            $manager->remove($product);
            $manager->flush();
            $this->addFlash(
                'notice',
                'Product deleted success'
            );
            return $this->redirectToRoute('product_index');
        }

        return $this->render('product/delete.html.twig', [
            'id' => $product->getId(),
        ]);
    }



}
