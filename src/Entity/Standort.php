<?php

namespace App\Entity;

use App\Repository\StandortRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StandortRepository::class)
 */
class Standort
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $standortname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ort;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $raum;

    /**
     * @ORM\ManyToOne(targetEntity=Item::class, inversedBy="standord")
     * @ORM\JoinColumn(nullable=false)
     */
    private $item;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStandortname(): ?string
    {
        return $this->standortname;
    }

    public function setStandortname(string $standortname): self
    {
        $this->standortname = $standortname;

        return $this;
    }

    public function getOrt(): ?string
    {
        return $this->ort;
    }

    public function setOrt(string $ort): self
    {
        $this->ort = $ort;

        return $this;
    }

    public function getRaum(): ?string
    {
        return $this->raum;
    }

    public function setRaum(string $raum): self
    {
        $this->raum = $raum;

        return $this;
    }

    public function getItem(): ?Item
    {
        return $this->item;
    }

    public function setItem(?Item $item): self
    {
        $this->item = $item;

        return $this;
    }
}
