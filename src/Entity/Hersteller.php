<?php

namespace App\Entity;

use App\Repository\HerstellerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HerstellerRepository::class)
 */
class Hersteller
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
    private $Companyname;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompanyname(): ?string
    {
        return $this->Companyname;
    }

    public function setCompanyname(string $Companyname): self
    {
        $this->Companyname = $Companyname;

        return $this;
    }
}
