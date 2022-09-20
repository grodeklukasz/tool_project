<?php

namespace App\Entity;

use App\Repository\LocationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LocationRepository::class)
 */
class Location
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
    private $locationname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ort;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $room;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $abteilung;

    /**
     * @ORM\OneToMany(targetEntity=Workstation::class, mappedBy="location")
     */
    private $workstations;

    public function __construct()
    {
        $this->workstations = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->locationname . " " . $this->ort . " " . $this->room;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLocationname(): ?string
    {
        return $this->locationname;
    }

    public function setLocationname(string $locationname): self
    {
        $this->locationname = $locationname;

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

    public function getRoom(): ?string
    {
        return $this->room;
    }

    public function setRoom(string $room): self
    {
        $this->room = $room;

        return $this;
    }

    public function getAbteilung(): ?string
    {
        return $this->abteilung;
    }

    public function setAbteilung(string $abteilung): self
    {
        $this->abteilung = $abteilung;

        return $this;
    }

    /**
     * @return Collection<int, Workstation>
     */
    public function getWorkstations(): Collection
    {
        return $this->workstations;
    }

    public function addWorkstation(Workstation $workstation): self
    {
        if (!$this->workstations->contains($workstation)) {
            $this->workstations[] = $workstation;
            $workstation->setLocation($this);
        }

        return $this;
    }

    public function removeWorkstation(Workstation $workstation): self
    {
        if ($this->workstations->removeElement($workstation)) {
            // set the owning side to null (unless already changed)
            if ($workstation->getLocation() === $this) {
                $workstation->setLocation(null);
            }
        }

        return $this;
    }
}
