<?php

namespace App\Entity;

use App\Repository\ModulesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ModulesRepository::class)
 */
class Modules
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $libelle_module;

    /**
     * @ORM\Column(type="integer")
     */
    private $hauteur_module;

    /**
     * @ORM\Column(type="integer")
     */
    private $longueur_module;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $plan_coupe;

    /**
     * @ORM\Column(type="integer")
     */
    private $parametre_prix;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $cctp;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_modele;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $Remplissage;

    /**
     * @ORM\ManyToMany(targetEntity=Sections::class, inversedBy="modules")
     */
    private $Sections;

    /**
     * @ORM\ManyToMany(targetEntity=Montants::class, inversedBy="modules")
     */
    private $Montants;

    /**
     * @ORM\ManyToMany(targetEntity=Huisserie::class, inversedBy="modules")
     */
    private $Huisseries;

    /**
     * @ORM\ManyToOne(targetEntity=Gammes::class, inversedBy="modules")
     */
    private $Gammes;

    public function __construct()
    {
        $this->Sections = new ArrayCollection();
        $this->Montants = new ArrayCollection();
        $this->Huisseries = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleModule(): ?string
    {
        return $this->libelle_module;
    }

    public function setLibelleModule(string $libelle_module): self
    {
        $this->libelle_module = $libelle_module;

        return $this;
    }

    public function getHauteurModule(): ?int
    {
        return $this->hauteur_module;
    }

    public function setHauteurModule(int $hauteur_module): self
    {
        $this->hauteur_module = $hauteur_module;

        return $this;
    }

    public function getLongueurModule(): ?int
    {
        return $this->longueur_module;
    }

    public function setLongueurModule(int $longueur_module): self
    {
        $this->longueur_module = $longueur_module;

        return $this;
    }

    public function getPlanCoupe(): ?string
    {
        return $this->plan_coupe;
    }

    public function setPlanCoupe(string $plan_coupe): self
    {
        $this->plan_coupe = $plan_coupe;

        return $this;
    }

    public function getParametrePrix(): ?int
    {
        return $this->parametre_prix;
    }

    public function setParametrePrix(int $parametre_prix): self
    {
        $this->parametre_prix = $parametre_prix;

        return $this;
    }

    public function getCctp(): ?string
    {
        return $this->cctp;
    }

    public function setCctp(string $cctp): self
    {
        $this->cctp = $cctp;

        return $this;
    }

    public function getIsModele(): ?bool
    {
        return $this->is_modele;
    }

    public function setIsModele(bool $is_modele): self
    {
        $this->is_modele = $is_modele;

        return $this;
    }

    public function getRemplissage(): ?string
    {
        return $this->Remplissage;
    }

    public function setRemplissage(string $Remplissage): self
    {
        $this->Remplissage = $Remplissage;

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
        return $this->Montants;
    }

    public function addMontant(Montants $montant): self
    {
        if (!$this->Montants->contains($montant)) {
            $this->Montants[] = $montant;
        }

        return $this;
    }

    public function removeMontant(Montants $montant): self
    {
        if ($this->Montants->contains($montant)) {
            $this->Montants->removeElement($montant);
        }

        return $this;
    }

    /**
     * @return Collection|Huisserie[]
     */
    public function getHuisseries(): Collection
    {
        return $this->Huisseries;
    }

    public function addHuisseries(Huisserie $huisseries): self
    {
        if (!$this->Huisseries->contains($huisseries)) {
            $this->Huisseries[] = $huisseries;
        }

        return $this;
    }

    public function removeHuisseries(Huisserie $huisseries): self
    {
        if ($this->Huisseries->contains($huisseries)) {
            $this->Huisseries->removeElement($huisseries);
        }

        return $this;
    }

    public function getGammes(): ?Gammes
    {
        return $this->Gammes;
    }

    public function setGammes(?Gammes $Gammes): self
    {
        $this->Gammes = $Gammes;

        return $this;
    }
}
