<?php

namespace App\Entity;

use App\Repository\BenutzerRepository;
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
}
