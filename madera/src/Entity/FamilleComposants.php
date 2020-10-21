<?php

namespace App\Entity;

use App\Repository\FamilleComposantsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FamilleComposantsRepository::class)
 */
class FamilleComposants
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
    private $libelle_famille_composants;

    /**
     * @ORM\OneToMany(targetEntity=Composants::class, mappedBy="famille")
     */
    private $Composants;

    public function __construct()
    {
        $this->Composants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleFamilleComposants(): ?string
    {
        return $this->libelle_famille_composants;
    }

    public function setLibelleFamilleComposants(string $libelle_famille_composants): self
    {
        $this->libelle_famille_composants = $libelle_famille_composants;

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
            $composant->setFamille($this);
        }

        return $this;
    }

    public function removeComposant(Composants $composant): self
    {
        if ($this->Composants->contains($composant)) {
            $this->Composants->removeElement($composant);
            // set the owning side to null (unless already changed)
            if ($composant->getFamille() === $this) {
                $composant->setFamille(null);
            }
        }

        return $this;
    }
}
