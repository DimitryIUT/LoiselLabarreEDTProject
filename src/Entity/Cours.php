<?php

namespace App\Entity;

use App\Repository\CoursRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CoursRepository::class)]
class Cours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime')]
    private $dateHeureDebut;

    #[ORM\Column(type: 'datetime')]
    private $dateHeureFin;

    #[ORM\Column(type: 'string', length: 255)]
    private $type;

    #[ORM\ManyToOne(targetEntity: Matiere::class, inversedBy: 'cours')]
    #[ORM\JoinColumn(nullable: false)]
    private $Matiere;

    #[ORM\ManyToOne(targetEntity: Professeur::class, inversedBy: 'cours')]
    #[ORM\JoinColumn(nullable: false)]
    private $Professeur;

    #[ORM\ManyToOne(targetEntity: Salle::class, inversedBy: 'cours')]
    #[ORM\JoinColumn(nullable: false)]
    private $Salle;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateHeureDebut(): ?\DateTimeInterface
    {
        return $this->dateHeureDebut;
    }

    public function setDateHeureDebut(\DateTimeInterface $dateHeureDebut): self
    {
        $this->dateHeureDebut = $dateHeureDebut;

        return $this;
    }

    public function getDateHeureFin(): ?\DateTimeInterface
    {
        return $this->dateHeureFin;
    }

    public function setDateHeureFin(\DateTimeInterface $dateHeureFin): self
    {
        $this->dateHeureFin = $dateHeureFin;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getMatiere(): ?Matiere
    {
        return $this->Matiere;
    }

    public function setMatiere(?Matiere $Matiere): self
    {
        $this->Matiere = $Matiere;

        return $this;
    }

    public function getProfesseur(): ?Professeur
    {
        return $this->Professeur;
    }

    public function setProfesseur(?Professeur $Professeur): self
    {
        $this->Professeur = $Professeur;

        return $this;
    }

    public function getSalle(): ?Salle
    {
        return $this->Salle;
    }

    public function setSalle(?Salle $Salle): self
    {
        $this->Salle = $Salle;

        return $this;
    }
}
