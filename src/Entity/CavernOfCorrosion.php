<?php

namespace App\Entity;

use App\Entity\Enemies\EliteEnemy;
use App\Entity\Enemies\NormalEnemy;
use App\Repository\CavernOfCorrosionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CavernOfCorrosionRepository::class)]
class CavernOfCorrosion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $specialMechanism = null;

    /**
     * @var Collection<int, RelicSet>
     */
    #[ORM\OneToMany(targetEntity: RelicSet::class, mappedBy: 'cavernOfCorrosion')]
    private Collection $relicSets;

    #[ORM\ManyToOne(inversedBy: 'cavernOfCorrosions')]
    private ?Location $location = null;

    #[ORM\OneToOne(inversedBy: 'stagnantShadow', cascade: ['persist', 'remove'])]
    private ?EliteEnemy $boss = null;

        /**
     * @var Collection<int, NormalEnemy>
     */
    #[ORM\ManyToMany(targetEntity: NormalEnemy::class, inversedBy: 'crimsonCalyxes')]
    private Collection $enemies;

    /**
     * @var Collection<int, Type>
     */
    #[ORM\ManyToMany(targetEntity: Type::class, inversedBy: 'cavernOfCorrosions')]
    private Collection $recommendedTypes;

    public function __construct()
    {
        $this->relicSets = new ArrayCollection();
        $this->recommendedTypes = new ArrayCollection();
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

    public function getSpecialMechanism(): ?string
    {
        return $this->specialMechanism;
    }

    public function setSpecialMechanism(?string $specialMechanism): static
    {
        $this->specialMechanism = $specialMechanism;

        return $this;
    }

    /**
     * @return Collection<int, RelicSet>
     */
    public function getRelicSets(): Collection
    {
        return $this->relicSets;
    }

    public function addRelicSet(RelicSet $relicSet): static
    {
        if (!$this->relicSets->contains($relicSet)) {
            $this->relicSets->add($relicSet);
            $relicSet->setCavernOfCorrosion($this);
        }

        return $this;
    }

    public function removeRelicSet(RelicSet $relicSet): static
    {
        if ($this->relicSets->removeElement($relicSet)) {
            // set the owning side to null (unless already changed)
            if ($relicSet->getCavernOfCorrosion() === $this) {
                $relicSet->setCavernOfCorrosion(null);
            }
        }

        return $this;
    }

    public function getLocation(): ?Location
    {
        return $this->location;
    }

    public function setLocation(?Location $location): static
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @return Collection<int, Type>
     */
    public function getRecommendedTypes(): Collection
    {
        return $this->recommendedTypes;
    }

    public function addRecommendedType(Type $recommendedType): static
    {
        if (!$this->recommendedTypes->contains($recommendedType)) {
            $this->recommendedTypes->add($recommendedType);
        }

        return $this;
    }

    public function removeRecommendedType(Type $recommendedType): static
    {
        $this->recommendedTypes->removeElement($recommendedType);

        return $this;
    }

    public function getBoss(): ?EliteEnemy
    {
        return $this->boss;
    }

    public function setBoss(?EliteEnemy $boss): static
    {
        $this->boss = $boss;
        return $this;
    }

    /**
     * @return Collection<int, NormalEnemy>
     */
    public function getEnemies(): Collection
    {
        return $this->enemies;
    }

    public function addEnemy(NormalEnemy $enemy): static
    {
        if (!$this->enemies->contains($enemy)) {
            $this->enemies->add($enemy);
        }
        return $this;
    }

    public function removeEnemy(NormalEnemy $enemy): static
    {
        $this->enemies->removeElement($enemy);
        return $this;
    }
}
