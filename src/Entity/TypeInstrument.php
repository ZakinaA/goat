<?php

namespace App\Entity;

use App\Repository\TypeInstrumentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeInstrumentRepository::class)]
class TypeInstrument
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $libelle = null;

    #[ORM\OneToMany(mappedBy: 'typeInstrument', targetEntity: Instrument::class)]
    private Collection $instruments;

    #[ORM\OneToMany(mappedBy: 'typeInstrument', targetEntity: Instrument::class)]
    private Collection $instrumentsType;


    public function __construct()
    {
        $this->instruments = new ArrayCollection();
        $this->instrumentsType = new ArrayCollection();
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
    public function getInstruments(): Collection
    {
        return $this->instruments;
    }

    public function addInstrument(Instrument $instrument): self
    {
        if (!$this->instruments->contains($instrument)) {
            $this->instruments->add($instrument);
            $instrument->setTypeInstrument($this);
        }

        return $this;
    }

    public function removeInstrument(Instrument $instrument): self
    {
        if ($this->instruments->removeElement($instrument)) {
            // set the owning side to null (unless already changed)
            if ($instrument->getTypeInstrument() === $this) {
                $instrument->setTypeInstrument(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Instrument>
     */
    public function getInstrumentsType(): Collection
    {
        return $this->instrumentsType;
    }

    public function addInstrumentsType(Instrument $instrumentsType): self
    {
        if (!$this->instrumentsType->contains($instrumentsType)) {
            $this->instrumentsType->add($instrumentsType);
            $instrumentsType->setTypeInstrument($this);
        }

        return $this;
    }

    public function removeInstrumentsType(Instrument $instrumentsType): self
    {
        if ($this->instrumentsType->removeElement($instrumentsType)) {
            // set the owning side to null (unless already changed)
            if ($instrumentsType->getTypeInstrument() === $this) {
                $instrumentsType->setTypeInstrument(null);
            }
        }

        return $this;
    }



}
