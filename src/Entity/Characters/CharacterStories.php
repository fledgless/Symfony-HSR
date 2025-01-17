<?php

namespace App\Entity\Characters;

use App\Repository\Characters\CharacterStoriesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CharacterStoriesRepository::class)]
class CharacterStories
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $characterDetails = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $characterStoryPartOne = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $characterStoryPartTwo = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $characterStoryPartThree = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $characterStoryPartFour = null;

    #[ORM\OneToOne(inversedBy: 'characterStories', cascade: ['persist', 'remove'])]
    private ?BaseCharacter $character = null;

    public function __toString()
    {
        $name = $this->character + " - Character stories";
        return $name;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCharacterDetails(): ?string
    {
        return $this->characterDetails;
    }

    public function setCharacterDetails(?string $characterDetails): static
    {
        $this->characterDetails = $characterDetails;
        return $this;
    }

    public function getCharacterStoryPartOne(): ?string
    {
        return $this->characterStoryPartOne;
    }

    public function setCharacterStoryPartOne(?string $characterStoryPartOne): static
    {
        $this->characterStoryPartOne = $characterStoryPartOne;
        return $this;
    }

    public function getCharacterStoryPartTwo(): ?string
    {
        return $this->characterStoryPartTwo;
    }

    public function setCharacterStoryPartTwo(?string $characterStoryPartTwo): static
    {
        $this->characterStoryPartTwo = $characterStoryPartTwo;
        return $this;
    }

    public function getCharacterStoryPartThree(): ?string
    {
        return $this->characterStoryPartThree;
    }

    public function setCharacterStoryPartThree(?string $characterStoryPartThree): static
    {
        $this->characterStoryPartThree = $characterStoryPartThree;
        return $this;
    }

    public function getCharacterStoryPartFour(): ?string
    {
        return $this->characterStoryPartFour;
    }

    public function setCharacterStoryPartFour(?string $characterStoryPartFour): static
    {
        $this->characterStoryPartFour = $characterStoryPartFour;
        return $this;
    }

    public function getCharacter(): ?BaseCharacter
    {
        return $this->character;
    }

    public function setCharacter(?BaseCharacter $character): static
    {
        $this->character = $character;
        return $this;
    }
}
