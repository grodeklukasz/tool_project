<?php

namespace App\Entity;

use App\Repository\LocationRepository;
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
}
