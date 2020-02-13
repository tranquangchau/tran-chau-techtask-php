<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dish
 *
 * @ORM\Table(name="dish", indexes={@ORM\Index(name="id_ingredient", columns={"id_ingredient"}), @ORM\Index(name="id_recipe", columns={"id_recipe"})})
 * @ORM\Entity
 */
class Dish
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Ingredient
     *
     * @ORM\ManyToOne(targetEntity="Ingredient")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_ingredient", referencedColumnName="id")
     * })
     */
    private $idIngredient;

    /**
     * @var \Recipe
     *
     * @ORM\ManyToOne(targetEntity="Recipe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_recipe", referencedColumnName="id")
     * })
     */
    private $idRecipe;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdIngredient(): ?Ingredient
    {
        return $this->idIngredient;
    }

    public function setIdIngredient(?Ingredient $idIngredient): self
    {
        $this->idIngredient = $idIngredient;

        return $this;
    }

    public function getIdRecipe(): ?Recipe
    {
        return $this->idRecipe;
    }

    public function setIdRecipe(?Recipe $idRecipe): self
    {
        $this->idRecipe = $idRecipe;

        return $this;
    }

    public function findByConditionDish($id){
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p FROM AppBundle:Dish p ORDER BY p.id ASC'
            )
            ->getResult();
    }

    public function toArray()
    {

        $object_name = $this->get_method ($this->getIdIngredient());
        var_dump($object_name);die;

        return [
            'id' => $this->getId(),
            'id_Ingredient' => $this->getIdIngredient()->getId(),
            'id_Recipe' => $this->getIdRecipe()->getId(),
            // 'id' => $this->getId(),
        ];
    }

    private function get_method($object){
        $list_method = get_class_methods ($object);
        $list = [];
        foreach ($list_method as $key => $value) {
            if(substr($value,0,3) =='get'){
                $list [] =$value;
            }
        }
        return $list;
    }


}
