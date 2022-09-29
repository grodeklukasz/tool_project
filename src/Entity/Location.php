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

    /**
     * @ORM\OneToMany(targetEntity=Laptop::class, mappedBy="location")
     */
    private $laptops;

    /**
     * @ORM\OneToMany(targetEntity=Handy::class, mappedBy="location")
     */
    private $handies;

    /**
     * @ORM\OneToMany(targetEntity=Printer::class, mappedBy="location")
     */
    private $printers;

    public function __construct()
    {
        $this->workstations = new ArrayCollection();
        $this->laptops = new ArrayCollection();
        $this->handies = new ArrayCollection();
        $this->printers = new ArrayCollection();
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

    /**
     * @return Collection<int, Laptop>
     */
    public function getLaptops(): Collection
    {
        return $this->laptops;
    }

    public function addLaptop(Laptop $laptop): self
    {
        if (!$this->laptops->contains($laptop)) {
            $this->laptops[] = $laptop;
            $laptop->setLocation($this);
        }

        return $this;
    }

    public function removeLaptop(Laptop $laptop): self
    {
        if ($this->laptops->removeElement($laptop)) {
            // set the owning side to null (unless already changed)
            if ($laptop->getLocation() === $this) {
                $laptop->setLocation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Handy>
     */
    public function getHandies(): Collection
    {
        return $this->handies;
    }

    public function addHandy(Handy $handy): self
    {
        if (!$this->handies->contains($handy)) {
            $this->handies[] = $handy;
            $handy->setLocation($this);
        }

        return $this;
    }

    public function removeHandy(Handy $handy): self
    {
        if ($this->handies->removeElement($handy)) {
            // set the owning side to null (unless already changed)
            if ($handy->getLocation() === $this) {
                $handy->setLocation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Printer>
     */
    public function getPrinters(): Collection
    {
        return $this->printers;
    }

    public function addPrinter(Printer $printer): self
    {
        if (!$this->printers->contains($printer)) {
            $this->printers[] = $printer;
            $printer->setLocation($this);
        }

        return $this;
    }

    public function removePrinter(Printer $printer): self
    {
        if ($this->printers->removeElement($printer)) {
            // set the owning side to null (unless already changed)
            if ($printer->getLocation() === $this) {
                $printer->setLocation(null);
            }
        }

        return $this;
    }
}
