<?php

namespace App\Entity\Characters;

use App\Entity\Media;
use App\Repository\Characters\CharacterEidolonsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CharacterEidolonsRepository::class)]
class CharacterEidolons
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $number = null;

    #[ORM\ManyToOne(inversedBy: 'eidolons')]
    private ?CharacterKit $characterKit = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pullWorth = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $recommendation = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Media $icon = null;

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

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(?string $number): static
    {
        $this->number = $number;
        return $this;
    }

    public function getCharacterKit(): ?CharacterKit
    {
        return $this->characterKit;
    }

    public function setCharacterKit(?CharacterKit $characterKit): static
    {
        $this->characterKit = $characterKit;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;
        return $this;
    }

    public function getPullWorth(): ?string
    {
        return $this->pullWorth;
    }

    public function setPullWorth(string $pullWorth): static
    {
        $this->pullWorth = $pullWorth;
        return $this;
    }

    public function getRecommendation(): ?string
    {
        return $this->recommendation;
    }

    public function setRecommendation(string $recommendation): static
    {
        $this->recommendation = $recommendation;
        return $this;
    }

    public function getIcon(): ?Media
    {
        return $this->icon;
    }

    public function setIcon(?Media $icon): static
    {
        $this->icon = $icon;
        return $this;
    }
}
