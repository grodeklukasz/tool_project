<?php

namespace App\Entity;

use App\Repository\WorkstationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=WorkstationRepository::class)
 */
class Workstation
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
    private $status;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $seriennummer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $processor;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ram;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $hdd1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $hdd2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $hdd3;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $graphiccard;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $musiccard;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $os;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ports;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $note;

    /**
     * @ORM\ManyToOne(targetEntity=Location::class, inversedBy="workstations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $location;

    /**
     * @ORM\ManyToOne(targetEntity=Hersteller::class, inversedBy="workstations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $producer;

    /**
     * @ORM\ManyToOne(targetEntity=Benutzer::class, inversedBy="workstations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $benutzer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $computername;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $opticaldrive;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mac1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mac2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $hdd1_capacity;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $hdd2_capacity;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $hdd3_capacity;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $hdd1_type;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $hdd2_type;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $hdd3_type;

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

    public function getProcessor(): ?string
    {
        return $this->processor;
    }

    public function setProcessor(string $processor): self
    {
        $this->processor = $processor;

        return $this;
    }

    public function getRam(): ?string
    {
        return $this->ram;
    }

    public function setRam(string $ram): self
    {
        $this->ram = $ram;

        return $this;
    }

    public function getHdd1(): ?string
    {
        return $this->hdd1;
    }

    public function setHdd1(string $hdd1): self
    {
        $this->hdd1 = $hdd1;

        return $this;
    }

    public function getHdd2(): ?string
    {
        return $this->hdd2;
    }

    public function setHdd2(?string $hdd2): self
    {
        $this->hdd2 = $hdd2;

        return $this;
    }

    public function getHdd3(): ?string
    {
        return $this->hdd3;
    }

    public function setHdd3(?string $hdd3): self
    {
        $this->hdd3 = $hdd3;

        return $this;
    }

    public function getGraphiccard(): ?string
    {
        return $this->graphiccard;
    }

    public function setGraphiccard(string $graphiccard): self
    {
        $this->graphiccard = $graphiccard;

        return $this;
    }

    public function getMusiccard(): ?string
    {
        return $this->musiccard;
    }

    public function setMusiccard(string $musiccard): self
    {
        $this->musiccard = $musiccard;

        return $this;
    }

    public function getOs(): ?string
    {
        return $this->os;
    }

    public function setOs(string $os): self
    {
        $this->os = $os;

        return $this;
    }

    public function getPorts(): ?string
    {
        return $this->ports;
    }

    public function setPorts(string $ports): self
    {
        $this->ports = $ports;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): self
    {
        $this->note = $note;

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

    public function getBenutzer(): ?Benutzer
    {
        return $this->benutzer;
    }

    public function setBenutzer(?Benutzer $benutzer): self
    {
        $this->benutzer = $benutzer;

        return $this;
    }

    public function getComputername(): ?string
    {
        return $this->computername;
    }

    public function setComputername(string $computername): self
    {
        $this->computername = $computername;

        return $this;
    }

    public function getOpticaldrive(): ?string
    {
        return $this->opticaldrive;
    }

    public function setOpticaldrive(?string $opticaldrive): self
    {
        $this->opticaldrive = $opticaldrive;

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

    public function getHdd1Capacity(): ?string
    {
        return $this->hdd1_capacity;
    }

    public function setHdd1Capacity(?string $hdd1_capacity): self
    {
        $this->hdd1_capacity = $hdd1_capacity;

        return $this;
    }

    public function getHdd2Capacity(): ?string
    {
        return $this->hdd2_capacity;
    }

    public function setHdd2Capacity(?string $hdd2_capacity): self
    {
        $this->hdd2_capacity = $hdd2_capacity;

        return $this;
    }

    public function getHdd3Capacity(): ?string
    {
        return $this->hdd3_capacity;
    }

    public function setHdd3Capacity(?string $hdd3_capacity): self
    {
        $this->hdd3_capacity = $hdd3_capacity;

        return $this;
    }

    public function getHdd1Type(): ?string
    {
        return $this->hdd1_type;
    }

    public function setHdd1Type(?string $hdd1_type): self
    {
        $this->hdd1_type = $hdd1_type;

        return $this;
    }

    public function getHdd2Type(): ?string
    {
        return $this->hdd2_type;
    }

    public function setHdd2Type(?string $hdd2_type): self
    {
        $this->hdd2_type = $hdd2_type;

        return $this;
    }

    public function getHdd3Type(): ?string
    {
        return $this->hdd3_type;
    }

    public function setHdd3Type(?string $hdd3_type): self
    {
        $this->hdd3_type = $hdd3_type;

        return $this;
    }
}
