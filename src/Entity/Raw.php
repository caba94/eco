<?php

namespace App\Entity;

use App\Repository\RawRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RawRepository::class)
 */
class Raw
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
     * @ORM\Column(type="float", nullable=true)
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $img;

    /**
     * @ORM\ManyToMany(targetEntity=Craft::class, mappedBy="Ingredients")
     */
    private $crafts;

    public function __construct()
    {
        $this->crafts = new ArrayCollection();
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

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(?string $img): self
    {
        $this->img = $img;

        return $this;
    }

    /**
     * @return Collection|Craft[]
     */
    public function getCrafts(): Collection
    {
        return $this->crafts;
    }

    public function addCraft(Craft $craft): self
    {
        if (!$this->crafts->contains($craft)) {
            $this->crafts[] = $craft;
            $craft->addIngredient($this);
        }

        return $this;
    }

    public function removeCraft(Craft $craft): self
    {
        if ($this->crafts->contains($craft)) {
            $this->crafts->removeElement($craft);
            $craft->removeIngredient($this);
        }

        return $this;
    }
}
