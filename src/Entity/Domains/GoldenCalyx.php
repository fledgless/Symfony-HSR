<?php

namespace App\Entity\Domains;

use App\Entity\Enemies\NormalEnemy;
use App\Entity\Location;
use App\Entity\Materials\AscensionMats;
use App\Repository\Domains\GoldenCalyxRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GoldenCalyxRepository::class)]
class GoldenCalyx
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
    #[ORM\ManyToMany(targetEntity: NormalEnemy::class, inversedBy: 'goldenCalyxes')]
    private Collection $enemies;

    /**
     * @var Collection<int, AscensionMats>
     */
    #[ORM\ManyToMany(targetEntity: AscensionMats::class, inversedBy: 'goldenCalyxes')]
    private Collection $ascMats;

    #[ORM\ManyToOne(inversedBy: 'goldenCalyxes')]
    private ?Location $location = null;

    public function __construct()
    {
        $this->enemies = new ArrayCollection();
        $this->ascMats = new ArrayCollection();
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
        }
        return $this;
    }

    public function removeAscMat(AscensionMats $ascMat): static
    {
        $this->ascMats->removeElement($ascMat);
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
}
