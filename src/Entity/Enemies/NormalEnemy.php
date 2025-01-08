<?php

namespace App\Entity\Enemies;

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

    /**
     * @var Collection<int, Type>
     */
    #[ORM\ManyToMany(targetEntity: Type::class, inversedBy: 'normalEnemies')]
    private Collection $normalEnemyWeaknesses;

    /**
     * @var Collection<int, GoldenCalyx>
     */
    #[ORM\ManyToMany(targetEntity: GoldenCalyx::class, mappedBy: 'goldenCalyxEnemies')]
    private Collection $goldenCalyxes;

    /**
     * @var Collection<int, CrimsonCalyx>
     */
    #[ORM\ManyToMany(targetEntity: CrimsonCalyx::class, mappedBy: 'crimsonCalyxEnemies')]
    private Collection $crimsonCalyxes;

    public function __construct()
    {
        $this->normalEnemyLocation = new ArrayCollection();
        $this->ascensionMats = new ArrayCollection();
        $this->normalEnemyWeaknesses = new ArrayCollection();
        $this->goldenCalyxes = new ArrayCollection();
        $this->crimsonCalyxes = new ArrayCollection();
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

    /**
     * @return Collection<int, Type>
     */
    public function getNormalEnemyWeaknesses(): Collection
    {
        return $this->normalEnemyWeaknesses;
    }

    public function addNormalEnemyWeakness(Type $normalEnemyWeakness): static
    {
        if (!$this->normalEnemyWeaknesses->contains($normalEnemyWeakness)) {
            $this->normalEnemyWeaknesses->add($normalEnemyWeakness);
        }

        return $this;
    }

    public function removeNormalEnemyWeakness(Type $normalEnemyWeakness): static
    {
        $this->normalEnemyWeaknesses->removeElement($normalEnemyWeakness);

        return $this;
    }

    /**
     * @return Collection<int, GoldenCalyx>
     */
    public function getGoldenCalyxes(): Collection
    {
        return $this->goldenCalyxes;
    }

    public function addGoldenCalyx(GoldenCalyx $goldenCalyx): static
    {
        if (!$this->goldenCalyxes->contains($goldenCalyx)) {
            $this->goldenCalyxes->add($goldenCalyx);
            $goldenCalyx->addGoldenCalyxEnemy($this);
        }

        return $this;
    }

    public function removeGoldenCalyx(GoldenCalyx $goldenCalyx): static
    {
        if ($this->goldenCalyxes->removeElement($goldenCalyx)) {
            $goldenCalyx->removeGoldenCalyxEnemy($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, CrimsonCalyx>
     */
    public function getCrimsonCalyxes(): Collection
    {
        return $this->crimsonCalyxes;
    }

    public function addCrimsonCalyx(CrimsonCalyx $crimsonCalyx): static
    {
        if (!$this->crimsonCalyxes->contains($crimsonCalyx)) {
            $this->crimsonCalyxes->add($crimsonCalyx);
            $crimsonCalyx->addCrimsonCalyxEnemy($this);
        }

        return $this;
    }

    public function removeCrimsonCalyx(CrimsonCalyx $crimsonCalyx): static
    {
        if ($this->crimsonCalyxes->removeElement($crimsonCalyx)) {
            $crimsonCalyx->removeCrimsonCalyxEnemy($this);
        }

        return $this;
    }
}
