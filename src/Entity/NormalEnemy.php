<?php

namespace App\Entity;

use App\Repository\NormalEnemyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NormalEnemyRepository::class)]
class NormalEnemy
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $normalEnemyName = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Media $normalEnemyIcon = null;

    /**
     * @var Collection<int, World>
     */
    #[ORM\ManyToMany(targetEntity: Location::class, inversedBy: 'normalEnemies')]
    private Collection $normalEnemyLocation;

    /**
     * @var Collection<int, AscensionMats>
     */
    #[ORM\ManyToMany(targetEntity: AscensionMats::class, mappedBy: 'ascMatsEnemies')]
    private Collection $ascensionMats;

    public function __construct()
    {
        $this->normalEnemyLocation = new ArrayCollection();
        $this->ascensionMats = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->normalEnemyName;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNormalEnemyName(): ?string
    {
        return $this->normalEnemyName;
    }

    public function setNormalEnemyName(string $normalEnemyName): static
    {
        $this->normalEnemyName = $normalEnemyName;

        return $this;
    }

    public function getNormalEnemyIcon(): ?Media
    {
        return $this->normalEnemyIcon;
    }

    public function setNormalEnemyIcon(?Media $normalEnemyIcon): static
    {
        $this->normalEnemyIcon = $normalEnemyIcon;

        return $this;
    }

    /**
     * @return Collection<int, World>
     */
    public function getNormalEnemyLocation(): Collection
    {
        return $this->normalEnemyLocation;
    }

    public function addNormalEnemyLocation(Location $normalEnemyLocation): static
    {
        if (!$this->normalEnemyLocation->contains($normalEnemyLocation)) {
            $this->normalEnemyLocation->add($normalEnemyLocation);
        }

        return $this;
    }

    public function removeNormalEnemyLocation(Location $normalEnemyLocation): static
    {
        $this->normalEnemyLocation->removeElement($normalEnemyLocation);

        return $this;
    }

    /**
     * @return Collection<int, AscensionMats>
     */
    public function getAscensionMats(): Collection
    {
        return $this->ascensionMats;
    }

    public function addAscensionMat(AscensionMats $ascensionMat): static
    {
        if (!$this->ascensionMats->contains($ascensionMat)) {
            $this->ascensionMats->add($ascensionMat);
            $ascensionMat->addAscMatsEnemy($this);
        }

        return $this;
    }

    public function removeAscensionMat(AscensionMats $ascensionMat): static
    {
        if ($this->ascensionMats->removeElement($ascensionMat)) {
            $ascensionMat->removeAscMatsEnemy($this);
        }

        return $this;
    }
}
