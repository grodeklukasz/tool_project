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

    public function __construct()
    {
        $this->item = new ArrayCollection();
        $this->workstations = new ArrayCollection();
        $this->laptops = new ArrayCollection();
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
}
