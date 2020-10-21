<?php

namespace App\Entity;

use App\Repository\UtilisateursRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UtilisateursRepository::class)
 */
class Utilisateurs
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
    private $nom_utilisateur;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $prenom_utilisateur;

    /**
     * @ORM\Column(type="string", length=13)
     */
    private $num_tel_utilisateur;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $mail_utilisateur;

    /**
     * @ORM\ManyToOne(targetEntity=Fonctions::class, inversedBy="utilisateurs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Fonction;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomUtilisateur(): ?string
    {
        return $this->nom_utilisateur;
    }

    public function setNomUtilisateur(string $nom_utilisateur): self
    {
        $this->nom_utilisateur = $nom_utilisateur;

        return $this;
    }

    public function getPrenomUtilisateur(): ?string
    {
        return $this->prenom_utilisateur;
    }

    public function setPrenomUtilisateur(string $prenom_utilisateur): self
    {
        $this->prenom_utilisateur = $prenom_utilisateur;

        return $this;
    }

    public function getNumTelUtilisateur(): ?string
    {
        return $this->num_tel_utilisateur;
    }

    public function setNumTelUtilisateur(string $num_tel_utilisateur): self
    {
        $this->num_tel_utilisateur = $num_tel_utilisateur;

        return $this;
    }

    public function getMailUtilisateur(): ?string
    {
        return $this->mail_utilisateur;
    }

    public function setMailUtilisateur(string $mail_utilisateur): self
    {
        $this->mail_utilisateur = $mail_utilisateur;

        return $this;
    }

    public function getFonction(): ?Fonctions
    {
        return $this->Fonction;
    }

    public function setFonction(?Fonctions $Fonction): self
    {
        $this->Fonction = $Fonction;

        return $this;
    }
}
