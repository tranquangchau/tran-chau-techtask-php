<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Recipe;
use App\Entity\Dish;

use Doctrine\DBAL\Driver\Connection;

use src\Repository\ProductRepository;

class DishController extends AbstractController
{
    /**
     * @Route("/dish", name="dish")
     */
    public function index()
    {
        
        // return $this->json([
        //     'message' => 'Welcome to your new controller!',
        //     'path' => 'src/Controller/DishController.php',
        // ]);
    }    
    /**
     * @Route("/dishcondition/", name="dish_condition" , methods={"GET"}) 
     */
    public function dish_condition()
    {
        $id = '1';
        $dish = $this->getDoctrine()
        ->getRepository(Dish::class)
        // ->find($id);
        ->findByConditionDish($id);
        
        echo '123 -dish';die;
    }
    
    /**
     * @Route("/dish/{id}", name="dish_show" , methods={"GET"}) 
     */
    public function dish($id)
    {

        $recipe = $this->getDoctrine()
        ->getRepository(Recipe::class)
        ->find(1);
        // ->findBy(['id'=>1]);

        if (!$recipe) {
            throw $this->createNotFoundException(
                'No dish found for id '.$id
            );
        }

        $dish = $this->getDoctrine()
        ->getRepository(Dish::class)
        // ->find($id);
        ->findByIdRecipe($recipe);
        // ->findBy(['id_recipe'=>$recipe]);

        if (!$dish) {
            throw $this->createNotFoundException(
                'No dish found for id '.$id
            );
        }

        var_dump($dish[0]->getId());die;

        
        $conn  =new Connection();
        $users = $connection->fetchAll('SELECT * FROM dish');
        var_dump($users);
        die;

        $db = '';
        $db= $this->em->getConnection()->getDatabase();

        $stmt = $db->prepare("SELECT * FROM `dish` WHERE `id` = '1' LIMIT 50");

$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo '<pre>';
print_r($rows);
die;



        $conn = $this->getDoctrine()->getManager();

        //$conn = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT * FROM dish p
            #WHERE p.price > :price
            #ORDER BY p.price ASC
            ';
        $stmt = $conn->prepare($sql);
        // $stmt->execute(['price' => $price]);
    
        // returns an array of arrays (i.e. a raw data set)
        $data =  $stmt->fetchAll();
        var_dump($data);die;
    



        $dish = $this->getDoctrine()
        ->getRepository(Dish::class)
        // ->find($id);
        ->find('');

        if (!$dish) {
            throw $this->createNotFoundException(
                'No dish found for id '.$id
            );
        }
        
        // var_dump($dish->toArray());
die;
        //var_dump($dish->getIdIngredient()->getId());die;
        var_dump($dish->getIdIngredient()->getBestBefore());die;
        // return $this->json([
        //     'title' =>$dish->getTitle()        
        // ]);

        
    }    
}
