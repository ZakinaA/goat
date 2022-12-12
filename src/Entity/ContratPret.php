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

    #[ORM\ManyToOne(inversedBy: 'contratPretsUser')]
    private ?user $user = null;

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

    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(?user $user): self
    {
        $this->user = $user;

        return $this;
    }

}