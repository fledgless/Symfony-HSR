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
    private ?string $echoOfWarName = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Media $echoOfWarIcon = null;

    #[ORM\OneToOne(inversedBy: 'echoOfWar', cascade: ['persist', 'remove'])]
    private ?EchosBoss $echoOfWarBoss = null;

    #[ORM\ManyToOne(inversedBy: 'echoOfWars')]
    private ?Location $echoOfWarLocation = null;

    #[ORM\OneToOne(mappedBy: 'weeklyMatEchoOfWar', cascade: ['persist', 'remove'])]
    private ?WeeklyMat $weeklyMat = null;

    public function __toString()
    {
        return $this->echoOfWarName;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEchoOfWarName(): ?string
    {
        return $this->echoOfWarName;
    }

    public function setEchoOfWarName(string $echoOfWarName): static
    {
        $this->echoOfWarName = $echoOfWarName;

        return $this;
    }

    public function getEchoOfWarIcon(): ?Media
    {
        return $this->echoOfWarIcon;
    }

    public function setEchoOfWarIcon(?Media $echoOfWarIcon): static
    {
        $this->echoOfWarIcon = $echoOfWarIcon;

        return $this;
    }

    public function getEchoOfWarBoss(): ?EchosBoss
    {
        return $this->echoOfWarBoss;
    }

    public function setEchoOfWarBoss(?EchosBoss $echoOfWarBoss): static
    {
        $this->echoOfWarBoss = $echoOfWarBoss;

        return $this;
    }

    public function getEchoOfWarLocation(): ?Location
    {
        return $this->echoOfWarLocation;
    }

    public function setEchoOfWarLocation(?Location $echoOfWarLocation): static
    {
        $this->echoOfWarLocation = $echoOfWarLocation;

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
            $this->weeklyMat->setWeeklyMatEchoOfWar(null);
        }

        // set the owning side of the relation if necessary
        if ($weeklyMat !== null && $weeklyMat->getWeeklyMatEchoOfWar() !== $this) {
            $weeklyMat->setWeeklyMatEchoOfWar($this);
        }

        $this->weeklyMat = $weeklyMat;

        return $this;
    }
}
