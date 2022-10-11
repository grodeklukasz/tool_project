<?php

namespace App\Entity;

use App\Repository\StandortRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\OneToMany(targetEntity=Netzwerk::class, mappedBy="Standort")
     */
    private $netzwerks;

    public function __construct()
    {
        $this->netzwerks = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->standortname . " " . $this->ort . " " . $this->raum;
    }
    
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

    /**
     * @return Collection<int, Netzwerk>
     */
    public function getNetzwerks(): Collection
    {
        return $this->netzwerks;
    }

    public function addNetzwerk(Netzwerk $netzwerk): self
    {
        if (!$this->netzwerks->contains($netzwerk)) {
            $this->netzwerks[] = $netzwerk;
            $netzwerk->setStandort($this);
        }

        return $this;
    }

    public function removeNetzwerk(Netzwerk $netzwerk): self
    {
        if ($this->netzwerks->removeElement($netzwerk)) {
            // set the owning side to null (unless already changed)
            if ($netzwerk->getStandort() === $this) {
                $netzwerk->setStandort(null);
            }
        }

        return $this;
    }
}
