<?php

namespace App\Entity;

use App\Repository\CourRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CourRepository::class)]
class Cour
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

    #[ORM\Column]
    private ?int $id_instrument = null;

    #[ORM\Column]
    private ?int $id_type_cour = null;

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

    public function getIdInstrument(): ?int
    {
        return $this->id_instrument;
    }

    public function setIdInstrument(int $id_instrument): self
    {
        $this->id_instrument = $id_instrument;

        return $this;
    }

    public function getIdTypeCour(): ?int
    {
        return $this->id_type_cour;
    }

    public function setIdTypeCour(int $id_type_cour): self
    {
        $this->id_type_cour = $id_type_cour;

        return $this;
    }
}
