<?php

namespace App\Entity\Characters;

use App\Repository\Characters\CharacterVoicelineRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CharacterVoicelineRepository::class)]
class CharacterVoiceline
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $content = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $category = null;

    #[ORM\ManyToOne(inversedBy: 'voicelines')]
    private ?BaseCharacter $character = null;

    public function __toString()
    {
        $name = $this->character + " - Voiceline - " + $this->name;
        return $name;
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

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): static
    {
        $this->content = $content;
        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(?string $category): static
    {
        $this->category = $category;
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
