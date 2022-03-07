<?php

namespace App\Entity;

use App\Repository\CoursRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use App\Validator\DateHeureCours;

#[ORM\Entity(repositoryClass: CoursRepository::class)]
#[DateHeureCours()]
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
    #[Assert\NotNull]
    private $matiere;

    #[ORM\ManyToOne(targetEntity: Professeur::class, inversedBy: 'cours')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotNull]
    private $professeur;

    #[ORM\ManyToOne(targetEntity: Salle::class, inversedBy: 'cours')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotNull]
    private $salle;

    public function __toString()
    {
        return sprintf('%s-%s : %s - %s', date_format($this->dateHeureDebut, "H:i:s"), date_format($this->dateHeureFin, "H:i:s"), $this->getMatiere(), $this->getProfesseur());
    }

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
        return $this->matiere;
    }

    public function setMatiere(?Matiere $Matiere): self
    {
        $this->matiere = $Matiere;

        return $this;
    }

    public function getProfesseur(): ?Professeur
    {
        return $this->professeur;
    }

    public function setProfesseur(?Professeur $Professeur): self
    {
        $this->professeur = $Professeur;

        return $this;
    }

    public function getSalle(): ?Salle
    {
        return $this->salle;
    }

    public function setSalle(?Salle $Salle): self
    {
        $this->salle = $Salle;

        return $this;
    }
}
