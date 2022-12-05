<?php

namespace App\Entity;

use App\Repository\ProfesseurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfesseurRepository::class)]
class Professeur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'professeur', targetEntity: User::class)]
    private Collection $users;

    #[ORM\OneToMany(mappedBy: 'professeur', targetEntity: User::class)]
    private Collection $usersProf;

    #[ORM\ManyToOne(inversedBy: 'professeurs')]
    private ?user $user = null;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->usersProf = new ArrayCollection();
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

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

    public function getCodePostal(): ?string
    {
        return $this->code_postal;
    }

    public function setCodePostal(string $code_postal): self
    {
        $this->code_postal = $code_postal;

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
            $user->setProfesseur($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getProfesseur() === $this) {
                $user->setProfesseur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsersProf(): Collection
    {
        return $this->usersProf;
    }

    public function addUsersProf(User $usersProf): self
    {
        if (!$this->usersProf->contains($usersProf)) {
            $this->usersProf->add($usersProf);
            $usersProf->setProfesseur($this);
        }

        return $this;
    }

    public function removeUsersProf(User $usersProf): self
    {
        if ($this->usersProf->removeElement($usersProf)) {
            // set the owning side to null (unless already changed)
            if ($usersProf->getProfesseur() === $this) {
                $usersProf->setProfesseur(null);
            }
        }

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
