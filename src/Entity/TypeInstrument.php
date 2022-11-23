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

    #[ORM\ManyToMany(targetEntity: instrument::class, inversedBy: 'typeInstruments')]
    private Collection $instrument;

    public function __construct()
    {
        $this->instrument = new ArrayCollection();
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
     * @return Collection<int, instrument>
     */
    public function getInstrument(): Collection
    {
        return $this->instrument;
    }

    public function addInstrument(instrument $instrument): self
    {
        if (!$this->instrument->contains($instrument)) {
            $this->instrument->add($instrument);
        }

        return $this;
    }

    public function removeInstrument(instrument $instrument): self
    {
        $this->instrument->removeElement($instrument);

        return $this;
    }
}
