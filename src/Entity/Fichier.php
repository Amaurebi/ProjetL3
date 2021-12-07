<?php

namespace App\Entity;

use App\Repository\FichierRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\DateTime;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=FichierRepository::class)
 * @Vich\Uploadable
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
     * @ORM\ManyToOne(targetEntity=Realisation::class, inversedBy="fichiers")
     */
    private $realisationId;

    /**
     * @Vich\UploadableField(mapping="realisation_images", fileNameProperty="url")
     * @var File
     */
    private $imageFile;
    
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

    public function getRealisationId(): ?Realisation
    {
        return $this->realisationId;
    }

    public function setRealisationId(?Realisation $realisationId): self
    {
        $this->realisationId = $realisationId;

        return $this;
    }

    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;
        
        if (null !== $imageFile) {
            $this->updatedAt = new \DateTime('now');
        }
    }

    /**
     * @return File|null
     */
    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function __toString(): ?string
    {
        if($this->url == null) {
            return "abc";
        }
        return $this->url;
    }

}
