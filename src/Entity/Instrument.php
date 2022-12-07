<?php

namespace App\Entity;

use App\Repository\InstrumentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
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

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateAchat = null;

    #[ORM\Column]
    private ?int $prixAchat = null;

    #[ORM\Column(length: 50)]
    private ?string $utilisation = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cheminImage = null;

    #[ORM\OneToMany(mappedBy: 'instrument', targetEntity: accessoire::class)]
    private Collection $accessoire;

    #[ORM\ManyToOne(inversedBy: 'intruments')]
    private ?marque $marque = null;

    #[ORM\ManyToMany(targetEntity: couleur::class, inversedBy: 'instruments')]
    private Collection $couleur;

    #[ORM\ManyToOne(inversedBy: 'instruments')]
    private ?TypeInstrument $typeInstrument = null;

    

    public function __construct()
    {
        $this->accessoire = new ArrayCollection();
        $this->couleur = new ArrayCollection();
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

    public function getDateAchat(): ?\DateTimeInterface
    {
        return $this->dateAchat;
    }

    public function setDateAchat(\DateTimeInterface $dateAchat): self
    {
        $this->dateAchat = $dateAchat;

        return $this;
    }

    public function getPrixAchat(): ?int
    {
        return $this->prixAchat;
    }

    public function setPrixAchat(int $prixAchat): self
    {
        $this->prixAchat = $prixAchat;

        return $this;
    }

    public function getUtilisation(): ?string
    {
        return $this->utilisation;
    }

    public function setUtilisation(string $utilisation): self
    {
        $this->utilisation = $utilisation;

        return $this;
    }

    public function getCheminImage(): ?string
    {
        return $this->cheminImage;
    }

    public function setCheminImage(?string $cheminImage): self
    {
        $this->cheminImage = $cheminImage;

        return $this;
    }

    /**
     * @return Collection<int, accessoire>
     */
    public function getAccessoire(): Collection
    {
        return $this->accessoire;
    }

    public function addAccessoire(accessoire $accessoire): self
    {
        if (!$this->accessoire->contains($accessoire)) {
            $this->accessoire->add($accessoire);
            $accessoire->setInstrument($this);
        }

        return $this;
    }

    public function removeAccessoire(accessoire $accessoire): self
    {
        if ($this->accessoire->removeElement($accessoire)) {
            // set the owning side to null (unless already changed)
            if ($accessoire->getInstrument() === $this) {
                $accessoire->setInstrument(null);
            }
        }

        return $this;
    }

    public function getMarque(): ?marque
    {
        return $this->marque;
    }

    public function setMarque(?marque $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * @return Collection<int, couleur>
     */
    public function getCouleur(): Collection
    {
        return $this->couleur;
    }

    public function addCouleur(couleur $couleur): self
    {
        if (!$this->couleur->contains($couleur)) {
            $this->couleur->add($couleur);
        }

        return $this;
    }

    public function removeCouleur(couleur $couleur): self
    {
        $this->couleur->removeElement($couleur);

        return $this;
    }

    public function getTypeInstrument(): ?TypeInstrument
    {
        return $this->typeInstrument;
    }

    public function setTypeInstrument(?TypeInstrument $typeInstrument): self
    {
        $this->typeInstrument = $typeInstrument;

        return $this;
    }


}
