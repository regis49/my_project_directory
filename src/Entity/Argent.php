<?php

namespace App\Entity;

use App\Repository\ArgentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ArgentRepository::class)]
class Argent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank()]
    #[Assert\Length(min: 2, max: 50)]
    private ?string $nameagent = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank()]
    #[Assert\Length(min: 2, max: 50)]
    private ?string $surnameagent = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Assert\Date]
    private ?\DateTimeInterface $birthday = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Assert\Date]
    private ?\DateTimeInterface $datepaysalary = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameagent(): ?string
    {
        return $this->nameagent;
    }

    public function setNameagent(string $nameagent): self
    {
        $this->nameagent = $nameagent;

        return $this;
    }

    public function getSurnameagent(): ?string
    {
        return $this->surnameagent;
    }

    public function setSurnameagent(string $surnameagent): self
    {
        $this->surnameagent = $surnameagent;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getDatepaysalary(): ?\DateTimeInterface
    {
        return $this->datepaysalary;
    }

    public function setDatepaysalary(\DateTimeInterface $datepaysalary): self
    {
        $this->datepaysalary = $datepaysalary;

        return $this;
    }
}
