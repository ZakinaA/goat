<?php

namespace App\Entity;

use App\Repository\InstrumentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InstrumentRepository::class)]
class Instrument
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column(length: 50)]
    private ?string $numero_serie = null;

    #[ORM\OneToMany(mappedBy: 'instrument', targetEntity: ContratPret::class)]
    private Collection $contratPrets;

    public function __construct()
    {
        $this->contratPrets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getNumeroSerie(): ?string
    {
        return $this->numero_serie;
    }

    public function setNumeroSerie(string $numero_serie): self
    {
        $this->numero_serie = $numero_serie;

        return $this;
    }

    /**
     * @return Collection<int, ContratPret>
     */
    public function getContratPrets(): Collection
    {
        return $this->contratPrets;
    }

    public function addContratPret(ContratPret $contratPret): self
    {
        if (!$this->contratPrets->contains($contratPret)) {
            $this->contratPrets->add($contratPret);
            $contratPret->setInstrument($this);
        }

        return $this;
    }

    public function removeContratPret(ContratPret $contratPret): self
    {
        if ($this->contratPrets->removeElement($contratPret)) {
            // set the owning side to null (unless already changed)
            if ($contratPret->getInstrument() === $this) {
                $contratPret->setInstrument(null);
            }
        }

        return $this;
    }
}
