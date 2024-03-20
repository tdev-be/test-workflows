<?php

namespace App\Controller;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Recipe;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(EntityManager $em): Response
    {
        $recipe = new Recipe();
        $recipe->setName('yeah');
        $em->persist($recipe);
        $em->flush();
        $recipes = $em->getRepository(Recipe::class)->findAll();
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'recipes' => $recipes
        ]);
    }
}
