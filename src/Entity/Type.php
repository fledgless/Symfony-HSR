<?php

namespace App\Entity;

use App\Entity\Characters\BaseCharacter;
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

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Media $icon = null;

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

    public function getIcon(): ?Media
    {
        return $this->icon;
    }

    public function setIcon(?Media $icon): static
    {
        $this->icon = $icon;
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
}