<?php

namespace App\Entity;

use App\Repository\RessourceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RessourceRepository::class)]
class Ressource
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_ressource = null;

    #[ORM\Column]
    private ?int $qty_ressource = null;

    #[ORM\Column]
    private ?int $cout_ressource = null;

    #[ORM\OneToMany(mappedBy: 'ressource', targetEntity: Tache::class)]
    private Collection $taches;

    public function __construct()
    {
        $this->taches = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomRessource(): ?string
    {
        return $this->nom_ressource;
    }

    public function setNomRessource(string $nom_ressource): static
    {
        $this->nom_ressource = $nom_ressource;

        return $this;
    }

    public function getQtyRessource(): ?int
    {
        return $this->qty_ressource;
    }

    public function setQtyRessource(int $qty_ressource): static
    {
        $this->qty_ressource = $qty_ressource;

        return $this;
    }

    public function getCoutRessource(): ?int
    {
        return $this->cout_ressource;
    }

    public function setCoutRessource(int $cout_ressource): static
    {
        $this->cout_ressource = $cout_ressource;

        return $this;
    }

    /**
     * @return Collection<int, Tache>
     */
    public function getTaches(): Collection
    {
        return $this->taches;
    }

    public function addTach(Tache $tach): static
    {
        if (!$this->taches->contains($tach)) {
            $this->taches->add($tach);
            $tach->setRessource($this);
        }

        return $this;
    }

    public function removeTach(Tache $tach): static
    {
        if ($this->taches->removeElement($tach)) {
            // set the owning side to null (unless already changed)
            if ($tach->getRessource() === $this) {
                $tach->setRessource(null);
            }
        }

        return $this;
    }
}
