<?php

namespace App\Entity\Domains;

use App\Repository\GoldenCalyxRepository;
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
    private ?string $goldenCalyxName = null;

    /**
     * @var Collection<int, NormalEnemy>
     */
    #[ORM\ManyToMany(targetEntity: NormalEnemy::class, inversedBy: 'goldenCalyxes')]
    private Collection $goldenCalyxEnemies;

    /**
     * @var Collection<int, AscensionMats>
     */
    #[ORM\ManyToMany(targetEntity: AscensionMats::class, inversedBy: 'goldenCalyxes')]
    private Collection $goldenCalyxAscMats;

    #[ORM\ManyToOne(inversedBy: 'goldenCalyxes')]
    private ?Location $goldenCalyxLocation = null;

    public function __construct()
    {
        $this->goldenCalyxEnemies = new ArrayCollection();
        $this->goldenCalyxAscMats = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->goldenCalyxName;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGoldenCalyxName(): ?string
    {
        return $this->goldenCalyxName;
    }

    public function setGoldenCalyxName(string $goldenCalyxName): static
    {
        $this->goldenCalyxName = $goldenCalyxName;

        return $this;
    }

    /**
     * @return Collection<int, NormalEnemy>
     */
    public function getGoldenCalyxEnemies(): Collection
    {
        return $this->goldenCalyxEnemies;
    }

    public function addGoldenCalyxEnemy(NormalEnemy $goldenCalyxEnemy): static
    {
        if (!$this->goldenCalyxEnemies->contains($goldenCalyxEnemy)) {
            $this->goldenCalyxEnemies->add($goldenCalyxEnemy);
        }

        return $this;
    }

    public function removeGoldenCalyxEnemy(NormalEnemy $goldenCalyxEnemy): static
    {
        $this->goldenCalyxEnemies->removeElement($goldenCalyxEnemy);

        return $this;
    }

    /**
     * @return Collection<int, AscensionMats>
     */
    public function getGoldenCalyxAscMats(): Collection
    {
        return $this->goldenCalyxAscMats;
    }

    public function addGoldenCalyxAscMat(AscensionMats $goldenCalyxAscMat): static
    {
        if (!$this->goldenCalyxAscMats->contains($goldenCalyxAscMat)) {
            $this->goldenCalyxAscMats->add($goldenCalyxAscMat);
        }

        return $this;
    }

    public function removeGoldenCalyxAscMat(AscensionMats $goldenCalyxAscMat): static
    {
        $this->goldenCalyxAscMats->removeElement($goldenCalyxAscMat);

        return $this;
    }

    public function getGoldenCalyxLocation(): ?Location
    {
        return $this->goldenCalyxLocation;
    }

    public function setGoldenCalyxLocation(?Location $goldenCalyxLocation): static
    {
        $this->goldenCalyxLocation = $goldenCalyxLocation;

        return $this;
    }
}
