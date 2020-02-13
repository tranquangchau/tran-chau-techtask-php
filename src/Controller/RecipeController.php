<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Recipe;


class RecipeController extends AbstractController
{
    /**
     * @Route("/recipe", name="recipe", methods={"GET"})
     */
    public function index()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/RecipeController.php',
        ]);
    }

    /**
     * @Route("/recipe/{id}", name="recipe_show" , methods={"GET"}) 
     */
    public function recipe_show($id)
    {
        $recipe = $this->getDoctrine()
            ->getRepository(Recipe::class)
            ->find($id);

        if (!$recipe) {
            throw $this->createNotFoundException(
                'No recipe found for id '.$id
            );
        }        
        return $this->json([
            'title' =>$recipe->getTitle()        
        ]);
        
        return new Response('Check out this great recipe: '.$recipe->getTitle());

        // or render a template
        // in the template, print things with {{ recipe.name }}
        // return $this->render('recipe/show.html.twig', ['recipe' => $recipe]);
    }

}
