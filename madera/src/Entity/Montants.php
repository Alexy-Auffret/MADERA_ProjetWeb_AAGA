<?php

namespace App\Entity;

use App\Repository\MontantsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MontantsRepository::class)
 */
class Montants
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
    private $libelle_montant;

    /**
     * @ORM\ManyToMany(targetEntity=Modules::class, mappedBy="Montants")
     */
    private $modules;

    /**
     * @ORM\ManyToMany(targetEntity=Composants::class, inversedBy="montants")
     */
    private $Composants;

    public function __construct()
    {
        $this->modules = new ArrayCollection();
        $this->Composants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleMontant(): ?string
    {
        return $this->libelle_montant;
    }

    public function setLibelleMontant(string $libelle_montant): self
    {
        $this->libelle_montant = $libelle_montant;

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
            $module->addMontant($this);
        }

        return $this;
    }

    public function removeModule(Modules $module): self
    {
        if ($this->modules->contains($module)) {
            $this->modules->removeElement($module);
            $module->removeMontant($this);
        }

        return $this;
    }

    /**
     * @return Collection|Composants[]
     */
    public function getComposants(): Collection
    {
        return $this->Composants;
    }

    public function addComposant(Composants $composant): self
    {
        if (!$this->Composants->contains($composant)) {
            $this->Composants[] = $composant;
        }

        return $this;
    }

    public function removeComposant(Composants $composant): self
    {
        if ($this->Composants->contains($composant)) {
            $this->Composants->removeElement($composant);
        }

        return $this;
    }
}
