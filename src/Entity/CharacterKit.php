<?php

namespace App\Entity;

use App\Repository\CharacterKitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CharacterKitRepository::class)]
class CharacterKit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?BaseCharacter $characterName = null;

    #[ORM\Column(nullable: true)]
    private ?int $baseHp = null;

    #[ORM\Column(nullable: true)]
    private ?int $baseAtk = null;

    #[ORM\Column(nullable: true)]
    private ?int $baseDef = null;

    #[ORM\Column(nullable: true)]
    private ?int $baseSpd = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mainTraceNameOne = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $mainTraceDescOne = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mainTraceNameTwo = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $mainTraceDescTwo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mainTraceNameThree = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $mainTraceDescThree = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $techniqueName = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $techniqueDesc = null;

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

    public function getCharacterName(): ?BaseCharacter
    {
        return $this->characterName;
    }

    public function setCharacterName(BaseCharacter $characterName): static
    {
        $this->characterName = $characterName;

        return $this;
    }

    public function getBaseHp(): ?int
    {
        return $this->baseHp;
    }

    public function setBaseHp(?int $baseHp): static
    {
        $this->baseHp = $baseHp;

        return $this;
    }

    public function getBaseAtk(): ?int
    {
        return $this->baseAtk;
    }

    public function setBaseAtk(?int $baseAtk): static
    {
        $this->baseAtk = $baseAtk;

        return $this;
    }

    public function getBaseDef(): ?int
    {
        return $this->baseDef;
    }

    public function setBaseDef(?int $baseDef): static
    {
        $this->baseDef = $baseDef;

        return $this;
    }

    public function getBaseSpd(): ?int
    {
        return $this->baseSpd;
    }

    public function setBaseSpd(?int $baseSpd): static
    {
        $this->baseSpd = $baseSpd;

        return $this;
    }

    public function getMainTraceNameOne(): ?string
    {
        return $this->mainTraceNameOne;
    }

    public function setMainTraceNameOne(?string $mainTraceNameOne): static
    {
        $this->mainTraceNameOne = $mainTraceNameOne;

        return $this;
    }

    public function getMainTraceDescOne(): ?string
    {
        return $this->mainTraceDescOne;
    }

    public function setMainTraceDescOne(?string $mainTraceDescOne): static
    {
        $this->mainTraceDescOne = $mainTraceDescOne;

        return $this;
    }

    public function getMainTraceNameTwo(): ?string
    {
        return $this->mainTraceNameTwo;
    }

    public function setMainTraceNameTwo(?string $mainTraceNameTwo): static
    {
        $this->mainTraceNameTwo = $mainTraceNameTwo;

        return $this;
    }

    public function getMainTraceDescTwo(): ?string
    {
        return $this->mainTraceDescTwo;
    }

    public function setMainTraceDescTwo(?string $mainTraceDescTwo): static
    {
        $this->mainTraceDescTwo = $mainTraceDescTwo;

        return $this;
    }

    public function getMainTraceNameThree(): ?string
    {
        return $this->mainTraceNameThree;
    }

    public function setMainTraceNameThree(?string $mainTraceNameThree): static
    {
        $this->mainTraceNameThree = $mainTraceNameThree;

        return $this;
    }

    public function getMainTraceDescThree(): ?string
    {
        return $this->mainTraceDescThree;
    }

    public function setMainTraceDescThree(?string $mainTraceDescThree): static
    {
        $this->mainTraceDescThree = $mainTraceDescThree;

        return $this;
    }

    public function getTechniqueName(): ?string
    {
        return $this->techniqueName;
    }

    public function setTechniqueName(?string $techniqueName): static
    {
        $this->techniqueName = $techniqueName;

        return $this;
    }

    public function getTechniqueDesc(): ?string
    {
        return $this->techniqueDesc;
    }

    public function setTechniqueDesc(?string $techniqueDesc): static
    {
        $this->techniqueDesc = $techniqueDesc;

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
