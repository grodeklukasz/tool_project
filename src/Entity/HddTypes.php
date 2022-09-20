<?php

namespace App\Entity;

use App\Repository\HddTypesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HddTypesRepository::class)
 */
class HddTypes
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
    private $TypeName;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeName(): ?string
    {
        return $this->TypeName;
    }

    public function setTypeName(string $TypeName): self
    {
        $this->TypeName = $TypeName;

        return $this;
    }
}
