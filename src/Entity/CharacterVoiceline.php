<?php

namespace App\Entity;

use App\Repository\CharacterVoicelineRepository;
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
    private ?string $voicelineName = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $voicelineContent = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $voicelineCategory = null;

    #[ORM\ManyToOne(inversedBy: 'characterVoicelines')]
    private ?BaseCharacter $voicelineCharacter = null;

    public function __toString()
    {
        $voicelineName = $this->voicelineCharacter + " - Voiceline - " + $this->voicelineName;
        return $voicelineName;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVoicelineName(): ?string
    {
        return $this->voicelineName;
    }

    public function setVoicelineName(string $voicelineName): static
    {
        $this->voicelineName = $voicelineName;

        return $this;
    }

    public function getVoicelineContent(): ?string
    {
        return $this->voicelineContent;
    }

    public function setVoicelineContent(?string $voicelineContent): static
    {
        $this->voicelineContent = $voicelineContent;

        return $this;
    }

    public function getVoicelineCategory(): ?string
    {
        return $this->voicelineCategory;
    }

    public function setVoicelineCategory(?string $voicelineCategory): static
    {
        $this->voicelineCategory = $voicelineCategory;

        return $this;
    }

    public function getVoicelineCharacter(): ?BaseCharacter
    {
        return $this->voicelineCharacter;
    }

    public function setVoicelineCharacter(?BaseCharacter $voicelineCharacter): static
    {
        $this->voicelineCharacter = $voicelineCharacter;

        return $this;
    }
}
