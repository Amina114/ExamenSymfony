<?php

namespace App\Entity;

use App\Repository\EvenementRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use App\Entity\Club;



/**
 * @ORM\Entity(repositoryClass=EvenementRepository::class)
 */
class Evenement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $nb_participants;

    /**
     * @ORM\ManyToOne(targetEntity=club::class, inversedBy="evenements")
     * @JoinColumn(onDelete="CASCADE")
     */
    private $clubs;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getNbParticipants(): ?int
    {
        return $this->nb_participants;
    }

    public function setNbParticipants(int $nb_participants): self
    {
        $this->nb_participants = $nb_participants;

        return $this;
    }

    public function getClubs(): ?club
    {
        return $this->clubs;
    }

    public function setClubs(?club $clubs): self
    {
        $this->clubs = $clubs;

        return $this;
    }
}
