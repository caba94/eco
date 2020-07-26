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
     * @ORM\OneToMany(targetEntity=RawCraft::class, mappedBy="raw", orphanRemoval=true)
     */
    private $rawCrafts;



    public function __construct()
    {
        $this->crafts = new ArrayCollection();
        $this->rawCrafts = new ArrayCollection();
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
     * @return Collection|RawCraft[]
     */
    public function getRawCrafts(): Collection
    {
        return $this->rawCrafts;
    }

    public function addRawCraft(RawCraft $rawCraft): self
    {
        if (!$this->rawCrafts->contains($rawCraft)) {
            $this->rawCrafts[] = $rawCraft;
            $rawCraft->setRaw($this);
        }

        return $this;
    }

    public function removeRawCraft(RawCraft $rawCraft): self
    {
        if ($this->rawCrafts->contains($rawCraft)) {
            $this->rawCrafts->removeElement($rawCraft);
            // set the owning side to null (unless already changed)
            if ($rawCraft->getRaw() === $this) {
                $rawCraft->setRaw(null);
            }
        }

        return $this;
    }

    
    
}
