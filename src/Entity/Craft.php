<?php

namespace App\Entity;

use App\Repository\CraftRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CraftRepository::class)
 */
class Craft
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=raw::class, inversedBy="crafts")
     */
    private $Ingredients;

    public function __construct()
    {
        $this->Ingredients = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|raw[]
     */
    public function getIngredients(): Collection
    {
        return $this->Ingredients;
    }

    public function addIngredient(raw $ingredient): self
    {
        if (!$this->Ingredients->contains($ingredient)) {
            $this->Ingredients[] = $ingredient;
        }

        return $this;
    }

    public function removeIngredient(raw $ingredient): self
    {
        if ($this->Ingredients->contains($ingredient)) {
            $this->Ingredients->removeElement($ingredient);
        }

        return $this;
    }
}
