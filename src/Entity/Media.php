<?php

namespace App\Entity;

use App\Repository\MediaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MediaRepository::class)]
class Media
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $altText = null;

    #[ORM\Column(length: 255)]
    private ?string $filename = null;

    #[ORM\Column(length: 255)]
    private ?string $category = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imageRole = null;

    #[ORM\ManyToOne(inversedBy: 'media')]
    private ?CharacterEidolons $characterEidolons = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getAltText(): ?string
    {
        return $this->altText;
    }

    public function setAltText(?string $altText): static
    {
        $this->altText = $altText;

        return $this;
    }

    public function getFilename(): ?string
    {
        return $this->filename;
    }

    public function setFilename(string $filename): static
    {
        $this->filename = $filename;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }

    public function getImageRole(): ?string
    {
        return $this->imageRole;
    }

    public function setImageRole(?string $imageRole): static
    {
        $this->imageRole = $imageRole;

        return $this;
    }

    public function getCharacterEidolons(): ?CharacterEidolons
    {
        return $this->characterEidolons;
    }

    public function setCharacterEidolons(?CharacterEidolons $characterEidolons): static
    {
        $this->characterEidolons = $characterEidolons;

        return $this;
    }
}
