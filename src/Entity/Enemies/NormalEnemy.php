<?php

namespace App\Entity\Enemies;

use App\Entity\Domains\CrimsonCalyx;
use App\Entity\Domains\GoldenCalyx;
use App\Entity\Location;
use App\Entity\Materials\AscensionMats;
use App\Entity\Media;
use App\Entity\Type;
use App\Repository\Enemies\NormalEnemyRepository;
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
    private ?string $name = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Media $icon = null;

    /**
     * @var Collection<int, World>
     */
    #[ORM\ManyToMany(targetEntity: Location::class, inversedBy: 'normalEnemies')]
    private Collection $locations;

    /**
     * @var Collection<int, AscensionMats>
     */
    #[ORM\ManyToMany(targetEntity: AscensionMats::class, mappedBy: 'ascMatsEnemies')]
    private Collection $ascMats;

    /**
     * @var Collection<int, Type>
     */
    #[ORM\ManyToMany(targetEntity: Type::class, inversedBy: 'enemies')]
    private Collection $weaknesses;

    /**
     * @var Collection<int, GoldenCalyx>
     */
    #[ORM\ManyToMany(targetEntity: GoldenCalyx::class, mappedBy: 'enemies')]
    private Collection $goldenCalyxes;

    /**
     * @var Collection<int, CrimsonCalyx>
     */
    #[ORM\ManyToMany(targetEntity: CrimsonCalyx::class, mappedBy: 'enemies')]
    private Collection $crimsonCalyxes;

    public function __construct()
    {
        $this->locations = new ArrayCollection();
        $this->ascMats = new ArrayCollection();
        $this->weaknesses = new ArrayCollection();
        $this->goldenCalyxes = new ArrayCollection();
        $this->crimsonCalyxes = new ArrayCollection();
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
     * @return Collection<int, World>
     */
    public function getLocations(): Collection
    {
        return $this->locations;
    }

    public function addLocation(Location $location): static
    {
        if (!$this->locations->contains($location)) {
            $this->locations->add($location);
        }
        return $this;
    }

    public function removeLocation(Location $location): static
    {
        $this->locations->removeElement($location);
        return $this;
    }

    /**
     * @return Collection<int, AscensionMats>
     */
    public function getAscMats(): Collection
    {
        return $this->ascMats;
    }

    public function addAscMat(AscensionMats $ascMat): static
    {
        if (!$this->ascMats->contains($ascMat)) {
            $this->ascMats->add($ascMat);
            $ascMat->addAscMatsEnemy($this);
        }
        return $this;
    }

    public function removeAscMat(AscensionMats $ascMat): static
    {
        if ($this->ascMats->removeElement($ascMat)) {
            $ascMat->removeAscMatsEnemy($this);
        }
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
            $goldenCalyx->addEnemy($this);
        }
        return $this;
    }

    public function removeGoldenCalyx(GoldenCalyx $goldenCalyx): static
    {
        if ($this->goldenCalyxes->removeElement($goldenCalyx)) {
            $goldenCalyx->removeEnemy($this);
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
            $crimsonCalyx->addEnemy($this);
        }
        return $this;
    }

    public function removeCrimsonCalyx(CrimsonCalyx $crimsonCalyx): static
    {
        if ($this->crimsonCalyxes->removeElement($crimsonCalyx)) {
            $crimsonCalyx->removeEnemy($this);
        }
        return $this;
    }
}
