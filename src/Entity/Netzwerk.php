<?php

namespace App\Entity;

use App\Repository\NetzwerkRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NetzwerkRepository::class)
 */
class Netzwerk
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
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $seriennummer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity=Hersteller::class, inversedBy="netzwerks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $hersteller;

    /**
     * @ORM\ManyToOne(targetEntity=Location::class, inversedBy="netzwerks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $location;

    /**
     * @ORM\ManyToOne(targetEntity=Benutzer::class, inversedBy="netzwerks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mac_addr;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ip_addr;

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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

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

    public function getHersteller(): ?Hersteller
    {
        return $this->hersteller;
    }

    public function setHersteller(?Hersteller $hersteller): self
    {
        $this->hersteller = $hersteller;

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

    public function getUser(): ?Benutzer
    {
        return $this->user;
    }

    public function setUser(?Benutzer $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getMacAddr(): ?string
    {
        return $this->mac_addr;
    }

    public function setMacAddr(string $mac_addr): self
    {
        $this->mac_addr = $mac_addr;

        return $this;
    }

    public function getIpAddr(): ?string
    {
        return $this->ip_addr;
    }

    public function setIpAddr(?string $ip_addr): self
    {
        $this->ip_addr = $ip_addr;

        return $this;
    }
}
