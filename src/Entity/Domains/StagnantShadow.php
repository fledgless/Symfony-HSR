<?php

namespace App\Entity\Domains;

use App\Entity\Enemies\EliteEnemy;
use App\Entity\Location;
use App\Entity\Materials\BossMat;
use App\Entity\Media;
use App\Repository\Domains\StagnantShadowRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StagnantShadowRepository::class)]
class StagnantShadow
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Media $icon = null;

    #[ORM\OneToOne(inversedBy: 'stagnantShadow', cascade: ['persist', 'remove'])]
    private ?EliteEnemy $boss = null;

    #[ORM\ManyToOne(inversedBy: 'stagnantShadows')]
    private ?Location $location = null;

    #[ORM\OneToOne(mappedBy: 'bossMatStagnantShadow', cascade: ['persist', 'remove'])]
    private ?BossMat $bossMat = null;

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

    public function getBoss(): ?EliteEnemy
    {
        return $this->boss;
    }

    public function setBoss(?EliteEnemy $boss): static
    {
        $this->boss = $boss;
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

    public function getBossMat(): ?BossMat
    {
        return $this->bossMat;
    }

    public function setBossMat(?BossMat $bossMat): static
    {
        // unset the owning side of the relation if necessary
        if ($bossMat === null && $this->bossMat !== null) {
            $this->bossMat->setStagnantShadow(null);
        }
        // set the owning side of the relation if necessary
        if ($bossMat !== null && $bossMat->getStagnantShadow() !== $this) {
            $bossMat->setStagnantShadow($this);
        }
        $this->bossMat = $bossMat;
        return $this;
    }
}
