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
     * @ORM\ManyToOne(targetEntity=Raw::class, inversedBy="crafts")
     */
    private $raw1;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Qraw1;
   
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Qraw2;
   
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Qraw3;

    /**
     * @ORM\ManyToOne(targetEntity=job::class, inversedBy="crafts")
     */
    private $Job;



    public function __construct()
    {
        $this->raw2 = new ArrayCollection();
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

    public function getRaw1(): ?Raw
    {
        return $this->raw1;
    }

    public function setRaw1(?Raw $raw1): self
    {
        $this->raw1 = $raw1;

        return $this;
    }

    public function getQraw1(): ?int
    {
        return $this->Qraw1;
    }

    public function setQraw1(?int $Qraw1): self
    {
        $this->Qraw1 = $Qraw1;

        return $this;
    }


    public function getQraw2(): ?int
    {
        return $this->Qraw2;
    }

    public function setQraw2(?int $Qraw2): self
    {
        $this->Qraw2 = $Qraw2;

        return $this;
    }
   
    public function getQraw3(): ?int
    {
        return $this->Qraw3;
    }

    public function setQraw3(?int $Qraw3): self
    {
        $this->Qraw3 = $Qraw3;

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

    
}
