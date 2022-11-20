<?php

namespace App\Entity;

use App\Repository\CoursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CoursRepository::class)]
class Cours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $libelle = null;

    #[ORM\Column]
    private ?int $agemini = null;

    #[ORM\Column]
    private ?int $agemaxi = null;

    #[ORM\Column]
    private ?int $nbplaces = null;

    #[ORM\OneToMany(mappedBy: 'cours', targetEntity: Eleve::class)]
    private Collection $cours;

    public function __construct()
    {
        $this->cours = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getAgemini(): ?int
    {
        return $this->agemini;
    }

    public function setAgemini(int $agemini): self
    {
        $this->agemini = $agemini;

        return $this;
    }

    public function getAgemaxi(): ?int
    {
        return $this->agemaxi;
    }

    public function setAgemaxi(int $agemaxi): self
    {
        $this->agemaxi = $agemaxi;

        return $this;
    }

    public function getNbplaces(): ?int
    {
        return $this->nbplaces;
    }

    public function setNbplaces(int $nbplaces): self
    {
        $this->nbplaces = $nbplaces;

        return $this;
    }

    /**
     * @return Collection<int, Eleve>
     */
    public function getCours(): Collection
    {
        return $this->cours;
    }

    public function addCour(Eleve $cour): self
    {
        if (!$this->cours->contains($cour)) {
            $this->cours->add($cour);
            $cour->setCours($this);
        }

        return $this;
    }

    public function removeCour(Eleve $cour): self
    {
        if ($this->cours->removeElement($cour)) {
            // set the owning side to null (unless already changed)
            if ($cour->getCours() === $this) {
                $cour->setCours(null);
            }
        }

        return $this;
    }
}
