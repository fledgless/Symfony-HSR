<?php

namespace App\Entity;

use App\Repository\WorldRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WorldRepository::class)]
class World
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $worldName = null;

    #[ORM\Column]
    private ?bool $worldReleased = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Media $worldIcon = null;

    /**
     * @var Collection<int, NormalEnemy>
     */
    #[ORM\ManyToMany(targetEntity: NormalEnemy::class, mappedBy: 'normalEnemyLocation')]
    private Collection $normalEnemies;

    public function __construct()
    {
        $this->normalEnemies = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->worldName;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWorldName(): ?string
    {
        return $this->worldName;
    }

    public function setWorldName(string $worldName): static
    {
        $this->worldName = $worldName;

        return $this;
    }

    public function isWorldReleased(): ?bool
    {
        return $this->worldReleased;
    }

    public function setWorldReleased(bool $worldReleased): static
    {
        $this->worldReleased = $worldReleased;

        return $this;
    }

    public function getWorldIcon(): ?Media
    {
        return $this->worldIcon;
    }

    public function setWorldIcon(?Media $worldIcon): static
    {
        $this->worldIcon = $worldIcon;

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
            $normalEnemy->addNormalEnemyLocation($this);
        }

        return $this;
    }

    public function removeNormalEnemy(NormalEnemy $normalEnemy): static
    {
        if ($this->normalEnemies->removeElement($normalEnemy)) {
            $normalEnemy->removeNormalEnemyLocation($this);
        }

        return $this;
    }
}
