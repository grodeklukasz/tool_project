<?php

namespace App\Entity;

use App\Repository\HerstellerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HerstellerRepository::class)
 */
class Hersteller
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
    private $Companyname;

    /**
     * @ORM\OneToMany(targetEntity=Item::class, mappedBy="hersteller")
     */
    private $item;

    /**
     * @ORM\OneToMany(targetEntity=Workstation::class, mappedBy="producer")
     */
    private $workstations;

    /**
     * @ORM\OneToMany(targetEntity=Laptop::class, mappedBy="producer")
     */
    private $laptops;

    /**
     * @ORM\OneToMany(targetEntity=Handy::class, mappedBy="producer")
     */
    private $handies;

    /**
     * @ORM\OneToMany(targetEntity=Printer::class, mappedBy="producer")
     */
    private $printers;

    /**
     * @ORM\OneToMany(targetEntity=Monitor::class, mappedBy="hersteller")
     */
    private $monitors;

    public function __construct()
    {
        $this->item = new ArrayCollection();
        $this->workstations = new ArrayCollection();
        $this->laptops = new ArrayCollection();
        $this->handies = new ArrayCollection();
        $this->printers = new ArrayCollection();
        $this->monitors = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->Companyname;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompanyname(): ?string
    {
        return $this->Companyname;
    }

    public function setCompanyname(string $Companyname): self
    {
        $this->Companyname = $Companyname;

        return $this;
    }

    /**
     * @return Collection<int, Item>
     */
    public function getItem(): Collection
    {
        return $this->item;
    }

    public function addItem(Item $item): self
    {
        if (!$this->item->contains($item)) {
            $this->item[] = $item;
            $item->setHersteller($this);
        }

        return $this;
    }

    public function removeItem(Item $item): self
    {
        if ($this->item->removeElement($item)) {
            // set the owning side to null (unless already changed)
            if ($item->getHersteller() === $this) {
                $item->setHersteller(null);
            }
        }

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
            $workstation->setProducer($this);
        }

        return $this;
    }

    public function removeWorkstation(Workstation $workstation): self
    {
        if ($this->workstations->removeElement($workstation)) {
            // set the owning side to null (unless already changed)
            if ($workstation->getProducer() === $this) {
                $workstation->setProducer(null);
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
            $laptop->setProducer($this);
        }

        return $this;
    }

    public function removeLaptop(Laptop $laptop): self
    {
        if ($this->laptops->removeElement($laptop)) {
            // set the owning side to null (unless already changed)
            if ($laptop->getProducer() === $this) {
                $laptop->setProducer(null);
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
            $handy->setProducer($this);
        }

        return $this;
    }

    public function removeHandy(Handy $handy): self
    {
        if ($this->handies->removeElement($handy)) {
            // set the owning side to null (unless already changed)
            if ($handy->getProducer() === $this) {
                $handy->setProducer(null);
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
            $printer->setProducer($this);
        }

        return $this;
    }

    public function removePrinter(Printer $printer): self
    {
        if ($this->printers->removeElement($printer)) {
            // set the owning side to null (unless already changed)
            if ($printer->getProducer() === $this) {
                $printer->setProducer(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Monitor>
     */
    public function getMonitors(): Collection
    {
        return $this->monitors;
    }

    public function addMonitor(Monitor $monitor): self
    {
        if (!$this->monitors->contains($monitor)) {
            $this->monitors[] = $monitor;
            $monitor->setHersteller($this);
        }

        return $this;
    }

    public function removeMonitor(Monitor $monitor): self
    {
        if ($this->monitors->removeElement($monitor)) {
            // set the owning side to null (unless already changed)
            if ($monitor->getHersteller() === $this) {
                $monitor->setHersteller(null);
            }
        }

        return $this;
    }
}
