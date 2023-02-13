<?php

namespace App\Entity;

use App\Repository\AgentRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: AgentRepository::class)]
class Agent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank()]
    #[Assert\Length(min: 2, max: 50)]
    private ?string $nomagent = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank()]
    #[Assert\Length(min: 2, max: 50)]
    private ?string $prenomagent = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank()]
    private ?string $datenais = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank()]
    private ?string $datepaysalary = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomagent(): ?string
    {
        return $this->nomagent;
    }

    public function setNomagent(string $nomagent): self
    {
        $this->nomagent = $nomagent;

        return $this;
    }

    public function getPrenomagent(): ?string
    {
        return $this->prenomagent;
    }

    public function setPrenomagent(string $prenomagent): self
    {
        $this->prenomagent = $prenomagent;

        return $this;
    }

    public function getDatenais(): ?string
    {
        return $this->datenais;
    }

    public function setDatenais(string $datenais): self
    {
        $this->datenais = $datenais;

        return $this;
    }

    public function getDatepaysalary(): ?string
    {
        return $this->datepaysalary;
    }

    public function setDatepaysalary(string $datepaysalary): self
    {
        $this->datepaysalary = $datepaysalary;

        return $this;
    }
}
