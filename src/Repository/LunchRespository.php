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

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Dish::class);
    }

    /**
     * get get data in dish with element
     */
    public function getdishAll(){
        
        $entity= $this->createQueryBuilder('r')
            ->join('r.idRecipe', 'e')
            ->join('r.idIngredient', 'i')
            ->orderBy('r.id', 'ASC')
            ->getQuery()
            ->getResult();

        return $entity;
        
    }

    // find by datetime
    /**
     * * get data in dish with Ingredient.bestBefore condition
     */
    public function getdishBestBefore($date){
        
        $entity= $this->createQueryBuilder('r')
            ->join('r.idRecipe', 'e')
            ->join('r.idIngredient', 'i')
            // ->where('e.id = 1')
            ->where('i.bestBefore > :last')
            ->setParameter('last', new \DateTime($date), \Doctrine\DBAL\Types\Type::DATETIME)
            ->orderBy('r.id', 'ASC')
            ->getQuery()
            ->getResult();

        return $entity;
        
    }
    // find by datetime
    /**
     * get data in dish with Ingredient.useby condition
     */
    public function getdishUserBy($date){
        
        $entity= $this->createQueryBuilder('r')
            ->join('r.idRecipe', 'e')
            ->join('r.idIngredient', 'i')
            ->where('i.useBy > :last')
            ->setParameter('last', new \DateTime($date), \Doctrine\DBAL\Types\Type::DATETIME)
            ->orderBy('r.id', 'ASC')
            //->setMaxResults(10)
            ->getQuery()
            ->getResult();

        return $entity;
        
    }

    /**
     * get data in dish with recipe id
     */
    public function getdishOneByRecipe($id){
        
        $entity= $this->createQueryBuilder('r')
            //->andWhere('r.exampleField = :val')
            //->setParameter('val', $value)
            ->join('r.idRecipe', 'e')
            ->join('r.idIngredient', 'f')
            ->where('e.id = '.$id)
            ->orderBy('r.id', 'ASC')
            // ->setMaxResults(10)
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


    //for test
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

    //for test
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