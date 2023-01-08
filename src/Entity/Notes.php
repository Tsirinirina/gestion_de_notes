<?php

namespace App\Entity;

use App\Repository\NotesRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ORM\Entity(repositoryClass: NotesRepository::class)]
#[ApiResource]
class Notes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'notes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Matiers $matier = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Eleves $eleve = null;

    #[ORM\Column]
    private ?int $semestre = null;

    #[ORM\Column]
    private ?float $note = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatier(): ?Matiers
    {
        return $this->matier;
    }

    public function setMatier(?Matiers $matier): self
    {
        $this->matier = $matier;

        return $this;
    }

    public function getEleve(): ?Eleves
    {
        return $this->eleve;
    }

    public function setEleve(?Eleves $eleve): self
    {
        $this->eleve = $eleve;

        return $this;
    }

    public function getSemestre(): ?int
    {
        return $this->semestre;
    }

    public function setSemestre(int $semestre): self
    {
        $this->semestre = $semestre;

        return $this;
    }

    public function getNote(): ?float
    {
        return $this->note;
    }

    public function setNote(float $note): self
    {
        $this->note = $note;

        return $this;
    }
}
