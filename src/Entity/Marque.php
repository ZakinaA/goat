<?php

namespace App\Entity;

use App\Repository\MarqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MarqueRepository::class)]
class Marque
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $libelle = null;

    #[ORM\OneToMany(mappedBy: 'marque', targetEntity: Instrument::class)]
    private Collection $intruments;

    public function __construct()
    {
        $this->intruments = new ArrayCollection();
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

    /**
     * @return Collection<int, Instrument>
     */
    public function getIntruments(): Collection
    {
        return $this->intruments;
    }

    public function addIntrument(Instrument $intrument): self
    {
        if (!$this->intruments->contains($intrument)) {
            $this->intruments->add($intrument);
            $intrument->setMarque($this);
        }

        return $this;
    }

    public function removeIntrument(Instrument $intrument): self
    {
        if ($this->intruments->removeElement($intrument)) {
            // set the owning side to null (unless already changed)
            if ($intrument->getMarque() === $this) {
                $intrument->setMarque(null);
            }
        }

        return $this;
    }
}
