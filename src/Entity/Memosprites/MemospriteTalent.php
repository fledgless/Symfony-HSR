<?php

namespace App\Entity\Memosprites;

use App\Entity\Media;
use App\Repository\Memosprites\MemospriteTalentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MemospriteTalentRepository::class)]
class MemospriteTalent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Media $icon = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $type = null;

    #[ORM\Column(nullable: true)]
    private ?int $energyGain = null;

    #[ORM\Column(nullable: true)]
    private ?int $breakMainTarget = null;

    #[ORM\Column(nullable: true)]
    private ?int $breakAdjacentTargets = null;

    #[ORM\Column]
    private ?bool $levelUp = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descUnique = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descLevelOne = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descLevelTwo = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descLevelThree = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descLevelFour = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descLevelFive = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descLevelSix = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descLevelSeven = null;

    #[ORM\ManyToOne(inversedBy: 'talents')]
    private ?Memosprite $memosprite = null;

    public function __toString()
    {
        $talentName = $this->memosprite + " - Talent - " + $this->name;
        return $talentName;
    }

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

    public function getIcon(): ?Media
    {
        return $this->icon;
    }

    public function setIcon(?Media $icon): static
    {
        $this->icon = $icon;
        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): static
    {
        $this->type = $type;
        return $this;
    }

    public function getEnergyGain(): ?int
    {
        return $this->energyGain;
    }

    public function setEnergyGain(?int $energyGain): static
    {
        $this->energyGain = $energyGain;
        return $this;
    }

    public function getBreakMainTarget(): ?int
    {
        return $this->breakMainTarget;
    }

    public function setBreakMainTarget(?int $breakMainTarget): static
    {
        $this->breakMainTarget = $breakMainTarget;
        return $this;
    }

    public function getBreakAdjacentTargets(): ?int
    {
        return $this->breakAdjacentTargets;
    }

    public function setBreakAdjacentTargets(?int $breakAdjacentTargets): static
    {
        $this->breakAdjacentTargets = $breakAdjacentTargets;
        return $this;
    }

    public function isLevelUp(): ?bool
    {
        return $this->levelUp;
    }

    public function setLevelUp(bool $levelUp): static
    {
        $this->levelUp = $levelUp;
        return $this;
    }

    public function getDescUnique(): ?string
    {
        return $this->descUnique;
    }

    public function setDescUnique(?string $descUnique): static
    {
        $this->descUnique = $descUnique;
        return $this;
    }

    public function getDescLevelOne(): ?string
    {
        return $this->descLevelOne;
    }

    public function setDescLevelOne(?string $descLevelOne): static
    {
        $this->descLevelOne = $descLevelOne;
        return $this;
    }

    public function getDescLevelTwo(): ?string
    {
        return $this->descLevelTwo;
    }

    public function setDescLevelTwo(?string $descLevelTwo): static
    {
        $this->descLevelTwo = $descLevelTwo;
        return $this;
    }

    public function getDescLevelThree(): ?string
    {
        return $this->descLevelThree;
    }

    public function setDescLevelThree(?string $descLevelThree): static
    {
        $this->descLevelThree = $descLevelThree;
        return $this;
    }

    public function getDescLevelFour(): ?string
    {
        return $this->descLevelFour;
    }

    public function setDescLevelFour(?string $descLevelFour): static
    {
        $this->descLevelFour = $descLevelFour;
        return $this;
    }

    public function getDescLevelFive(): ?string
    {
        return $this->descLevelFive;
    }

    public function setDescLevelFive(?string $descLevelFive): static
    {
        $this->descLevelFive = $descLevelFive;
        return $this;
    }

    public function getDescLevelSix(): ?string
    {
        return $this->descLevelSix;
    }

    public function setDescLevelSix(?string $descLevelSix): static
    {
        $this->descLevelSix = $descLevelSix;
        return $this;
    }

    public function getDescLevelSeven(): ?string
    {
        return $this->descLevelSeven;
    }

    public function setDescLevelSeven(?string $descLevelSeven): static
    {
        $this->descLevelSeven = $descLevelSeven;
        return $this;
    }

    public function getMemosprite(): ?Memosprite
    {
        return $this->memosprite;
    }

    public function setMemosprite(?Memosprite $memosprite): static
    {
        $this->memosprite = $memosprite;
        return $this;
    }
}
