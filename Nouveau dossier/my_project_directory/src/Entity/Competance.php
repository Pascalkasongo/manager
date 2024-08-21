<?php

namespace App\Entity;

use App\Repository\CompetanceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompetanceRepository::class)]
class Competance
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_competance = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCompetance(): ?string
    {
        return $this->nom_competance;
    }

    public function setNomCompetance(string $nom_competance): static
    {
        $this->nom_competance = $nom_competance;

        return $this;
    }
}
