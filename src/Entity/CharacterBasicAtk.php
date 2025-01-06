<?php

namespace App\Entity;

use App\Repository\CharacterBasicAtkRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CharacterBasicAtkRepository::class)]
class CharacterBasicAtk
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(nullable: true)]
    private ?int $energyGain = null;

    #[ORM\Column(nullable: true)]
    private ?int $break = null;

    #[ORM\Column]
    private ?bool $enhanced = null;

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

    #[ORM\ManyToOne(inversedBy: 'characterBasicAtks')]
    private ?CharacterKit $characterKit = null;

    /**
     * @var Collection<int, Media>
     */
    #[ORM\ManyToMany(targetEntity: Media::class)]
    private Collection $icons;

    public function __construct()
    {
        $this->icons = new ArrayCollection();
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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
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

    public function getBreak(): ?int
    {
        return $this->break;
    }

    public function setBreak(?int $break): static
    {
        $this->break = $break;

        return $this;
    }

    public function isEnhanced(): ?bool
    {
        return $this->enhanced;
    }

    public function setEnhanced(bool $enhanced): static
    {
        $this->enhanced = $enhanced;

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

    public function getCharacterKit(): ?CharacterKit
    {
        return $this->characterKit;
    }

    public function setCharacterKit(?CharacterKit $characterKit): static
    {
        $this->characterKit = $characterKit;

        return $this;
    }

    /**
     * @return Collection<int, Media>
     */
    public function getIcons(): Collection
    {
        return $this->icons;
    }

    public function addIcon(Media $icon): static
    {
        if (!$this->icons->contains($icon)) {
            $this->icons->add($icon);
        }

        return $this;
    }

    public function removeIcon(Media $icon): static
    {
        $this->icons->removeElement($icon);

        return $this;
    }
}
