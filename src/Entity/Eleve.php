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

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column(length: 50)]
    private ?string $prenom = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_naiss = null;

    #[ORM\ManyToOne(inversedBy: 'cours')]
    private ?Cours $cours = null;

    #[ORM\Column]
    private ?int $numRue = null;

    #[ORM\Column(length: 50)]
    private ?string $rue = null;

    #[ORM\Column(length: 50)]
    private ?string $ville = null;

    #[ORM\Column(length: 50)]
    private ?string $tel = null;

    #[ORM\Column(length: 50)]
    private ?string $mail = null;

    #[ORM\ManyToOne(inversedBy: 'eleves')]
    private ?Responsable $responsable = null;

    #[ORM\OneToMany(mappedBy: 'Eleve', targetEntity: Inscription::class)]
    private Collection $inscriptions;

    #[ORM\OneToMany(mappedBy: 'eleve', targetEntity: ContratPret::class)]
    private Collection $contratPrets;

    #[ORM\ManyToOne(inversedBy: 'eleves')]
    private ?ContratPret $ContratPret = null;

    #[ORM\OneToMany(mappedBy: 'eleve', targetEntity: User::class)]
    private Collection $users;

    public function __construct()
    {
        $this->inscriptions = new ArrayCollection();
        $this->contratPrets = new ArrayCollection();
        $this->users = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateNaiss(): ?\DateTimeInterface
    {
        return $this->date_naiss;
    }

    public function setDateNaiss(\DateTimeInterface $date_naiss): self
    {
        $this->date_naiss = $date_naiss;

        return $this;
    }

    public function getCours(): ?Cours
    {
        return $this->cours;
    }

    public function setCours(?Cours $cours): self
    {
        $this->cours = $cours;

        return $this;
    }

    public function getNumRue(): ?int
    {
        return $this->numRue;
    }

    public function setNumRue(int $numRue): self
    {
        $this->numRue = $numRue;

        return $this;
    }

    public function getRue(): ?string
    {
        return $this->rue;
    }

    public function setRue(string $rue): self
    {
        $this->rue = $rue;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
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
     * @return Collection<int, Inscription>
     */
    public function getInscriptions(): Collection
    {
        return $this->inscriptions;
    }

    public function addInscription(Inscription $inscription): self
    {
        if (!$this->inscriptions->contains($inscription)) {
            $this->inscriptions->add($inscription);
            $inscription->setEleve($this);
        }

        return $this;
    }

    public function removeInscription(Inscription $inscription): self
    {
        if ($this->inscriptions->removeElement($inscription)) {
            // set the owning side to null (unless already changed)
            if ($inscription->getEleve() === $this) {
                $inscription->setEleve(null);
            }
        }

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
            $contratPret->setEleve($this);
        }

        return $this;
    }

    public function removeContratPret(ContratPret $contratPret): self
    {
        if ($this->contratPrets->removeElement($contratPret)) {
            // set the owning side to null (unless already changed)
            if ($contratPret->getEleve() === $this) {
                $contratPret->setEleve(null);
            }
        }

        return $this;
    }

    public function getContratPret(): ?ContratPret
    {
        return $this->ContratPret;
    }

    public function setContratPret(?ContratPret $ContratPret): self
    {
        $this->ContratPret = $ContratPret;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->setEleve($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getEleve() === $this) {
                $user->setEleve(null);
            }
        }

        return $this;
    }
}
