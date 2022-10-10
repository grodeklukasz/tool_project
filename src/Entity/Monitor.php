<?php

namespace App\Entity;

use App\Repository\MonitorRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MonitorRepository::class)
 */
class Monitor
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
    private $modell;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $seriennummer;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $size;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ports;

    /**
     * @ORM\ManyToOne(targetEntity=Location::class, inversedBy="monitors")
     * @ORM\JoinColumn(nullable=false)
     */
    private $location;

    /**
     * @ORM\ManyToOne(targetEntity=Hersteller::class, inversedBy="monitors")
     * @ORM\JoinColumn(nullable=false)
     */
    private $hersteller;

    /**
     * @ORM\ManyToOne(targetEntity=Benutzer::class, inversedBy="monitors")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

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

    public function getModell(): ?string
    {
        return $this->modell;
    }

    public function setModell(string $modell): self
    {
        $this->modell = $modell;

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

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(?string $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getPorts(): ?string
    {
        return $this->ports;
    }

    public function setPorts(?string $ports): self
    {
        $this->ports = $ports;

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

    public function getHersteller(): ?Hersteller
    {
        return $this->hersteller;
    }

    public function setHersteller(?Hersteller $hersteller): self
    {
        $this->hersteller = $hersteller;

        return $this;
    }

    public function getUser(): ?Benutzer
    {
        return $this->user;
    }

    public function setUser(?Benutzer $user): self
    {
        $this->user = $user;

        return $this;
    }
}
