<?php

namespace App\Entity;

use App\Repository\CharacterRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CharacterRepository::class)]
#[ORM\Table(name: '`character`')]
class Character
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

    #[ORM\Column(length: 5000, nullable: true)]
    private ?string $characterDesc = null;

    #[ORM\Column(length: 5000, nullable: true)]
    private ?string $characterNa = null;

    #[ORM\Column(length: 5000, nullable: true)]
    private ?string $characterSkill = null;

    #[ORM\Column(length: 5000, nullable: true)]
    private ?string $characterUltimate = null;

    #[ORM\Column(length: 5000, nullable: true)]
    private ?string $characterTalent = null;

    #[ORM\Column(length: 5000, nullable: true)]
    private ?string $characterTechnique = null;

    #[ORM\Column(nullable: true)]
    private ?int $characterBaseHp = null;

    #[ORM\Column(nullable: true)]
    private ?int $characterBaseAtk = null;

    #[ORM\Column(nullable: true)]
    private ?int $characterBaseDef = null;

    #[ORM\Column(nullable: true)]
    private ?int $characterBaseSpd = null;

    #[ORM\Column(length: 5000, nullable: true)]
    private ?string $characterE1 = null;

    #[ORM\Column(length: 5000, nullable: true)]
    private ?string $characterE2 = null;

    #[ORM\Column(length: 5000, nullable: true)]
    private ?string $characterE3 = null;

    #[ORM\Column(length: 5000, nullable: true)]
    private ?string $characterE4 = null;

    #[ORM\Column(length: 5000, nullable: true)]
    private ?string $characterE5 = null;

    #[ORM\Column(length: 5000, nullable: true)]
    private ?string $characterE6 = null;

    #[ORM\Column(length: 5000, nullable: true)]
    private ?string $characterTrace1 = null;

    #[ORM\Column(length: 5000, nullable: true)]
    private ?string $characterTrace2 = null;

    #[ORM\Column(length: 5000, nullable: true)]
    private ?string $characterTrace3 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $characterSubstat1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $characterSubstat2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $characterSubstat3 = null;

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

    public function getCharacterDesc(): ?string
    {
        return $this->characterDesc;
    }

    public function setCharacterDesc(?string $characterDesc): static
    {
        $this->characterDesc = $characterDesc;

        return $this;
    }

    public function getCharacterNa(): ?string
    {
        return $this->characterNa;
    }

    public function setCharacterNa(?string $characterNa): static
    {
        $this->characterNa = $characterNa;

        return $this;
    }

    public function getCharacterSkill(): ?string
    {
        return $this->characterSkill;
    }

    public function setCharacterSkill(?string $characterSkill): static
    {
        $this->characterSkill = $characterSkill;

        return $this;
    }

    public function getCharacterUltimate(): ?string
    {
        return $this->characterUltimate;
    }

    public function setCharacterUltimate(?string $characterUltimate): static
    {
        $this->characterUltimate = $characterUltimate;

        return $this;
    }

    public function getCharacterTalent(): ?string
    {
        return $this->characterTalent;
    }

    public function setCharacterTalent(?string $characterTalent): static
    {
        $this->characterTalent = $characterTalent;

        return $this;
    }

    public function getCharacterTechnique(): ?string
    {
        return $this->characterTechnique;
    }

    public function setCharacterTechnique(?string $characterTechnique): static
    {
        $this->characterTechnique = $characterTechnique;

        return $this;
    }

    public function getCharacterBaseHp(): ?int
    {
        return $this->characterBaseHp;
    }

    public function setCharacterBaseHp(?int $characterBaseHp): static
    {
        $this->characterBaseHp = $characterBaseHp;

        return $this;
    }

    public function getCharacterBaseAtk(): ?int
    {
        return $this->characterBaseAtk;
    }

    public function setCharacterBaseAtk(?int $characterBaseAtk): static
    {
        $this->characterBaseAtk = $characterBaseAtk;

        return $this;
    }

    public function getCharacterBaseDef(): ?int
    {
        return $this->characterBaseDef;
    }

    public function setCharacterBaseDef(?int $characterBaseDef): static
    {
        $this->characterBaseDef = $characterBaseDef;

        return $this;
    }

    public function getCharacterBaseSpd(): ?int
    {
        return $this->characterBaseSpd;
    }

    public function setCharacterBaseSpd(?int $characterBaseSpd): static
    {
        $this->characterBaseSpd = $characterBaseSpd;

        return $this;
    }

    public function getCharacterE1(): ?string
    {
        return $this->characterE1;
    }

    public function setCharacterE1(?string $characterE1): static
    {
        $this->characterE1 = $characterE1;

        return $this;
    }

    public function getCharacterE2(): ?string
    {
        return $this->characterE2;
    }

    public function setCharacterE2(?string $characterE2): static
    {
        $this->characterE2 = $characterE2;

        return $this;
    }

    public function getCharacterE3(): ?string
    {
        return $this->characterE3;
    }

    public function setCharacterE3(?string $characterE3): static
    {
        $this->characterE3 = $characterE3;

        return $this;
    }

    public function getCharacterE4(): ?string
    {
        return $this->characterE4;
    }

    public function setCharacterE4(?string $characterE4): static
    {
        $this->characterE4 = $characterE4;

        return $this;
    }

    public function getCharacterE5(): ?string
    {
        return $this->characterE5;
    }

    public function setCharacterE5(?string $characterE5): static
    {
        $this->characterE5 = $characterE5;

        return $this;
    }

    public function getCharacterE6(): ?string
    {
        return $this->characterE6;
    }

    public function setCharacterE6(?string $characterE6): static
    {
        $this->characterE6 = $characterE6;

        return $this;
    }

    public function getCharacterTrace1(): ?string
    {
        return $this->characterTrace1;
    }

    public function setCharacterTrace1(?string $characterTrace1): static
    {
        $this->characterTrace1 = $characterTrace1;

        return $this;
    }

    public function getCharacterTrace2(): ?string
    {
        return $this->characterTrace2;
    }

    public function setCharacterTrace2(?string $characterTrace2): static
    {
        $this->characterTrace2 = $characterTrace2;

        return $this;
    }

    public function getCharacterTrace3(): ?string
    {
        return $this->characterTrace3;
    }

    public function setCharacterTrace3(?string $characterTrace3): static
    {
        $this->characterTrace3 = $characterTrace3;

        return $this;
    }

    public function getCharacterSubstat1(): ?string
    {
        return $this->characterSubstat1;
    }

    public function setCharacterSubstat1(?string $characterSubstat1): static
    {
        $this->characterSubstat1 = $characterSubstat1;

        return $this;
    }

    public function getCharacterSubstat2(): ?string
    {
        return $this->characterSubstat2;
    }

    public function setCharacterSubstat2(?string $characterSubstat2): static
    {
        $this->characterSubstat2 = $characterSubstat2;

        return $this;
    }

    public function getCharacterSubstat3(): ?string
    {
        return $this->characterSubstat3;
    }

    public function setCharacterSubstat3(?string $characterSubstat3): static
    {
        $this->characterSubstat3 = $characterSubstat3;

        return $this;
    }
}
