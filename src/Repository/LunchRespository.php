<?php

namespace App\Repository;


use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

use App\Entity\Recipe;
use App\Entity\Ingredient;
use App\Entity\Dish;

/**
 * @method Dish|null find($id, $lockMode = null, $lockVersion = null)
 * @method Dish|null findOneBy(array $criteria, array $orderBy = null)
 * @method Dish[]    findAll()
 * @method Dish[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LunchRespository extends ServiceEntityRepository
{

    //https://stackoverflow.com/questions/11553183/select-entries-between-dates-in-doctrine-2

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Dish::class);
    }

    public function getdishAll(){
        

        $entity= $this->createQueryBuilder('r')
            //->andWhere('r.exampleField = :val')
            //->setParameter('val', $value)
            ->join('r.idRecipe', 'e')
            ->join('r.idIngredient', 'i')
            // ->where('e.id = 1')
            ->where('i.bestBefore > :last')
            // ->setParameter('last', new \DateTime('-5 second'), \Doctrine\DBAL\Types\Type::DATETIME)
            // ->setParameter('last', new \DateTime('2019-03-08'), \Doctrine\DBAL\Types\Type::DATETIME)
            ->setParameter('last', new \DateTime('2019-03-08T00:00:00+01:00'), \Doctrine\DBAL\Types\Type::DATETIME)
            // ->setParameter('last', new \DateTime('2011-01-25 23:59:59'))
            ->orderBy('r.id', 'ASC')
            //->setMaxResults(10)
            ->getQuery()
            ->getResult();

        //var_dump($entity);die;
        
        // $entity = $em
        // ->getRepository('AppBundle:Dish')
        // ->createQueryBuilder('e')
        // ->join('e.idRecipe', 'r')
        // ->where('r.id = 1')
        // ->getQuery()
        // ->getResult();

        return $entity;
        
    }

    // find by datetime
    public function getdishBestBefore(){
        
        $entity= $this->createQueryBuilder('r')
            //->andWhere('r.exampleField = :val')
            //->setParameter('val', $value)
            ->join('r.idRecipe', 'e')
            ->join('r.idIngredient', 'i')
            // ->where('e.id = 1')
            ->where('i.bestBefore > :last')
            // ->setParameter('last', new \DateTime('-5 second'), \Doctrine\DBAL\Types\Type::DATETIME)
            // ->setParameter('last', new \DateTime('2019-03-08'), \Doctrine\DBAL\Types\Type::DATETIME)
            ->setParameter('last', new \DateTime('2019-03-08T00:00:00+01:00'), \Doctrine\DBAL\Types\Type::DATETIME)
            // ->setParameter('last', new \DateTime('2011-01-25 23:59:59'))
            ->orderBy('r.id', 'ASC')
            //->setMaxResults(10)
            ->getQuery()
            ->getResult();

        return $entity;
        
    }

    public function getdishOne(){
        
        $entity= $this->createQueryBuilder('r')
            //->andWhere('r.exampleField = :val')
            //->setParameter('val', $value)
            ->join('r.idRecipe', 'e')
            ->join('r.idIngredient', 'f')
            ->where('e.id = 1')
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();

        //var_dump($entity);die;
        
        // $entity = $em
        // ->getRepository('AppBundle:Dish')
        // ->createQueryBuilder('e')
        // ->join('e.idRecipe', 'r')
        // ->where('r.id = 1')
        // ->getQuery()
        // ->getResult();

        return $entity;
        
    }

    public function recipe_show($id = null)
    {
        $recipe = $this->getDoctrine()
            ->getRepository(Recipe::class)
            ->find($id);

        if (!$recipe) {
            throw $this->createNotFoundException(
                'No recipe found for id '.$id
            );
        }        

        return $recipe;

        // return $this->json([
        //     'title' =>$recipe->getTitle()        
        // ]);
        
        // return new Response('Check out this great recipe: '.$recipe->getTitle());

        // or render a template
        // in the template, print things with {{ recipe.name }}
        // return $this->render('recipe/show.html.twig', ['recipe' => $recipe]);
    }

    public function saveCustomer($firstName, $lastName, $email, $phoneNumber)
    {
        $newCustomer = new Customer();

        $newCustomer
            ->setFirstName($firstName)
            ->setLastName($lastName)
            ->setEmail($email)
            ->setPhoneNumber($phoneNumber);

        $this->manager->persist($newCustomer);
        $this->manager->flush();
    }


    // /**
    //  * @return Dish[] Returns an array of Dish objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Dish
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}