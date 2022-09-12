<?php

namespace App\Entity;

use App\Repository\KstRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=KstRepository::class)
 */
class Kst
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
    private $kstnummer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $abteilung;

    /**
     * @ORM\OneToMany(targetEntity=Benutzer::class, mappedBy="kst")
     */
    private $benutzer;

    public function __construct()
    {
        $this->benutzer = new ArrayCollection();
    }
    public function __toString()
    {
        return $this->kstnummer . " - " . $this->abteilung;
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKstnummer(): ?string
    {
        return $this->kstnummer;
    }

    public function setKstnummer(string $kstnummer): self
    {
        $this->kstnummer = $kstnummer;

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

    /**
     * @return Collection<int, Benutzer>
     */
    public function getBenutzer(): Collection
    {
        return $this->benutzer;
    }

    public function addBenutzer(Benutzer $benutzer): self
    {
        if (!$this->benutzer->contains($benutzer)) {
            $this->benutzer[] = $benutzer;
            $benutzer->setKst($this);
        }

        return $this;
    }

    public function removeBenutzer(Benutzer $benutzer): self
    {
        if ($this->benutzer->removeElement($benutzer)) {
            // set the owning side to null (unless already changed)
            if ($benutzer->getKst() === $this) {
                $benutzer->setKst(null);
            }
        }

        return $this;
    }
}
