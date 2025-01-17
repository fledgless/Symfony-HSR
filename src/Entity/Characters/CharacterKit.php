<?php

namespace App\Entity\Characters;

use App\Entity\Media;
use App\Entity\Memosprites\Memosprite;
use App\Entity\Stat;
use App\Repository\Characters\CharacterKitRepository;
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
    private Collection $basicAtks;

    /**
     * @var Collection<int, CharacterSkill>
     */
    #[ORM\OneToMany(targetEntity: CharacterSkill::class, mappedBy: 'characterKit')]
    private Collection $skills;

    /**
     * @var Collection<int, CharacterUltimate>
     */
    #[ORM\OneToMany(targetEntity: CharacterUltimate::class, mappedBy: 'characterKit')]
    private Collection $ultimates;

    #[ORM\OneToOne(inversedBy: 'characterKit')]
    private ?CharacterTalent $talent = null;

    #[ORM\OneToOne(mappedBy: 'characterName', cascade: ['persist', 'remove'])]
    private ?CharacterMinorTraces $minorTraces = null;

    /**
     * @var Collection<int, CharacterEidolons>
     */
    #[ORM\OneToMany(targetEntity: CharacterEidolons::class, mappedBy: 'characterKit')]
    private Collection $eidolons;

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

    #[ORM\Column]
    private ?bool $leaks = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $betaVersion = null;

    public function __construct()
    {
        $this->icons = new ArrayCollection();
        $this->basicAtks = new ArrayCollection();
        $this->skills = new ArrayCollection();
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
    public function getBasicAtks(): Collection
    {
        return $this->basicAtks;
    }

    public function addBasicAtk(CharacterBasicAtk $basicAtk): static
    {
        if (!$this->basicAtks->contains($basicAtk)) {
            $this->basicAtks->add($basicAtk);
            $basicAtk->setCharacterKit($this);
        }
        return $this;
    }

    public function removeBasicAtk(CharacterBasicAtk $basicAtk): static
    {
        if ($this->basicAtks->removeElement($basicAtk)) {
            // set the owning side to null (unless already changed)
            if ($basicAtk->getCharacterKit() === $this) {
                $basicAtk->setCharacterKit(null);
            }
        }
        return $this;
    }

    /**
     * @return Collection<int, CharacterSkill>
     */
    public function getSkills(): Collection
    {
        return $this->skills;
    }

    public function addSkill(CharacterSkill $skill): static
    {
        if (!$this->skills->contains($skill)) {
            $this->skills->add($skill);
            $skill->setCharacterKit($this);
        }
        return $this;
    }

    public function removeSkill(CharacterSkill $skill): static
    {
        if ($this->skills->removeElement($skill)) {
            // set the owning side to null (unless already changed)
            if ($skill->getCharacterKit() === $this) {
                $skill->setCharacterKit(null);
            }
        }
        return $this;
    }

    /**
     * @return Collection<int, CharacterUltimate>
     */
    public function getUltimates(): Collection
    {
        return $this->ultimates;
    }

    public function addUltimate(CharacterUltimate $ultimate): static
    {
        if (!$this->ultimates->contains($ultimate)) {
            $this->ultimates->add($ultimate);
            $ultimate->setCharacterKit($this);
        }
        return $this;
    }

    public function removeUltimate(CharacterUltimate $ultimate): static
    {
        if ($this->ultimates->removeElement($ultimate)) {
            // set the owning side to null (unless already changed)
            if ($ultimate->getCharacterKit() === $this) {
                $ultimate->setCharacterKit(null);
            }
        }
        return $this;
    }

    public function getTalent(): ?CharacterTalent
    {
        return $this->talent;
    }

    public function setTalent(?CharacterTalent $talent): static
    {
        $this->talent = $talent;
        return $this;
    }

    public function getMinorTraces(): ?CharacterMinorTraces
    {
        return $this->minorTraces;
    }

    public function setMinorTraces(CharacterMinorTraces $minorTraces): static
    {
        // set the owning side of the relation if necessary
        if ($minorTraces->getCharacterName() !== $this) {
            $minorTraces->setCharacterName($this);
        }
        $this->minorTraces = $minorTraces;
        return $this;
    }

    /**
     * @return Collection<int, CharacterEidolons>
     */
    public function getEidolons(): Collection
    {
        return $this->eidolons;
    }

    public function addEidolon(CharacterEidolons $eidolon): static
    {
        if (!$this->eidolons->contains($eidolon)) {
            $this->eidolons->add($eidolon);
            $eidolon->setCharacterKit($this);
        }
        return $this;
    }

    public function removeEidolon(CharacterEidolons $eidolon): static
    {
        if ($this->eidolons->removeElement($eidolon)) {
            // set the owning side to null (unless already changed)
            if ($eidolon->getCharacterKit() === $this) {
                $eidolon->setCharacterKit(null);
            }
        }
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

    public function isLeaks(): ?bool
    {
        return $this->leaks;
    }

    public function setLeaks(bool $leaks): static
    {
        $this->leaks = $leaks;
        return $this;
    }

    public function getBetaVersion(): ?string
    {
        return $this->betaVersion;
    }

    public function setBetaVersion(?string $betaVersion): static
    {
        $this->betaVersion = $betaVersion;
        return $this;
    }
}
