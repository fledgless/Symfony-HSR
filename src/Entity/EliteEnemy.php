<?php

namespace App\Entity;

use App\Repository\EliteEnemyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EliteEnemyRepository::class)]
class EliteEnemy
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $eliteEnemyName = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Media $eliteEnemyIcon = null;

    /**
     * @var Collection<int, Type>
     */
    #[ORM\ManyToMany(targetEntity: Type::class, inversedBy: 'eliteEnemies')]
    private Collection $eliteEnemyWeaknesses;

    #[ORM\OneToOne(mappedBy: 'stagnantShadowBoss', cascade: ['persist', 'remove'])]
    private ?StagnantShadow $stagnantShadow = null;

    public function __construct()
    {
        $this->eliteEnemyWeaknesses = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->eliteEnemyName;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEliteEnemyName(): ?string
    {
        return $this->eliteEnemyName;
    }

    public function setEliteEnemyName(string $eliteEnemyName): static
    {
        $this->eliteEnemyName = $eliteEnemyName;

        return $this;
    }

    public function getEliteEnemyIcon(): ?Media
    {
        return $this->eliteEnemyIcon;
    }

    public function setEliteEnemyIcon(?Media $eliteEnemyIcon): static
    {
        $this->eliteEnemyIcon = $eliteEnemyIcon;

        return $this;
    }

    /**
     * @return Collection<int, Type>
     */
    public function getEliteEnemyWeaknesses(): Collection
    {
        return $this->eliteEnemyWeaknesses;
    }

    public function addEliteEnemyWeakness(Type $eliteEnemyWeakness): static
    {
        if (!$this->eliteEnemyWeaknesses->contains($eliteEnemyWeakness)) {
            $this->eliteEnemyWeaknesses->add($eliteEnemyWeakness);
        }

        return $this;
    }

    public function removeEliteEnemyWeakness(Type $eliteEnemyWeakness): static
    {
        $this->eliteEnemyWeaknesses->removeElement($eliteEnemyWeakness);

        return $this;
    }

    public function getStagnantShadow(): ?StagnantShadow
    {
        return $this->stagnantShadow;
    }

    public function setStagnantShadow(?StagnantShadow $stagnantShadow): static
    {
        // unset the owning side of the relation if necessary
        if ($stagnantShadow === null && $this->stagnantShadow !== null) {
            $this->stagnantShadow->setStagnantShadowBoss(null);
        }

        // set the owning side of the relation if necessary
        if ($stagnantShadow !== null && $stagnantShadow->getStagnantShadowBoss() !== $this) {
            $stagnantShadow->setStagnantShadowBoss($this);
        }

        $this->stagnantShadow = $stagnantShadow;

        return $this;
    }
}
