<?php

namespace App\Entity\Enemies;

use App\Entity\Domains\StagnantShadow;
use App\Entity\Media;
use App\Entity\Type;
use App\Repository\Enemies\EliteEnemyRepository;
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
    private ?string $name = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Media $icon = null;

    /**
     * @var Collection<int, Type>
     */
    #[ORM\ManyToMany(targetEntity: Type::class, inversedBy: 'eliteEnemies')]
    private Collection $weaknesses;

    #[ORM\OneToOne(mappedBy: 'stagnantShadowBoss', cascade: ['persist', 'remove'])]
    private ?StagnantShadow $stagnantShadow = null;

    public function __construct()
    {
        $this->weaknesses = new ArrayCollection();
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
     * @return Collection<int, Type>
     */
    public function getWeaknesses(): Collection
    {
        return $this->weaknesses;
    }

    public function addWeakness(Type $weakness): static
    {
        if (!$this->weaknesses->contains($weakness)) {
            $this->weaknesses->add($weakness);
        }
        return $this;
    }

    public function removeWeakness(Type $weakness): static
    {
        $this->weaknesses->removeElement($weakness);
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
            $this->stagnantShadow->setBoss(null);
        }
        // set the owning side of the relation if necessary
        if ($stagnantShadow !== null && $stagnantShadow->getBoss() !== $this) {
            $stagnantShadow->setBoss($this);
        }
        $this->stagnantShadow = $stagnantShadow;
        return $this;
    }
}
