<?php

namespace App\Entity;

use App\Repository\BaseCharacterRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BaseCharacterRepository::class)]
class BaseCharacter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $characterName = null;

    #[ORM\Column(length: 255)]
    private ?string $characterRarity = null;

    #[ORM\Column(length: 255)]
    private ?string $characterPath = null;

    #[ORM\Column(length: 255)]
    private ?string $characterType = null;

    #[ORM\OneToOne(inversedBy: 'characterName', cascade: ['persist', 'remove'])]
    private ?CharacterKit $kit = null;

    #[ORM\OneToOne(inversedBy: 'characterName', cascade: ['persist', 'remove'])]
    private ?CharacterEidolons $eidolons = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCharacterName(): ?string
    {
        return $this->characterName;
    }

    public function setCharacterName(string $characterName): static
    {
        $this->characterName = $characterName;

        return $this;
    }

    public function getCharacterRarity(): ?string
    {
        return $this->characterRarity;
    }

    public function setCharacterRarity(string $characterRarity): static
    {
        $this->characterRarity = $characterRarity;

        return $this;
    }

    public function getCharacterPath(): ?string
    {
        return $this->characterPath;
    }

    public function setCharacterPath(string $characterPath): static
    {
        $this->characterPath = $characterPath;

        return $this;
    }

    public function getCharacterType(): ?string
    {
        return $this->characterType;
    }

    public function setCharacterType(string $characterType): static
    {
        $this->characterType = $characterType;

        return $this;
    }

    public function getKit(): ?CharacterKit
    {
        return $this->kit;
    }

    public function setKit(?CharacterKit $kit): static
    {
        $this->kit = $kit;

        return $this;
    }

    public function getEidolons(): ?CharacterEidolons
    {
        return $this->eidolons;
    }

    public function setEidolons(?CharacterEidolons $eidolons): static
    {
        $this->eidolons = $eidolons;

        return $this;
    }

    public function __toString()
    {
        return $this->characterName;
    }
}
