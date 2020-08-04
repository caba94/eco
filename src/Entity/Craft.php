<?php

namespace App\Entity;

use App\Repository\CraftRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Job;
use Symfony\Component\Validator\Constraints as Asserts;

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
     * @ORM\ManyToOne(targetEntity=job::class, inversedBy="crafts")
     */
    private $Job;

    /**
     * @ORM\OneToMany(targetEntity=RawCraft::class, mappedBy="craft", orphanRemoval=true)
     */
    private $rawCrafts;



    public function __construct()
    {
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

    public function getJob(): ?job
    {
        return $this->Job;
    }

    public function setJob(?job $Job): self
    {
        $this->Job = $Job;

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
            $rawCraft->setCraft($this);
        }

        return $this;
    }

    public function removeRawCraft(RawCraft $rawCraft): self
    {
        if ($this->rawCrafts->contains($rawCraft)) {
            $this->rawCrafts->removeElement($rawCraft);
            // set the owning side to null (unless already changed)
            if ($rawCraft->getCraft() === $this) {
                $rawCraft->setCraft(null);
            }
        }

        return $this;
    }

    
}
