<?php

namespace App\Entity;

use App\Repository\SectionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SectionsRepository::class)
 */
class Sections
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
    private $libelle_section;

    /**
     * @ORM\ManyToMany(targetEntity=Composants::class, mappedBy="Sections")
     */
    private $composants;

    /**
     * @ORM\ManyToMany(targetEntity=Modules::class, mappedBy="Sections")
     */
    private $modules;

    public function __construct()
    {
        $this->composants = new ArrayCollection();
        $this->modules = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleSection(): ?string
    {
        return $this->libelle_section;
    }

    public function setLibelleSection(string $libelle_section): self
    {
        $this->libelle_section = $libelle_section;

        return $this;
    }

    /**
     * @return Collection|Composants[]
     */
    public function getComposants(): Collection
    {
        return $this->composants;
    }

    public function addComposant(Composants $composant): self
    {
        if (!$this->composants->contains($composant)) {
            $this->composants[] = $composant;
            $composant->addSection($this);
        }

        return $this;
    }

    public function removeComposant(Composants $composant): self
    {
        if ($this->composants->contains($composant)) {
            $this->composants->removeElement($composant);
            $composant->removeSection($this);
        }

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
            $module->addSection($this);
        }

        return $this;
    }

    public function removeModule(Modules $module): self
    {
        if ($this->modules->contains($module)) {
            $this->modules->removeElement($module);
            $module->removeSection($this);
        }

        return $this;
    }
}
