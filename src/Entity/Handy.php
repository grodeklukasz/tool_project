<?php

namespace App\Entity;

use App\Repository\HandyRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HandyRepository::class)
 */
class Handy
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
    private $Inventarnummer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Model;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Seriennummer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Status;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imei1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imei2;

    /**
     * @ORM\ManyToOne(targetEntity=Benutzer::class, inversedBy="handies")
     * @ORM\JoinColumn(nullable=false)
     */
    private $benutzer;

    /**
     * @ORM\ManyToOne(targetEntity=Location::class, inversedBy="handies")
     * @ORM\JoinColumn(nullable=false)
     */
    private $location;

    /**
     * @ORM\ManyToOne(targetEntity=Hersteller::class, inversedBy="handies")
     * @ORM\JoinColumn(nullable=false)
     */
    private $producer;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Note;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInventarnummer(): ?string
    {
        return $this->Inventarnummer;
    }

    public function setInventarnummer(string $Inventarnummer): self
    {
        $this->Inventarnummer = $Inventarnummer;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->Model;
    }

    public function setModel(string $Model): self
    {
        $this->Model = $Model;

        return $this;
    }

    public function getSeriennummer(): ?string
    {
        return $this->Seriennummer;
    }

    public function setSeriennummer(string $Seriennummer): self
    {
        $this->Seriennummer = $Seriennummer;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->Status;
    }

    public function setStatus(string $Status): self
    {
        $this->Status = $Status;

        return $this;
    }

    public function getImei1(): ?string
    {
        return $this->imei1;
    }

    public function setImei1(string $imei1): self
    {
        $this->imei1 = $imei1;

        return $this;
    }

    public function getImei2(): ?string
    {
        return $this->imei2;
    }

    public function setImei2(?string $imei2): self
    {
        $this->imei2 = $imei2;

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

    public function getLocation(): ?Location
    {
        return $this->location;
    }

    public function setLocation(?Location $location): self
    {
        $this->location = $location;

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

    public function getNote(): ?string
    {
        return $this->Note;
    }

    public function setNote(?string $Note): self
    {
        $this->Note = $Note;

        return $this;
    }
}
