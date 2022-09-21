<?php

namespace App\Entity;

use App\Repository\BenutzerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BenutzerRepository::class)
 */
class Benutzer
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
    private $vorname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nachname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mobiltelefon;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $festnetznummer;

    /**
     * @ORM\OneToMany(targetEntity=Item::class, mappedBy="benutzer")
     */
    private $item;

    /**
     * @ORM\ManyToOne(targetEntity=Kst::class, inversedBy="benutzer")
     * @ORM\JoinColumn(nullable=false)
     */
    private $kst;

    /**
     * @ORM\OneToMany(targetEntity=Workstation::class, mappedBy="benutzer")
     */
    private $workstations;

    /**
     * @ORM\OneToMany(targetEntity=Laptop::class, mappedBy="benutzer")
     */
    private $laptops;

    /**
     * @ORM\OneToMany(targetEntity=Handy::class, mappedBy="benutzer")
     */
    private $handies;

    public function __construct()
    {
        $this->item = new ArrayCollection();
        $this->workstations = new ArrayCollection();
        $this->laptops = new ArrayCollection();
        $this->handies = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->nachname . ', ' . $this->vorname . ' [' . $this->kst . ']';
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVorname(): ?string
    {
        return $this->vorname;
    }

    public function setVorname(string $vorname): self
    {
        $this->vorname = $vorname;

        return $this;
    }

    public function getNachname(): ?string
    {
        return $this->nachname;
    }

    public function setNachname(string $nachname): self
    {
        $this->nachname = $nachname;

        return $this;
    }

    public function getMobiltelefon(): ?string
    {
        return $this->mobiltelefon;
    }

    public function setMobiltelefon(?string $mobiltelefon): self
    {
        $this->mobiltelefon = $mobiltelefon;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getFestnetznummer(): ?string
    {
        return $this->festnetznummer;
    }

    public function setFestnetznummer(?string $festnetznummer): self
    {
        $this->festnetznummer = $festnetznummer;

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
            $item->setBenutzer($this);
        }

        return $this;
    }

    public function removeItem(Item $item): self
    {
        if ($this->item->removeElement($item)) {
            // set the owning side to null (unless already changed)
            if ($item->getBenutzer() === $this) {
                $item->setBenutzer(null);
            }
        }

        return $this;
    }

    public function getKst(): ?Kst
    {
        return $this->kst;
    }

    public function setKst(?Kst $kst): self
    {
        $this->kst = $kst;

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
            $workstation->setBenutzer($this);
        }

        return $this;
    }

    public function removeWorkstation(Workstation $workstation): self
    {
        if ($this->workstations->removeElement($workstation)) {
            // set the owning side to null (unless already changed)
            if ($workstation->getBenutzer() === $this) {
                $workstation->setBenutzer(null);
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
            $laptop->setBenutzer($this);
        }

        return $this;
    }

    public function removeLaptop(Laptop $laptop): self
    {
        if ($this->laptops->removeElement($laptop)) {
            // set the owning side to null (unless already changed)
            if ($laptop->getBenutzer() === $this) {
                $laptop->setBenutzer(null);
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
            $handy->setBenutzer($this);
        }

        return $this;
    }

    public function removeHandy(Handy $handy): self
    {
        if ($this->handies->removeElement($handy)) {
            // set the owning side to null (unless already changed)
            if ($handy->getBenutzer() === $this) {
                $handy->setBenutzer(null);
            }
        }

        return $this;
    }
}
