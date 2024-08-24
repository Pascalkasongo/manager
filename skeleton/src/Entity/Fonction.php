<?php

namespace App\Entity;

use App\Repository\FonctionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FonctionRepository::class)]
class Fonction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_fonction = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomFonction(): ?string
    {
        return $this->nom_fonction;
    }

    public function setNomFonction(string $nom_fonction): static
    {
        $this->nom_fonction = $nom_fonction;

        return $this;
    }
}
