<?php

namespace App\Entity;

use App\Entity\Characters\BaseCharacter;
use App\Entity\Domains\CrimsonCalyx;
use App\Entity\Domains\EchoOfWar;
use App\Entity\Domains\GoldenCalyx;
use App\Entity\Domains\StagnantShadow;
use App\Entity\Enemies\NormalEnemy;
use App\Repository\LocationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LocationRepository::class)]
class Location
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $locationName = null;

    #[ORM\Column]
    private ?bool $locationReleased = false;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Media $locationIcon = null;

    /**
     * @var Collection<int, NormalEnemy>
     */
    #[ORM\ManyToMany(targetEntity: NormalEnemy::class, mappedBy: 'normalEnemyLocation')]
    private Collection $normalEnemies;

    #[ORM\Column(length: 255)]
    private ?string $locationWorld = null;

    /**
     * @var Collection<int, StagnantShadow>
     */
    #[ORM\OneToMany(targetEntity: StagnantShadow::class, mappedBy: 'stagnantShadowLocation')]
    private Collection $stagnantShadows;

    /**
     * @var Collection<int, GoldenCalyx>
     */
    #[ORM\OneToMany(targetEntity: GoldenCalyx::class, mappedBy: 'goldenCalyxLocation')]
    private Collection $goldenCalyxes;

    /**
     * @var Collection<int, CrimsonCalyx>
     */
    #[ORM\OneToMany(targetEntity: CrimsonCalyx::class, mappedBy: 'crimsonCalyxLocation')]
    private Collection $crimsonCalyxes;

    /**
     * @var Collection<int, EchoOfWar>
     */
    #[ORM\OneToMany(targetEntity: EchoOfWar::class, mappedBy: 'echoOfWarLocation')]
    private Collection $echoOfWars;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $locationDescription = null;

    /**
     * @var Collection<int, BaseCharacter>
     */
    #[ORM\OneToMany(targetEntity: BaseCharacter::class, mappedBy: 'location')]
    private Collection $locationCharacters;

    public function __construct()
    {
        $this->normalEnemies = new ArrayCollection();
        $this->stagnantShadows = new ArrayCollection();
        $this->goldenCalyxes = new ArrayCollection();
        $this->crimsonCalyxes = new ArrayCollection();
        $this->echoOfWars = new ArrayCollection();
        $this->locationCharacters = new ArrayCollection();
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

    /**
     * @return Collection<int, StagnantShadow>
     */
    public function getStagnantShadows(): Collection
    {
        return $this->stagnantShadows;
    }

    public function addStagnantShadow(StagnantShadow $stagnantShadow): static
    {
        if (!$this->stagnantShadows->contains($stagnantShadow)) {
            $this->stagnantShadows->add($stagnantShadow);
            $stagnantShadow->setStagnantShadowLocation($this);
        }

        return $this;
    }

    public function removeStagnantShadow(StagnantShadow $stagnantShadow): static
    {
        if ($this->stagnantShadows->removeElement($stagnantShadow)) {
            // set the owning side to null (unless already changed)
            if ($stagnantShadow->getStagnantShadowLocation() === $this) {
                $stagnantShadow->setStagnantShadowLocation(null);
            }
        }

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
            $goldenCalyx->setGoldenCalyxLocation($this);
        }

        return $this;
    }

    public function removeGoldenCalyx(GoldenCalyx $goldenCalyx): static
    {
        if ($this->goldenCalyxes->removeElement($goldenCalyx)) {
            // set the owning side to null (unless already changed)
            if ($goldenCalyx->getGoldenCalyxLocation() === $this) {
                $goldenCalyx->setGoldenCalyxLocation(null);
            }
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
            $crimsonCalyx->setCrimsonCalyxLocation($this);
        }

        return $this;
    }

    public function removeCrimsonCalyx(CrimsonCalyx $crimsonCalyx): static
    {
        if ($this->crimsonCalyxes->removeElement($crimsonCalyx)) {
            // set the owning side to null (unless already changed)
            if ($crimsonCalyx->getCrimsonCalyxLocation() === $this) {
                $crimsonCalyx->setCrimsonCalyxLocation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, EchoOfWar>
     */
    public function getEchoOfWars(): Collection
    {
        return $this->echoOfWars;
    }

    public function addEchoOfWar(EchoOfWar $echoOfWar): static
    {
        if (!$this->echoOfWars->contains($echoOfWar)) {
            $this->echoOfWars->add($echoOfWar);
            $echoOfWar->setEchoOfWarLocation($this);
        }

        return $this;
    }

    public function removeEchoOfWar(EchoOfWar $echoOfWar): static
    {
        if ($this->echoOfWars->removeElement($echoOfWar)) {
            // set the owning side to null (unless already changed)
            if ($echoOfWar->getEchoOfWarLocation() === $this) {
                $echoOfWar->setEchoOfWarLocation(null);
            }
        }

        return $this;
    }

    public function getLocationDescription(): ?string
    {
        return $this->locationDescription;
    }

    public function setLocationDescription(?string $locationDescription): static
    {
        $this->locationDescription = $locationDescription;

        return $this;
    }

    /**
     * @return Collection<int, BaseCharacter>
     */
    public function getLocationCharacters(): Collection
    {
        return $this->locationCharacters;
    }

    public function addLocationCharacter(BaseCharacter $locationCharacter): static
    {
        if (!$this->locationCharacters->contains($locationCharacter)) {
            $this->locationCharacters->add($locationCharacter);
            $locationCharacter->setLocation($this);
        }

        return $this;
    }

    public function removeLocationCharacter(BaseCharacter $locationCharacter): static
    {
        if ($this->locationCharacters->removeElement($locationCharacter)) {
            // set the owning side to null (unless already changed)
            if ($locationCharacter->getLocation() === $this) {
                $locationCharacter->setLocation(null);
            }
        }

        return $this;
    }
}
