<?php

namespace App\Entity;

use App\Repository\EleveRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EleveRepository::class)]
class Eleve
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'eleves')]
    private ?Responsable $responsable = null;

    #[ORM\ManyToMany(targetEntity: Cours::class, inversedBy: 'eleves')]
    private Collection $Cours;

    #[ORM\OneToMany(mappedBy: 'eleve', targetEntity: ContratPret::class)]
    private Collection $Contrats;

    #[ORM\OneToOne(inversedBy: 'eleve', cascade: ['persist', 'remove'])]
    private ?User $user = null;

    public function __construct()
    {
        $this->Cours = new ArrayCollection();
        $this->Contrats = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getResponsable(): ?Responsable
    {
        return $this->responsable;
    }

    public function setResponsable(?Responsable $responsable): self
    {
        $this->responsable = $responsable;

        return $this;
    }
    /**
     * @return Collection<int, Cours>
     */
    public function getCours(): Collection
    {
        return $this->Cours;
    }

    public function addCour(Cours $cour): self
    {
        if (!$this->Cours->contains($cour)) {
            $this->Cours->add($cour);
        }

        return $this;
    }

    public function removeCour(Cours $cour): self
    {
        $this->Cours->removeElement($cour);

        return $this;
    }

    /**
     * @return Collection<int, ContratPret>
     */
    public function getContrats(): Collection
    {
        return $this->Contrats;
    }

    public function addContrat(ContratPret $contrat): self
    {
        if (!$this->Contrats->contains($contrat)) {
            $this->Contrats->add($contrat);
            $contrat->setEleve($this);
        }

        return $this;
    }

    public function removeContrat(ContratPret $contrat): self
    {
        if ($this->Contrats->removeElement($contrat)) {
            // set the owning side to null (unless already changed)
            if ($contrat->getEleve() === $this) {
                $contrat->setEleve(null);
            }
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
