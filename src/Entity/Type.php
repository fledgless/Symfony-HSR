<?php

namespace App\Entity;

use App\Entity\Characters\BaseCharacter;
use App\Entity\Domains\CavernOfCorrosion;
use App\Entity\Enemies\BossEnemy;
use App\Entity\Enemies\EchosBoss;
use App\Entity\Enemies\EliteEnemy;
use App\Entity\Enemies\NormalEnemy;
use App\Entity\Materials\BossMat;
use App\Repository\TypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeRepository::class)]
class Type
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    /**
     * @var Collection<int, BaseCharacter>
     */
    #[ORM\OneToMany(targetEntity: BaseCharacter::class, mappedBy: 'characterType')]
    private Collection $characters;

    /**
     * @var Collection<int, NormalEnemy>
     */
    #[ORM\ManyToMany(targetEntity: NormalEnemy::class, mappedBy: 'normalEnemyWeaknesses')]
    private Collection $normalEnemies;

    /**
     * @var Collection<int, EliteEnemy>
     */
    #[ORM\ManyToMany(targetEntity: EliteEnemy::class, mappedBy: 'eliteEnemyWeaknesses')]
    private Collection $eliteEnemies;

    /**
     * @var Collection<int, BossMat>
     */
    #[ORM\OneToMany(targetEntity: BossMat::class, mappedBy: 'bossMatType')]
    private Collection $bossMats;

    /**
     * @var Collection<int, EchosBoss>
     */
    #[ORM\ManyToMany(targetEntity: EchosBoss::class, mappedBy: 'echoBossWeaknesses')]
    private Collection $echosBosses;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $elementalDebuff = null;

    #[ORM\Column(nullable: true)]
    private ?int $breakMultiplier = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $typeFilename = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $debuffFilename = null;

    /**
     * @var Collection<int, CavernOfCorrosion>
     */
    #[ORM\ManyToMany(targetEntity: CavernOfCorrosion::class, mappedBy: 'recommendedTypes')]
    private Collection $cavernOfCorrosions;

    /**
     * @var Collection<int, BossEnemy>
     */
    #[ORM\ManyToMany(targetEntity: BossEnemy::class, mappedBy: 'weaknesses')]
    private Collection $bossEnemies;

    public function __construct()
    {
        $this->characters = new ArrayCollection();
        $this->normalEnemies = new ArrayCollection();
        $this->eliteEnemies = new ArrayCollection();
        $this->bossMats = new ArrayCollection();
        $this->echosBosses = new ArrayCollection();
        $this->cavernOfCorrosions = new ArrayCollection();
        $this->bossEnemies = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->name;
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

    /**
     * @return Collection<int, BaseCharacter>
     */
    public function getCharacters(): Collection
    {
        return $this->characters;
    }

    public function addCharacter(BaseCharacter $character): static
    {
        if (!$this->characters->contains($character)) {
            $this->characters->add($character);
            $character->setType($this);
        }
        return $this;
    }

    public function removeCharacter(BaseCharacter $character): static
    {
        if ($this->characters->removeElement($character)) {
            // set the owning side to null (unless already changed)
            if ($character->getType() === $this) {
                $character->setType(null);
            }
        }
        return $this;
    }

    /**
     * @return Collection<int, NormalEnemy>
     */
    public function getNormalEnemies(): Collection
    {
        return $this->normalEnemies;
    }

    public function addNormalEnemy(NormalEnemy $normalEnemy): static
    {
        if (!$this->normalEnemies->contains($normalEnemy)) {
            $this->normalEnemies->add($normalEnemy);
            $normalEnemy->addWeakness($this);
        }
        return $this;
    }

    public function removeNormalEnemy(NormalEnemy $normalEnemy): static
    {
        if ($this->normalEnemies->removeElement($normalEnemy)) {
            $normalEnemy->removeWeakness($this);
        }
        return $this;
    }

    /**
     * @return Collection<int, EliteEnemy>
     */
    public function getEliteEnemies(): Collection
    {
        return $this->eliteEnemies;
    }

    public function addEliteEnemy(EliteEnemy $eliteEnemy): static
    {
        if (!$this->eliteEnemies->contains($eliteEnemy)) {
            $this->eliteEnemies->add($eliteEnemy);
            $eliteEnemy->addWeakness($this);
        }
        return $this;
    }

    public function removeEliteEnemy(EliteEnemy $eliteEnemy): static
    {
        if ($this->eliteEnemies->removeElement($eliteEnemy)) {
            $eliteEnemy->removeWeakness($this);
        }
        return $this;
    }

    /**
     * @return Collection<int, BossMat>
     */
    public function getBossMats(): Collection
    {
        return $this->bossMats;
    }

    public function addBossMat(BossMat $bossMat): static
    {
        if (!$this->bossMats->contains($bossMat)) {
            $this->bossMats->add($bossMat);
            $bossMat->setType($this);
        }
        return $this;
    }

    public function removeBossMat(BossMat $bossMat): static
    {
        if ($this->bossMats->removeElement($bossMat)) {
            // set the owning side to null (unless already changed)
            if ($bossMat->getType() === $this) {
                $bossMat->setType(null);
            }
        }
        return $this;
    }

    /**
     * @return Collection<int, EchosBoss>
     */
    public function getEchosBosses(): Collection
    {
        return $this->echosBosses;
    }

    public function addEchosBoss(EchosBoss $echosBoss): static
    {
        if (!$this->echosBosses->contains($echosBoss)) {
            $this->echosBosses->add($echosBoss);
            $echosBoss->addWeakness($this);
        }
        return $this;
    }

    public function removeEchosBoss(EchosBoss $echosBoss): static
    {
        if ($this->echosBosses->removeElement($echosBoss)) {
            $echosBoss->removeWeakness($this);
        }
        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getElementalDebuff(): ?string
    {
        return $this->elementalDebuff;
    }

    public function setElementalDebuff(?string $elementalDebuff): static
    {
        $this->elementalDebuff = $elementalDebuff;

        return $this;
    }

    public function getBreakMultiplier(): ?int
    {
        return $this->breakMultiplier;
    }

    public function setBreakMultiplier(?int $breakMultiplier): static
    {
        $this->breakMultiplier = $breakMultiplier;

        return $this;
    }

    public function getTypeFilename(): ?string
    {
        return $this->typeFilename;
    }

    public function setTypeFilename(?string $typeFilename): static
    {
        $this->typeFilename = $typeFilename;

        return $this;
    }

    public function getDebuffFilename(): ?string
    {
        return $this->debuffFilename;
    }

    public function setDebuffFilename(?string $debuffFilename): static
    {
        $this->debuffFilename = $debuffFilename;

        return $this;
    }

    /**
     * @return Collection<int, CavernOfCorrosion>
     */
    public function getCavernOfCorrosions(): Collection
    {
        return $this->cavernOfCorrosions;
    }

    public function addCavernOfCorrosion(CavernOfCorrosion $cavernOfCorrosion): static
    {
        if (!$this->cavernOfCorrosions->contains($cavernOfCorrosion)) {
            $this->cavernOfCorrosions->add($cavernOfCorrosion);
            $cavernOfCorrosion->addRecommendedType($this);
        }

        return $this;
    }

    public function removeCavernOfCorrosion(CavernOfCorrosion $cavernOfCorrosion): static
    {
        if ($this->cavernOfCorrosions->removeElement($cavernOfCorrosion)) {
            $cavernOfCorrosion->removeRecommendedType($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, BossEnemy>
     */
    public function getBossEnemies(): Collection
    {
        return $this->bossEnemies;
    }

    public function addBossEnemy(BossEnemy $bossEnemy): static
    {
        if (!$this->bossEnemies->contains($bossEnemy)) {
            $this->bossEnemies->add($bossEnemy);
            $bossEnemy->addWeakness($this);
        }

        return $this;
    }

    public function removeBossEnemy(BossEnemy $bossEnemy): static
    {
        if ($this->bossEnemies->removeElement($bossEnemy)) {
            $bossEnemy->removeWeakness($this);
        }

        return $this;
    }
}