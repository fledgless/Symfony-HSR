<?php

namespace App\Entity;

use App\Repository\CharacterEidolonsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CharacterEidolonsRepository::class)]
class CharacterEidolons
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?array $eidolonNames = null;

    #[ORM\Column(nullable: true)]
    private ?array $eidolonDescriptions = null;

    #[ORM\OneToOne(mappedBy: 'eidolons', cascade: ['persist', 'remove'])]
    private ?BaseCharacter $characterName = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEidolonNames(): ?array
    {
        return $this->eidolonNames;
    }

    public function setEidolonNames(?array $eidolonNames): static
    {
        $this->eidolonNames = $eidolonNames;

        return $this;
    }

    public function getEidolonDescriptions(): ?array
    {
        return $this->eidolonDescriptions;
    }

    public function setEidolonDescriptions(?array $eidolonDescriptions): static
    {
        $this->eidolonDescriptions = $eidolonDescriptions;

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
            $this->characterName->setEidolons(null);
        }

        // set the owning side of the relation if necessary
        if ($characterName !== null && $characterName->getEidolons() !== $this) {
            $characterName->setEidolons($this);
        }

        $this->characterName = $characterName;

        return $this;
    }

    public function __toString()
    {
        return $this->characterName;
    }
}
