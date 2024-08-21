<?php

namespace App\Entity;

use App\Repository\DomaineRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DomaineRepository::class)]
class Domaine
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_domaine = null;

    #[ORM\Column(length: 255)]
    private ?string $type_domaine = null;

    #[ORM\OneToMany(mappedBy: 'domaine', targetEntity: Projet::class)]
    private Collection $projets;

    public function __construct()
    {
        $this->projets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomDomaine(): ?string
    {
        return $this->nom_domaine;
    }

    public function setNomDomaine(string $nom_domaine): static
    {
        $this->nom_domaine = $nom_domaine;

        return $this;
    }

    public function getTypeDomaine(): ?string
    {
        return $this->type_domaine;
    }

    public function setTypeDomaine(string $type_domaine): static
    {
        $this->type_domaine = $type_domaine;

        return $this;
    }

    /**
     * @return Collection<int, Projet>
     */
    public function getProjets(): Collection
    {
        return $this->projets;
    }

    public function addProjet(Projet $projet): static
    {
        if (!$this->projets->contains($projet)) {
            $this->projets->add($projet);
            $projet->setDomaine($this);
        }

        return $this;
    }

    public function removeProjet(Projet $projet): static
    {
        if ($this->projets->removeElement($projet)) {
            // set the owning side to null (unless already changed)
            if ($projet->getDomaine() === $this) {
                $projet->setDomaine(null);
            }
        }

        return $this;
    }
}
