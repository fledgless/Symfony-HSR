<?php

namespace App\Entity;

use App\Repository\CrimsonCalyxRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CrimsonCalyxRepository::class)]
class CrimsonCalyx
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $crimsonCalyxName = null;

    /**
     * @var Collection<int, NormalEnemy>
     */
    #[ORM\ManyToMany(targetEntity: NormalEnemy::class, inversedBy: 'crimsonCalyxes')]
    private Collection $crimsonCalyxEnemies;

    #[ORM\ManyToOne(inversedBy: 'crimsonCalyxes')]
    private ?Location $crimsonCalyxLocation = null;

    #[ORM\OneToOne(mappedBy: 'traceMatsCrimsonCalyx', cascade: ['persist', 'remove'])]
    private ?TraceMats $traceMats = null;

    public function __construct()
    {
        $this->crimsonCalyxEnemies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCrimsonCalyxName(): ?string
    {
        return $this->crimsonCalyxName;
    }

    public function setCrimsonCalyxName(string $crimsonCalyxName): static
    {
        $this->crimsonCalyxName = $crimsonCalyxName;

        return $this;
    }

    /**
     * @return Collection<int, NormalEnemy>
     */
    public function getCrimsonCalyxEnemies(): Collection
    {
        return $this->crimsonCalyxEnemies;
    }

    public function addCrimsonCalyxEnemy(NormalEnemy $crimsonCalyxEnemy): static
    {
        if (!$this->crimsonCalyxEnemies->contains($crimsonCalyxEnemy)) {
            $this->crimsonCalyxEnemies->add($crimsonCalyxEnemy);
        }

        return $this;
    }

    public function removeCrimsonCalyxEnemy(NormalEnemy $crimsonCalyxEnemy): static
    {
        $this->crimsonCalyxEnemies->removeElement($crimsonCalyxEnemy);

        return $this;
    }

    public function getCrimsonCalyxLocation(): ?Location
    {
        return $this->crimsonCalyxLocation;
    }

    public function setCrimsonCalyxLocation(?Location $crimsonCalyxLocation): static
    {
        $this->crimsonCalyxLocation = $crimsonCalyxLocation;

        return $this;
    }

    public function getTraceMats(): ?TraceMats
    {
        return $this->traceMats;
    }

    public function setTraceMats(?TraceMats $traceMats): static
    {
        // unset the owning side of the relation if necessary
        if ($traceMats === null && $this->traceMats !== null) {
            $this->traceMats->setTraceMatsCrimsonCalyx(null);
        }

        // set the owning side of the relation if necessary
        if ($traceMats !== null && $traceMats->getTraceMatsCrimsonCalyx() !== $this) {
            $traceMats->setTraceMatsCrimsonCalyx($this);
        }

        $this->traceMats = $traceMats;

        return $this;
    }
}
