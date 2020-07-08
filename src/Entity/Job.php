<?php

namespace App\Entity;

use App\Repository\JobRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JobRepository::class)
 */
class Job
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $bonus11_name;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $bonus11_value;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $bonus12_name;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $bonus12_value;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $bonus21_name;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $bonus21_value;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $bonus22_name;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $bonus22_value;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $img;

    /**
     * @ORM\OneToMany(targetEntity=Craft::class, mappedBy="Job")
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

    public function getBonus11Name(): ?string
    {
        return $this->bonus11_name;
    }

    public function setBonus11Name(string $bonus11_name): self
    {
        $this->bonus11_name = $bonus11_name;

        return $this;
    }

    public function getBonus11Value(): ?int
    {
        return $this->bonus11_value;
    }

    public function setBonus11Value(int $bonus11_value): self
    {
        $this->bonus11_value = $bonus11_value;

        return $this;
    }

    public function getBonus12Name(): ?string
    {
        return $this->bonus12_name;
    }

    public function setBonus12Name(string $bonus12_name): self
    {
        $this->bonus12_name = $bonus12_name;

        return $this;
    }

    public function getBonus12Value(): ?int
    {
        return $this->bonus12_value;
    }

    public function setBonus12Value(int $bonus12_value): self
    {
        $this->bonus12_value = $bonus12_value;

        return $this;
    }

    public function getBonus21Name(): ?string
    {
        return $this->bonus21_name;
    }

    public function setBonus21Name(string $bonus21_name): self
    {
        $this->bonus21_name = $bonus21_name;

        return $this;
    }

    public function getBonus21Value(): ?int
    {
        return $this->bonus21_value;
    }

    public function setBonus21Value(int $bonus21_value): self
    {
        $this->bonus21_value = $bonus21_value;

        return $this;
    }

    public function getBonus22Name(): ?string
    {
        return $this->bonus22_name;
    }

    public function setBonus22Name(string $bonus22_name): self
    {
        $this->bonus22_name = $bonus22_name;

        return $this;
    }

    public function getBonus22Value(): ?int
    {
        return $this->bonus22_value;
    }

    public function setBonus22Value(int $bonus22_value): self
    {
        $this->bonus22_value = $bonus22_value;

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
            $craft->setJob($this);
        }

        return $this;
    }

    public function removeCraft(Craft $craft): self
    {
        if ($this->crafts->contains($craft)) {
            $this->crafts->removeElement($craft);
            // set the owning side to null (unless already changed)
            if ($craft->getJob() === $this) {
                $craft->setJob(null);
            }
        }

        return $this;
    }
}
