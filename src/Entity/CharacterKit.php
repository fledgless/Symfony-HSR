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

    /**
     * @var Collection<int, CharacterSkill>
     */
    #[ORM\OneToMany(targetEntity: CharacterSkill::class, mappedBy: 'characterKit')]
    private Collection $characterSkills;

    /**
     * @var Collection<int, CharacterUltimate>
     */
    #[ORM\OneToMany(targetEntity: CharacterUltimate::class, mappedBy: 'characterKit')]
    private Collection $characterUltimates;

    #[ORM\OneToOne(inversedBy: 'characterKit')]
    private ?CharacterTalent $characterTalent = null;

    #[ORM\OneToOne(mappedBy: 'characterName', cascade: ['persist', 'remove'])]
    private ?CharacterMinorTraces $characterMinorTraces = null;

    /**
     * @var Collection<int, Stat>
     */
    #[ORM\ManyToMany(targetEntity: Stat::class)]
    private Collection $stats;

    #[ORM\Column(nullable: true)]
    private ?int $statOneValue = null;

    #[ORM\Column(nullable: true)]
    private ?int $statTwoValue = null;

    #[ORM\Column(nullable: true)]
    private ?int $statThreeValue = null;

    #[ORM\OneToOne(mappedBy: 'memomaster', cascade: ['persist', 'remove'])]
    private ?Memosprite $memosprite = null;

    public function __construct()
    {
        $this->icons = new ArrayCollection();
        $this->characterBasicAtks = new ArrayCollection();
        $this->characterSkills = new ArrayCollection();
        $this->stats = new ArrayCollection();
    }

    public function __toString()
    {
        $kitName = $this->characterName + " - Kit";
        return $kitName;
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

    /**
     * @return Collection<int, CharacterSkill>
     */
    public function getCharacterSkills(): Collection
    {
        return $this->characterSkills;
    }

    public function addCharacterSkill(CharacterSkill $characterSkill): static
    {
        if (!$this->characterSkills->contains($characterSkill)) {
            $this->characterSkills->add($characterSkill);
            $characterSkill->setCharacterKit($this);
        }

        return $this;
    }

    public function removeCharacterSkill(CharacterSkill $characterSkill): static
    {
        if ($this->characterSkills->removeElement($characterSkill)) {
            // set the owning side to null (unless already changed)
            if ($characterSkill->getCharacterKit() === $this) {
                $characterSkill->setCharacterKit(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CharacterUltimate>
     */
    public function getCharacterUltimates(): Collection
    {
        return $this->characterUltimates;
    }

    public function addCharacterUltimate(CharacterUltimate $characterUltimate): static
    {
        if (!$this->characterUltimates->contains($characterUltimate)) {
            $this->characterUltimates->add($characterUltimate);
            $characterUltimate->setCharacterKit($this);
        }

        return $this;
    }

    public function removeCharacterUltimate(CharacterUltimate $characterUltimate): static
    {
        if ($this->characterUltimates->removeElement($characterUltimate)) {
            // set the owning side to null (unless already changed)
            if ($characterUltimate->getCharacterKit() === $this) {
                $characterUltimate->setCharacterKit(null);
            }
        }

        return $this;
    }

    public function getCharacterTalent(): ?CharacterTalent
    {
        return $this->characterTalent;
    }

    public function setCharacterTalent(?CharacterTalent $characterTalent): static
    {
        $this->characterTalent = $characterTalent;

        return $this;
    }

    public function getCharacterMinorTraces(): ?CharacterMinorTraces
    {
        return $this->characterMinorTraces;
    }

    public function setCharacterMinorTraces(CharacterMinorTraces $characterMinorTraces): static
    {
        // set the owning side of the relation if necessary
        if ($characterMinorTraces->getCharacterName() !== $this) {
            $characterMinorTraces->setCharacterName($this);
        }

        $this->characterMinorTraces = $characterMinorTraces;

        return $this;
    }

    /**
     * @return Collection<int, Stat>
     */
    public function getStats(): Collection
    {
        return $this->stats;
    }

    public function addStat(Stat $stat): static
    {
        if (!$this->stats->contains($stat)) {
            $this->stats->add($stat);
        }

        return $this;
    }

    public function removeStat(Stat $stat): static
    {
        $this->stats->removeElement($stat);

        return $this;
    }

    public function getStatOneValue(): ?int
    {
        return $this->statOneValue;
    }

    public function setStatOneValue(?int $statOneValue): static
    {
        $this->statOneValue = $statOneValue;

        return $this;
    }

    public function getStatTwoValue(): ?int
    {
        return $this->statTwoValue;
    }

    public function setStatTwoValue(?int $statTwoValue): static
    {
        $this->statTwoValue = $statTwoValue;

        return $this;
    }

    public function getStatThreeValue(): ?int
    {
        return $this->statThreeValue;
    }

    public function setStatThreeValue(?int $statThreeValue): static
    {
        $this->statThreeValue = $statThreeValue;

        return $this;
    }

    public function getMemosprite(): ?Memosprite
    {
        return $this->memosprite;
    }

    public function setMemosprite(?Memosprite $memosprite): static
    {
        // unset the owning side of the relation if necessary
        if ($memosprite === null && $this->memosprite !== null) {
            $this->memosprite->setMemomaster(null);
        }

        // set the owning side of the relation if necessary
        if ($memosprite !== null && $memosprite->getMemomaster() !== $this) {
            $memosprite->setMemomaster($this);
        }

        $this->memosprite = $memosprite;

        return $this;
    }
}
