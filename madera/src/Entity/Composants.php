<?php

namespace App\Entity;

use App\Repository\ComposantsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ComposantsRepository::class)
 */
class Composants
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $libelle_composant;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $caracteristique;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $unite_usage;

    /**
     * @ORM\Column(type="integer")
     */
    private $prix_base;

    /**
     * @ORM\ManyToOne(targetEntity=Fournisseurs::class, inversedBy="composant")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fournisseur;

    /**
     * @ORM\ManyToOne(targetEntity=FamilleComposants::class, inversedBy="Composants")
     * @ORM\JoinColumn(nullable=false)
     */
    private $famille;

    /**
     * @ORM\ManyToMany(targetEntity=Sections::class, inversedBy="composants")
     */
    private $Sections;

    /**
     * @ORM\ManyToMany(targetEntity=Montants::class, mappedBy="Composants")
     */
    private $montants;

    public function __construct()
    {
        $this->Sections = new ArrayCollection();
        $this->montants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleComposant(): ?string
    {
        return $this->libelle_composant;
    }

    public function setLibelleComposant(string $libelle_composant): self
    {
        $this->libelle_composant = $libelle_composant;

        return $this;
    }

    public function getCaracteristique(): ?string
    {
        return $this->caracteristique;
    }

    public function setCaracteristique(string $caracteristique): self
    {
        $this->caracteristique = $caracteristique;

        return $this;
    }

    public function getUniteUsage(): ?string
    {
        return $this->unite_usage;
    }

    public function setUniteUsage(string $unite_usage): self
    {
        $this->unite_usage = $unite_usage;

        return $this;
    }

    public function getPrixBase(): ?int
    {
        return $this->prix_base;
    }

    public function setPrixBase(int $prix_base): self
    {
        $this->prix_base = $prix_base;

        return $this;
    }

    public function getFournisseur(): ?Fournisseurs
    {
        return $this->fournisseur;
    }

    public function setFournisseur(?Fournisseurs $fournisseur): self
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    public function getFamille(): ?FamilleComposants
    {
        return $this->famille;
    }

    public function setFamille(?FamilleComposants $famille): self
    {
        $this->famille = $famille;

        return $this;
    }

    /**
     * @return Collection|Sections[]
     */
    public function getSections(): Collection
    {
        return $this->Sections;
    }

    public function addSection(Sections $section): self
    {
        if (!$this->Sections->contains($section)) {
            $this->Sections[] = $section;
        }

        return $this;
    }

    public function removeSection(Sections $section): self
    {
        if ($this->Sections->contains($section)) {
            $this->Sections->removeElement($section);
        }

        return $this;
    }

    /**
     * @return Collection|Montants[]
     */
    public function getMontants(): Collection
    {
        return $this->montants;
    }

    public function addMontant(Montants $montant): self
    {
        if (!$this->montants->contains($montant)) {
            $this->montants[] = $montant;
            $montant->addComposant($this);
        }

        return $this;
    }

    public function removeMontant(Montants $montant): self
    {
        if ($this->montants->contains($montant)) {
            $this->montants->removeElement($montant);
            $montant->removeComposant($this);
        }

        return $this;
    }
}
