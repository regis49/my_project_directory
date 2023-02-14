<?php

namespace App\Entity;

use App\Repository\LocaliteRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: LocaliteRepository::class)]
class Localite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank()]
    #[Assert\Length(min: 5, max: 50)]
    private ?string $libloca = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibloca(): ?string
    {
        return $this->libloca;
    }

    public function setLibloca(string $libloca): self
    {
        $this->libloca = $libloca;

        return $this;
    }
}
