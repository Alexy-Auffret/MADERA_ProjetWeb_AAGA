<?php

namespace App\Entity;

use App\Repository\GammesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GammesRepository::class)
 */
class Gammes
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
    private $libelle_gamme;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $finition_exterieur;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $type_isolant;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $type_couverture;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $qualite_huisserie;

    /**
     * @ORM\OneToMany(targetEntity=Modules::class, mappedBy="Gammes")
     */
    private $modules;

    public function __construct()
    {
        $this->modules = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleGamme(): ?string
    {
        return $this->libelle_gamme;
    }

    public function setLibelleGamme(string $libelle_gamme): self
    {
        $this->libelle_gamme = $libelle_gamme;

        return $this;
    }

    public function getFinitionExterieur(): ?string
    {
        return $this->finition_exterieur;
    }

    public function setFinitionExterieur(string $finition_exterieur): self
    {
        $this->finition_exterieur = $finition_exterieur;

        return $this;
    }

    public function getTypeIsolant(): ?string
    {
        return $this->type_isolant;
    }

    public function setTypeIsolant(string $type_isolant): self
    {
        $this->type_isolant = $type_isolant;

        return $this;
    }

    public function getTypeCouverture(): ?string
    {
        return $this->type_couverture;
    }

    public function setTypeCouverture(string $type_couverture): self
    {
        $this->type_couverture = $type_couverture;

        return $this;
    }

    public function getQualiteHuisserie(): ?string
    {
        return $this->qualite_huisserie;
    }

    public function setQualiteHuisserie(string $qualite_huisserie): self
    {
        $this->qualite_huisserie = $qualite_huisserie;

        return $this;
    }

    /**
     * @return Collection|Modules[]
     */
    public function getModules(): Collection
    {
        return $this->modules;
    }

    public function addModule(Modules $module): self
    {
        if (!$this->modules->contains($module)) {
            $this->modules[] = $module;
            $module->setGammes($this);
        }

        return $this;
    }

    public function removeModule(Modules $module): self
    {
        if ($this->modules->contains($module)) {
            $this->modules->removeElement($module);
            // set the owning side to null (unless already changed)
            if ($module->getGammes() === $this) {
                $module->setGammes(null);
            }
        }

        return $this;
    }
}
