<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ingredient
 *
 * @ORM\Table(name="ingredient")
 * @ORM\Entity
 */
class Ingredient
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
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="best_before", type="date", nullable=false)
     */
    private $bestBefore;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="use_by", type="date", nullable=false)
     */
    private $useBy;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getBestBefore(): ?\DateTimeInterface
    {
        return $this->bestBefore;
    }

    public function setBestBefore(\DateTimeInterface $bestBefore): self
    {
        $this->bestBefore = $bestBefore;

        return $this;
    }

    public function getUseBy(): ?\DateTimeInterface
    {
        return $this->useBy;
    }

    public function setUseBy(\DateTimeInterface $useBy): self
    {
        $this->useBy = $useBy;

        return $this;
    }


}
