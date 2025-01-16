<?php

namespace App\Entity\Domains;

use App\Entity\Enemies\NormalEnemy;
use App\Entity\Location;
use App\Entity\Materials\TraceMats;
use App\Repository\Domains\CrimsonCalyxRepository;
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
    private ?string $name = null;

    /**
     * @var Collection<int, NormalEnemy>
     */
    #[ORM\ManyToMany(targetEntity: NormalEnemy::class, inversedBy: 'crimsonCalyxes')]
    private Collection $enemies;

    #[ORM\ManyToOne(inversedBy: 'crimsonCalyxes')]
    private ?Location $location = null;

    #[ORM\OneToOne(mappedBy: 'crimsonCalyx', cascade: ['persist', 'remove'])]
    private ?TraceMats $traceMats = null;

    public function __construct()
    {
        $this->enemies = new ArrayCollection();
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

    public function getLocation(): ?Location
    {
        return $this->location;
    }

    public function setLocation(?Location $location): static
    {
        $this->location = $location;
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
            $this->traceMats->setCrimsonCalyx(null);
        }
        // set the owning side of the relation if necessary
        if ($traceMats !== null && $traceMats->getCrimsonCalyx() !== $this) {
            $traceMats->setCrimsonCalyx($this);
        }
        $this->traceMats = $traceMats;
        return $this;
    }
}
