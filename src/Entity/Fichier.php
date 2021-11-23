<?php

namespace App\Entity;

use App\Repository\FichierRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FichierRepository::class)
 */
class Fichier
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=2000)
     */
    private $legende;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $url;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity=realisation::class, inversedBy="fichiers")
     */
    private $realisationId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLegende(): ?string
    {
        return $this->legende;
    }

    public function setLegende(string $legende): self
    {
        $this->legende = $legende;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getRealisationId(): ?realisation
    {
        return $this->realisationId;
    }

    public function setRealisationId(?realisation $realisationId): self
    {
        $this->realisationId = $realisationId;

        return $this;
    }
}
