<?php

namespace App\Entity;

use App\Repository\HuisserieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HuisserieRepository::class)
 */
class Huisserie
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
    private $libelle_huisserie;

    /**
     * @ORM\ManyToMany(targetEntity=Modules::class, mappedBy="Huisseries")
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
            $module->addHuisseries($this);
        }

        return $this;
    }

    public function removeModule(Modules $module): self
    {
        if ($this->modules->contains($module)) {
            $this->modules->removeElement($module);
            $module->removeHuisseries($this);
        }

        return $this;
    }
}
