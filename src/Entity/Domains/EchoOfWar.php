<?php

namespace App\Entity\Domains;

use App\Entity\Enemies\EchosBoss;
use App\Entity\Location;
use App\Entity\Materials\WeeklyMat;
use App\Entity\Media;
use App\Repository\Domains\EchoOfWarRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EchoOfWarRepository::class)]
class EchoOfWar
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Media $icon = null;

    #[ORM\OneToOne(inversedBy: 'echoOfWar', cascade: ['persist', 'remove'])]
    private ?EchosBoss $boss = null;

    #[ORM\ManyToOne(inversedBy: 'echoOfWars')]
    private ?Location $location = null;

    #[ORM\OneToOne(mappedBy: 'weeklyMatEchoOfWar', cascade: ['persist', 'remove'])]
    private ?WeeklyMat $weeklyMat = null;

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

    public function setName(string $echoOfWarName): static
    {
        $this->name = $echoOfWarName;

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

    public function getBoss(): ?EchosBoss
    {
        return $this->boss;
    }

    public function setBoss(?EchosBoss $boss): static
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

    public function getWeeklyMat(): ?WeeklyMat
    {
        return $this->weeklyMat;
    }

    public function setWeeklyMat(?WeeklyMat $weeklyMat): static
    {
        // unset the owning side of the relation if necessary
        if ($weeklyMat === null && $this->weeklyMat !== null) {
            $this->weeklyMat->setEchoOfWar(null);
        }
        // set the owning side of the relation if necessary
        if ($weeklyMat !== null && $weeklyMat->getEchoOfWar() !== $this) {
            $weeklyMat->setEchoOfWar($this);
        }
        $this->weeklyMat = $weeklyMat;
        return $this;
    }
}
