<?php

namespace App\Entity;

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
    private ?string $typeName = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Media $typeIcon = null;

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

    public function __construct()
    {
        $this->characters = new ArrayCollection();
        $this->normalEnemies = new ArrayCollection();
        $this->eliteEnemies = new ArrayCollection();
        $this->bossMats = new ArrayCollection();
        $this->echosBosses = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->typeName;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeName(): ?string
    {
        return $this->typeName;
    }

    public function setTypeName(string $typeName): static
    {
        $this->typeName = $typeName;

        return $this;
    }

    public function getTypeIcon(): ?Media
    {
        return $this->typeIcon;
    }

    public function setTypeIcon(?Media $typeIcon): static
    {
        $this->typeIcon = $typeIcon;

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
            $character->setCharacterType($this);
        }

        return $this;
    }

    public function removeCharacter(BaseCharacter $character): static
    {
        if ($this->characters->removeElement($character)) {
            // set the owning side to null (unless already changed)
            if ($character->getCharacterType() === $this) {
                $character->setCharacterType(null);
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
            $normalEnemy->addNormalEnemyWeakness($this);
        }

        return $this;
    }

    public function removeNormalEnemy(NormalEnemy $normalEnemy): static
    {
        if ($this->normalEnemies->removeElement($normalEnemy)) {
            $normalEnemy->removeNormalEnemyWeakness($this);
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
            $eliteEnemy->addEliteEnemyWeakness($this);
        }

        return $this;
    }

    public function removeEliteEnemy(EliteEnemy $eliteEnemy): static
    {
        if ($this->eliteEnemies->removeElement($eliteEnemy)) {
            $eliteEnemy->removeEliteEnemyWeakness($this);
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
            $bossMat->setBossMatType($this);
        }

        return $this;
    }

    public function removeBossMat(BossMat $bossMat): static
    {
        if ($this->bossMats->removeElement($bossMat)) {
            // set the owning side to null (unless already changed)
            if ($bossMat->getBossMatType() === $this) {
                $bossMat->setBossMatType(null);
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
            $echosBoss->addEchoBossWeakness($this);
        }

        return $this;
    }

    public function removeEchosBoss(EchosBoss $echosBoss): static
    {
        if ($this->echosBosses->removeElement($echosBoss)) {
            $echosBoss->removeEchoBossWeakness($this);
        }

        return $this;
    }
}