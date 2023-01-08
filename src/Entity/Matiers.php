<?php

namespace App\Entity;

use App\Repository\MatiersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ORM\Entity(repositoryClass: MatiersRepository::class)]
#[ApiResource]
class Matiers
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom_matier = null;

    #[ORM\Column]
    private ?int $coeff = null;

    #[ORM\OneToMany(mappedBy: 'matiers', targetEntity: Notes::class)]
    private Collection $eleve;

    #[ORM\OneToMany(mappedBy: 'matier', targetEntity: Notes::class)]
    private Collection $notes;

    public function __construct()
    {
        $this->eleve = new ArrayCollection();
        $this->notes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomMatier(): ?string
    {
        return $this->nom_matier;
    }

    public function setNomMatier(string $nom_matier): self
    {
        $this->nom_matier = $nom_matier;

        return $this;
    }

    public function getCoeff(): ?int
    {
        return $this->coeff;
    }

    public function setCoeff(int $coeff): self
    {
        $this->coeff = $coeff;

        return $this;
    }

    /**
     * @return Collection<int, Notes>
     */
    public function getEleve(): Collection
    {
        return $this->eleve;
    }


    /**
     * @return Collection<int, Notes>
     */
    public function getNotes(): Collection
    {
        return $this->notes;
    }

    public function addNote(Notes $note): self
    {
        if (!$this->notes->contains($note)) {
            $this->notes->add($note);
            $note->setMatier($this);
        }

        return $this;
    }

    public function removeNote(Notes $note): self
    {
        if ($this->notes->removeElement($note)) {
            // set the owning side to null (unless already changed)
            if ($note->getMatier() === $this) {
                $note->setMatier(null);
            }
        }

        return $this;
    }
}
