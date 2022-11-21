<?php

namespace App\Entity;

use App\Repository\ContratPretRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContratPretRepository::class)]
class ContratPret
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateDebut = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateFin = null;

    #[ORM\Column(length: 50)]
    private ?string $attestationAssurance = null;

    #[ORM\Column(length: 50)]
    private ?string $etatDetailleDebut = null;

    #[ORM\Column(length: 50)]
    private ?string $etatDetailleFin = null;

    #[ORM\ManyToOne(inversedBy: 'contratPrets')]
    private ?instrument $instrument = null;

    #[ORM\ManyToOne(inversedBy: 'contratPrets')]
    private ?eleve $eleve = null;

    #[ORM\OneToMany(mappedBy: 'ContratPret', targetEntity: Eleve::class)]
    private Collection $eleves;

    public function __construct()
    {
        $this->eleves = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getAttestationAssurance(): ?string
    {
        return $this->attestationAssurance;
    }

    public function setAttestationAssurance(string $attestationAssurance): self
    {
        $this->attestationAssurance = $attestationAssurance;

        return $this;
    }

    public function getEtatDetailleDebut(): ?string
    {
        return $this->etatDetailleDebut;
    }

    public function setEtatDetailleDebut(string $etatDetailleDebut): self
    {
        $this->etatDetailleDebut = $etatDetailleDebut;

        return $this;
    }

    public function getEtatDetailleFin(): ?string
    {
        return $this->etatDetailleFin;
    }

    public function setEtatDetailleFin(string $etatDetailleFin): self
    {
        $this->etatDetailleFin = $etatDetailleFin;

        return $this;
    }

    public function getInstrument(): ?instrument
    {
        return $this->instrument;
    }

    public function setInstrument(?instrument $instrument): self
    {
        $this->instrument = $instrument;

        return $this;
    }

    public function getEleve(): ?eleve
    {
        return $this->eleve;
    }

    public function setEleve(?eleve $eleve): self
    {
        $this->eleve = $eleve;

        return $this;
    }

    /**
     * @return Collection<int, Eleve>
     */
    public function getEleves(): Collection
    {
        return $this->eleves;
    }

    public function addElefe(Eleve $elefe): self
    {
        if (!$this->eleves->contains($elefe)) {
            $this->eleves->add($elefe);
            $elefe->setContratPret($this);
        }

        return $this;
    }

    public function removeElefe(Eleve $elefe): self
    {
        if ($this->eleves->removeElement($elefe)) {
            // set the owning side to null (unless already changed)
            if ($elefe->getContratPret() === $this) {
                $elefe->setContratPret(null);
            }
        }

        return $this;
    }
}
