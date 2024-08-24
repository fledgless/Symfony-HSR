<?php

namespace App\Entity;

use App\Repository\CharacterKitRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CharacterKitRepository::class)]
class CharacterKit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $characterNormalAttackName = null;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $characterNormalAttackDesc = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $characterSkillName = null;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $characterSkillDesc = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $characterUltName = null;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $characterNameDesc = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $characterTalentName = null;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $characterTalentDesc = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $characterTechniqueName = null;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $characterTechniqueDesc = null;

    #[ORM\OneToOne(mappedBy: 'kit', cascade: ['persist', 'remove'])]
    private ?BaseCharacter $characterName = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCharacterNormalAttackName(): ?string
    {
        return $this->characterNormalAttackName;
    }

    public function setCharacterNormalAttackName(?string $characterNormalAttackName): static
    {
        $this->characterNormalAttackName = $characterNormalAttackName;

        return $this;
    }

    public function getCharacterNormalAttackDesc(): ?string
    {
        return $this->characterNormalAttackDesc;
    }

    public function setCharacterNormalAttackDesc(?string $characterNormalAttackDesc): static
    {
        $this->characterNormalAttackDesc = $characterNormalAttackDesc;

        return $this;
    }

    public function getCharacterSkillName(): ?string
    {
        return $this->characterSkillName;
    }

    public function setCharacterSkillName(?string $characterSkillName): static
    {
        $this->characterSkillName = $characterSkillName;

        return $this;
    }

    public function getCharacterSkillDesc(): ?string
    {
        return $this->characterSkillDesc;
    }

    public function setCharacterSkillDesc(?string $characterSkillDesc): static
    {
        $this->characterSkillDesc = $characterSkillDesc;

        return $this;
    }

    public function getCharacterUltName(): ?string
    {
        return $this->characterUltName;
    }

    public function setCharacterUltName(?string $characterUltName): static
    {
        $this->characterUltName = $characterUltName;

        return $this;
    }

    public function getCharacterNameDesc(): ?string
    {
        return $this->characterNameDesc;
    }

    public function setCharacterNameDesc(?string $characterNameDesc): static
    {
        $this->characterNameDesc = $characterNameDesc;

        return $this;
    }

    public function getCharacterTalentName(): ?string
    {
        return $this->characterTalentName;
    }

    public function setCharacterTalentName(?string $characterTalentName): static
    {
        $this->characterTalentName = $characterTalentName;

        return $this;
    }

    public function getCharacterTalentDesc(): ?string
    {
        return $this->characterTalentDesc;
    }

    public function setCharacterTalentDesc(?string $characterTalentDesc): static
    {
        $this->characterTalentDesc = $characterTalentDesc;

        return $this;
    }

    public function getCharacterTechniqueName(): ?string
    {
        return $this->characterTechniqueName;
    }

    public function setCharacterTechniqueName(?string $characterTechniqueName): static
    {
        $this->characterTechniqueName = $characterTechniqueName;

        return $this;
    }

    public function getCharacterTechniqueDesc(): ?string
    {
        return $this->characterTechniqueDesc;
    }

    public function setCharacterTechniqueDesc(?string $characterTechniqueDesc): static
    {
        $this->characterTechniqueDesc = $characterTechniqueDesc;

        return $this;
    }

    public function getCharacterName(): ?BaseCharacter
    {
        return $this->characterName;
    }

    public function setCharacterName(?BaseCharacter $characterName): static
    {
        // unset the owning side of the relation if necessary
        if ($characterName === null && $this->characterName !== null) {
            $this->characterName->setKit(null);
        }

        // set the owning side of the relation if necessary
        if ($characterName !== null && $characterName->getKit() !== $this) {
            $characterName->setKit($this);
        }

        $this->characterName = $characterName;

        return $this;
    }
}
