<?php

namespace App\Entity;

use App\Repository\FournisseursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FournisseursRepository::class)
 */
class Fournisseurs
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $raison_sociale;

    /**
     * @ORM\Column(type="string", length=12)
     */
    private $num_tel;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $contact_nom_complet;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $mail;

    /**
     * @ORM\OneToOne(targetEntity=Adresses::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $adresse;

    /**
     * @ORM\OneToMany(targetEntity=Composants::class, mappedBy="fournisseur")
     */
    private $composant;

    public function __construct()
    {
        $this->composant = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRaisonSociale(): ?string
    {
        return $this->raison_sociale;
    }

    public function setRaisonSociale(string $raison_sociale): self
    {
        $this->raison_sociale = $raison_sociale;

        return $this;
    }

    public function getNumTel(): ?string
    {
        return $this->num_tel;
    }

    public function setNumTel(string $num_tel): self
    {
        $this->num_tel = $num_tel;

        return $this;
    }

    public function getContactNomComplet(): ?string
    {
        return $this->contact_nom_complet;
    }

    public function setContactNomComplet(string $contact_nom_complet): self
    {
        $this->contact_nom_complet = $contact_nom_complet;

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

    public function getAdresse(): ?Adresses
    {
        return $this->adresse;
    }

    public function setAdresse(Adresses $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * @return Collection|Composants[]
     */
    public function getComposant(): Collection
    {
        return $this->composant;
    }

    public function addComposant(Composants $composant): self
    {
        if (!$this->composant->contains($composant)) {
            $this->composant[] = $composant;
            $composant->setFournisseur($this);
        }

        return $this;
    }

    public function removeComposant(Composants $composant): self
    {
        if ($this->composant->contains($composant)) {
            $this->composant->removeElement($composant);
            // set the owning side to null (unless already changed)
            if ($composant->getFournisseur() === $this) {
                $composant->setFournisseur(null);
            }
        }

        return $this;
    }
}
