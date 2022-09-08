<?php

namespace App\Entity;

use App\Repository\ItemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ItemRepository::class)
 */
class Item
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
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $inventarnummer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $model;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $seriennummer;

    /**
     * @ORM\Column(type="text")
     */
    private $bemerkung;

    /**
     * @ORM\ManyToOne(targetEntity=Benutzer::class, inversedBy="item")
     * @ORM\JoinColumn(nullable=false)
     */
    private $benutzer;

    /**
     * @ORM\OneToMany(targetEntity=Standort::class, mappedBy="item")
     */
    private $standord;

    /**
     * @ORM\ManyToOne(targetEntity=Hersteller::class, inversedBy="item")
     * @ORM\JoinColumn(nullable=false)
     */
    private $hersteller;

    public function __construct()
    {
        $this->standord = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getInventarnummer(): ?string
    {
        return $this->inventarnummer;
    }

    public function setInventarnummer(string $inventarnummer): self
    {
        $this->inventarnummer = $inventarnummer;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getSeriennummer(): ?string
    {
        return $this->seriennummer;
    }

    public function setSeriennummer(string $seriennummer): self
    {
        $this->seriennummer = $seriennummer;

        return $this;
    }

    public function getBemerkung(): ?string
    {
        return $this->bemerkung;
    }

    public function setBemerkung(string $bemerkung): self
    {
        $this->bemerkung = $bemerkung;

        return $this;
    }

    public function getBenutzer(): ?Benutzer
    {
        return $this->benutzer;
    }

    public function setBenutzer(?Benutzer $benutzer): self
    {
        $this->benutzer = $benutzer;

        return $this;
    }

    /**
     * @return Collection<int, Standort>
     */
    public function getStandord(): Collection
    {
        return $this->standord;
    }

    public function addStandord(Standort $standord): self
    {
        if (!$this->standord->contains($standord)) {
            $this->standord[] = $standord;
            $standord->setItem($this);
        }

        return $this;
    }

    public function removeStandord(Standort $standord): self
    {
        if ($this->standord->removeElement($standord)) {
            // set the owning side to null (unless already changed)
            if ($standord->getItem() === $this) {
                $standord->setItem(null);
            }
        }

        return $this;
    }

    public function getHersteller(): ?Hersteller
    {
        return $this->hersteller;
    }

    public function setHersteller(?Hersteller $hersteller): self
    {
        $this->hersteller = $hersteller;

        return $this;
    }
}
