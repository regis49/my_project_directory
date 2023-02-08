<?php

namespace App\Entity;

use App\Repository\AgentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: AgentRepository::class)]
class Agent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 5)]
    #[Assert\NotBlank()]
    #[Assert\Length(max: 5)]
    private ?string $nummat = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank()]
    #[Assert\Length(min: 2, max: 50)]
    private ?string $nameagent = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank()]
    #[Assert\Length(min: 2 , max: 50)]
    private ?string $surnameagent = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Assert\NotNull()]
    #[Assert\Date]
    private ?\DateTimeInterface $birthday = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Assert\NotNull()]
    #[Assert\Date]
    private ?\DateTimeInterface $datepaidsalary = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNummat(): ?string
    {
        return $this->nummat;
    }

    public function setNummat(string $nummat): self
    {
        $this->nummat = $nummat;

        return $this;
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

    public function getDatepaidsalary(): ?\DateTimeInterface
    {
        return $this->datepaidsalary;
    }

    public function setDatepaidsalary(\DateTimeInterface $datepaidsalary): self
    {
        $this->datepaidsalary = $datepaidsalary;

        return $this;
    }
}
