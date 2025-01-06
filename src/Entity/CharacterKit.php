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

    #[ORM\Column(nullable: true)]
    private ?array $mainTraceOne = null;

    #[ORM\Column(nullable: true)]
    private ?array $mainTraceTwo = null;

    #[ORM\Column(nullable: true)]
    private ?array $mainTraceThree = null;

    #[ORM\Column(nullable: true)]
    private ?array $technique = null;

    /**
     * @var Collection<int, Media>
     */
    #[ORM\ManyToMany(targetEntity: Media::class)]
    private Collection $icons;

    /**
     * @var Collection<int, CharacterBasicAtk>
     */
    #[ORM\OneToMany(targetEntity: CharacterBasicAtk::class, mappedBy: 'characterKit')]
    private Collection $characterBasicAtks;

    public function __construct()
    {
        $this->icons = new ArrayCollection();
        $this->characterBasicAtks = new ArrayCollection();
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

    public function getMainTraceOne(): ?array
    {
        return $this->mainTraceOne;
    }

    public function setMainTraceOne(?array $mainTraceOne): static
    {
        $this->mainTraceOne = $mainTraceOne;

        return $this;
    }

    public function getMainTraceTwo(): ?array
    {
        return $this->mainTraceTwo;
    }

    public function setMainTraceTwo(?array $mainTraceTwo): static
    {
        $this->mainTraceTwo = $mainTraceTwo;

        return $this;
    }

    public function getMainTraceThree(): ?array
    {
        return $this->mainTraceThree;
    }

    public function setMainTraceThree(?array $mainTraceThree): static
    {
        $this->mainTraceThree = $mainTraceThree;

        return $this;
    }

    public function getTechnique(): ?array
    {
        return $this->technique;
    }

    public function setTechnique(?array $technique): static
    {
        $this->technique = $technique;

        return $this;
    }

    /**
     * @return Collection<int, CharacterBasicAtk>
     */
    public function getCharacterBasicAtks(): Collection
    {
        return $this->characterBasicAtks;
    }

    public function addCharacterBasicAtk(CharacterBasicAtk $characterBasicAtk): static
    {
        if (!$this->characterBasicAtks->contains($characterBasicAtk)) {
            $this->characterBasicAtks->add($characterBasicAtk);
            $characterBasicAtk->setCharacterKit($this);
        }

        return $this;
    }

    public function removeCharacterBasicAtk(CharacterBasicAtk $characterBasicAtk): static
    {
        if ($this->characterBasicAtks->removeElement($characterBasicAtk)) {
            // set the owning side to null (unless already changed)
            if ($characterBasicAtk->getCharacterKit() === $this) {
                $characterBasicAtk->setCharacterKit(null);
            }
        }

        return $this;
    }
}
