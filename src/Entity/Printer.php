<?php

namespace App\Entity;

use App\Repository\PrinterRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PrinterRepository::class)
 */
class Printer
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
    private $inventarnummer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $model;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $seriennummer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity=Hersteller::class, inversedBy="printers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $producer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $duplex;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $drucktechnik;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $netzwerk;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $farbtone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $kopieren;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fax;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mac1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mac2;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $note;

    /**
     * @ORM\ManyToOne(targetEntity=Benutzer::class, inversedBy="printers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $benutzer;

    /**
     * @ORM\ManyToOne(targetEntity=Location::class, inversedBy="printers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $location;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getSeriennummer(): ?string
    {
        return $this->seriennummer;
    }

    public function setSeriennummer(string $seriennummer): self
    {
        $this->seriennummer = $seriennummer;

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

    public function getProducer(): ?Hersteller
    {
        return $this->producer;
    }

    public function setProducer(?Hersteller $producer): self
    {
        $this->producer = $producer;

        return $this;
    }

    public function getDuplex(): ?string
    {
        return $this->duplex;
    }

    public function setDuplex(string $duplex): self
    {
        $this->duplex = $duplex;

        return $this;
    }

    public function getDrucktechnik(): ?string
    {
        return $this->drucktechnik;
    }

    public function setDrucktechnik(string $drucktechnik): self
    {
        $this->drucktechnik = $drucktechnik;

        return $this;
    }

    public function getNetzwerk(): ?string
    {
        return $this->netzwerk;
    }

    public function setNetzwerk(string $netzwerk): self
    {
        $this->netzwerk = $netzwerk;

        return $this;
    }

    public function getFarbtone(): ?string
    {
        return $this->farbtone;
    }

    public function setFarbtone(string $farbtone): self
    {
        $this->farbtone = $farbtone;

        return $this;
    }

    public function getKopieren(): ?string
    {
        return $this->kopieren;
    }

    public function setKopieren(string $kopieren): self
    {
        $this->kopieren = $kopieren;

        return $this;
    }

    public function getFax(): ?string
    {
        return $this->fax;
    }

    public function setFax(string $fax): self
    {
        $this->fax = $fax;

        return $this;
    }

    public function getMac1(): ?string
    {
        return $this->mac1;
    }

    public function setMac1(?string $mac1): self
    {
        $this->mac1 = $mac1;

        return $this;
    }

    public function getMac2(): ?string
    {
        return $this->mac2;
    }

    public function setMac2(?string $mac2): self
    {
        $this->mac2 = $mac2;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(string $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getBenutzer(): ?benutzer
    {
        return $this->benutzer;
    }

    public function setBenutzer(?benutzer $benutzer): self
    {
        $this->benutzer = $benutzer;

        return $this;
    }

    public function getLocation(): ?location
    {
        return $this->location;
    }

    public function setLocation(?location $location): self
    {
        $this->location = $location;

        return $this;
    }
}
