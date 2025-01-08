<?php

namespace App\Entity\Characters;

use App\Repository\CharacterMinorTracesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CharacterMinorTracesRepository::class)]
class CharacterMinorTraces
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'characterMinorTraces', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?CharacterKit $characterName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $levelOneTrace = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ascensionTwoTrace = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ascensionThreeTraceOne = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ascensionThreeTraceTwo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ascensionFourTrace = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ascensionFiveTraceOne = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ascensionFiveTraceTwo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ascensionSixTrace = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $levelSeventyFiveTrace = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $levelEightyTrace = null;

    public function __toString()
    {
        $minorTracesName = $this->characterName + " - Minor traces";
        return $minorTracesName;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCharacterName(): ?CharacterKit
    {
        return $this->characterName;
    }

    public function setCharacterName(CharacterKit $characterName): static
    {
        $this->characterName = $characterName;

        return $this;
    }

    public function getLevelOneTrace(): ?string
    {
        return $this->levelOneTrace;
    }

    public function setLevelOneTrace(?string $levelOneTrace): static
    {
        $this->levelOneTrace = $levelOneTrace;

        return $this;
    }

    public function getAscensionTwoTrace(): ?string
    {
        return $this->ascensionTwoTrace;
    }

    public function setAscensionTwoTrace(?string $ascensionTwoTrace): static
    {
        $this->ascensionTwoTrace = $ascensionTwoTrace;

        return $this;
    }

    public function getAscensionThreeTraceOne(): ?string
    {
        return $this->ascensionThreeTraceOne;
    }

    public function setAscensionThreeTraceOne(?string $ascensionThreeTraceOne): static
    {
        $this->ascensionThreeTraceOne = $ascensionThreeTraceOne;

        return $this;
    }

    public function getAscensionThreeTraceTwo(): ?string
    {
        return $this->ascensionThreeTraceTwo;
    }

    public function setAscensionThreeTraceTwo(?string $ascensionThreeTraceTwo): static
    {
        $this->ascensionThreeTraceTwo = $ascensionThreeTraceTwo;

        return $this;
    }

    public function getAscensionFourTrace(): ?string
    {
        return $this->ascensionFourTrace;
    }

    public function setAscensionFourTrace(?string $ascensionFourTrace): static
    {
        $this->ascensionFourTrace = $ascensionFourTrace;

        return $this;
    }

    public function getAscensionFiveTraceOne(): ?string
    {
        return $this->ascensionFiveTraceOne;
    }

    public function setAscensionFiveTraceOne(?string $ascensionFiveTraceOne): static
    {
        $this->ascensionFiveTraceOne = $ascensionFiveTraceOne;

        return $this;
    }

    public function getAscensionFiveTraceTwo(): ?string
    {
        return $this->ascensionFiveTraceTwo;
    }

    public function setAscensionFiveTraceTwo(?string $ascensionFiveTraceTwo): static
    {
        $this->ascensionFiveTraceTwo = $ascensionFiveTraceTwo;

        return $this;
    }

    public function getAscensionSixTrace(): ?string
    {
        return $this->ascensionSixTrace;
    }

    public function setAscensionSixTrace(?string $ascensionSixTrace): static
    {
        $this->ascensionSixTrace = $ascensionSixTrace;

        return $this;
    }

    public function getLevelSeventyFiveTrace(): ?string
    {
        return $this->levelSeventyFiveTrace;
    }

    public function setLevelSeventyFiveTrace(?string $levelSeventyFiveTrace): static
    {
        $this->levelSeventyFiveTrace = $levelSeventyFiveTrace;

        return $this;
    }

    public function getLevelEightyTrace(): ?string
    {
        return $this->levelEightyTrace;
    }

    public function setLevelEightyTrace(?string $levelEightyTrace): static
    {
        $this->levelEightyTrace = $levelEightyTrace;

        return $this;
    }
}
