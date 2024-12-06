<?php

namespace App\Entity;

use App\Repository\WorldRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WorldRepository::class)]
class Location
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $locationName = null;

    #[ORM\Column]
    private ?bool $locationReleased = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Media $locationIcon = null;

    /**
     * @var Collection<int, NormalEnemy>
     */
    #[ORM\ManyToMany(targetEntity: NormalEnemy::class, mappedBy: 'normalEnemyLocation')]
    private Collection $normalEnemies;

    #[ORM\Column(length: 255)]
    private ?string $locationWorld = null;

    public function __construct()
    {
        $this->normalEnemies = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->locationName;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLocationName(): ?string
    {
        return $this->locationName;
    }

    public function setLocationName(string $worldName): static
    {
        $this->locationName = $worldName;

        return $this;
    }

    public function isLocationReleased(): ?bool
    {
        return $this->locationReleased;
    }

    public function setLocationReleased(bool $worldReleased): static
    {
        $this->locationReleased = $worldReleased;

        return $this;
    }

    public function getLocationIcon(): ?Media
    {
        return $this->locationIcon;
    }

    public function setLocationIcon(?Media $worldIcon): static
    {
        $this->locationIcon = $worldIcon;

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

    public function getLocationWorld(): ?string
    {
        return $this->locationWorld;
    }

    public function setLocationWorld(string $locationWorld): static
    {
        $this->locationWorld = $locationWorld;

        return $this;
    }
}
