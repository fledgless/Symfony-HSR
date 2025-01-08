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
    private ?string $stagnantShadowName = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Media $stagnantShadowIcon = null;

    #[ORM\OneToOne(inversedBy: 'stagnantShadow', cascade: ['persist', 'remove'])]
    private ?EliteEnemy $stagnantShadowBoss = null;

    #[ORM\ManyToOne(inversedBy: 'stagnantShadows')]
    private ?Location $stagnantShadowLocation = null;

    #[ORM\OneToOne(mappedBy: 'bossMatStagnantShadow', cascade: ['persist', 'remove'])]
    private ?BossMat $bossMat = null;

    public function __toString()
    {
        return $this->stagnantShadowName;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStagnantShadowName(): ?string
    {
        return $this->stagnantShadowName;
    }

    public function setStagnantShadowName(string $stagnantShadowName): static
    {
        $this->stagnantShadowName = $stagnantShadowName;

        return $this;
    }

    public function getStagnantShadowIcon(): ?Media
    {
        return $this->stagnantShadowIcon;
    }

    public function setStagnantShadowIcon(?Media $stagnantShadowIcon): static
    {
        $this->stagnantShadowIcon = $stagnantShadowIcon;

        return $this;
    }

    public function getStagnantShadowBoss(): ?EliteEnemy
    {
        return $this->stagnantShadowBoss;
    }

    public function setStagnantShadowBoss(?EliteEnemy $stagnantShadowBoss): static
    {
        $this->stagnantShadowBoss = $stagnantShadowBoss;

        return $this;
    }

    public function getStagnantShadowLocation(): ?Location
    {
        return $this->stagnantShadowLocation;
    }

    public function setStagnantShadowLocation(?Location $stagnantShadowLocation): static
    {
        $this->stagnantShadowLocation = $stagnantShadowLocation;

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
            $this->bossMat->setBossMatStagnantShadow(null);
        }

        // set the owning side of the relation if necessary
        if ($bossMat !== null && $bossMat->getBossMatStagnantShadow() !== $this) {
            $bossMat->setBossMatStagnantShadow($this);
        }

        $this->bossMat = $bossMat;

        return $this;
    }
}
