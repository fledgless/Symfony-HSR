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
    private ?string $name = null;

    #[ORM\Column]
    private ?bool $released = false;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Media $icon = null;

    /**
     * @var Collection<int, NormalEnemy>
     */
    #[ORM\ManyToMany(targetEntity: NormalEnemy::class, mappedBy: 'locations')]
    private Collection $normalEnemies;

    #[ORM\Column(length: 255)]
    private ?string $world = null;

    /**
     * @var Collection<int, StagnantShadow>
     */
    #[ORM\OneToMany(targetEntity: StagnantShadow::class, mappedBy: 'location')]
    private Collection $stagnantShadows;

    /**
     * @var Collection<int, GoldenCalyx>
     */
    #[ORM\OneToMany(targetEntity: GoldenCalyx::class, mappedBy: 'location')]
    private Collection $goldenCalyxes;

    /**
     * @var Collection<int, CrimsonCalyx>
     */
    #[ORM\OneToMany(targetEntity: CrimsonCalyx::class, mappedBy: 'location')]
    private Collection $crimsonCalyxes;

    /**
     * @var Collection<int, EchoOfWar>
     */
    #[ORM\OneToMany(targetEntity: EchoOfWar::class, mappedBy: 'location')]
    private Collection $echoOfWars;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    /**
     * @var Collection<int, BaseCharacter>
     */
    #[ORM\OneToMany(targetEntity: BaseCharacter::class, mappedBy: 'location')]
    private Collection $characters;

    public function __construct()
    {
        $this->normalEnemies = new ArrayCollection();
        $this->stagnantShadows = new ArrayCollection();
        $this->goldenCalyxes = new ArrayCollection();
        $this->crimsonCalyxes = new ArrayCollection();
        $this->echoOfWars = new ArrayCollection();
        $this->characters = new ArrayCollection();
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

    public function isReleased(): ?bool
    {
        return $this->released;
    }

    public function setReleased(bool $released): static
    {
        $this->released = $released;
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
            $normalEnemy->addLocation($this);
        }
        return $this;
    }

    public function removeNormalEnemy(NormalEnemy $normalEnemy): static
    {
        if ($this->normalEnemies->removeElement($normalEnemy)) {
            $normalEnemy->removeLocation($this);
        }
        return $this;
    }

    public function getWorld(): ?string
    {
        return $this->world;
    }

    public function setWorld(string $world): static
    {
        $this->world = $world;
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
            $stagnantShadow->setLocation($this);
        }
        return $this;
    }

    public function removeStagnantShadow(StagnantShadow $stagnantShadow): static
    {
        if ($this->stagnantShadows->removeElement($stagnantShadow)) {
            // set the owning side to null (unless already changed)
            if ($stagnantShadow->getLocation() === $this) {
                $stagnantShadow->setLocation(null);
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
            $goldenCalyx->setLocation($this);
        }
        return $this;
    }

    public function removeGoldenCalyx(GoldenCalyx $goldenCalyx): static
    {
        if ($this->goldenCalyxes->removeElement($goldenCalyx)) {
            // set the owning side to null (unless already changed)
            if ($goldenCalyx->getLocation() === $this) {
                $goldenCalyx->setLocation(null);
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
            $crimsonCalyx->setLocation($this);
        }
        return $this;
    }

    public function removeCrimsonCalyx(CrimsonCalyx $crimsonCalyx): static
    {
        if ($this->crimsonCalyxes->removeElement($crimsonCalyx)) {
            // set the owning side to null (unless already changed)
            if ($crimsonCalyx->getLocation() === $this) {
                $crimsonCalyx->setLocation(null);
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
            $echoOfWar->setLocation($this);
        }
        return $this;
    }

    public function removeEchoOfWar(EchoOfWar $echoOfWar): static
    {
        if ($this->echoOfWars->removeElement($echoOfWar)) {
            // set the owning side to null (unless already changed)
            if ($echoOfWar->getLocation() === $this) {
                $echoOfWar->setLocation(null);
            }
        }
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

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
            $character->setLocation($this);
        }
        return $this;
    }

    public function removeLocationCharacter(BaseCharacter $character): static
    {
        if ($this->characters->removeElement($character)) {
            // set the owning side to null (unless already changed)
            if ($character->getLocation() === $this) {
                $character->setLocation(null);
            }
        }
        return $this;
    }
}
