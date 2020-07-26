<?php

namespace App\Entity;

use App\Repository\RawCraftRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RawCraftRepository::class)
 */
class RawCraft
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Raw::class, inversedBy="rawCrafts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $raw;

    /**
     * @ORM\ManyToOne(targetEntity=Craft::class, inversedBy="rawCrafts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $craft;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRaw(): ?Raw
    {
        return $this->raw;
    }

    public function setRaw(?Raw $raw): self
    {
        $this->raw = $raw;

        return $this;
    }

    public function getCraft(): ?Craft
    {
        return $this->craft;
    }

    public function setCraft(?Craft $craft): self
    {
        $this->craft = $craft;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }
}
