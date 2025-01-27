<?php

namespace App\Entity;

use App\Repository\OrnamentExtractionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrnamentExtractionRepository::class)]
class OrnamentExtraction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    /**
     * @var Collection<int, OrnamentSet>
     */
    #[ORM\OneToMany(targetEntity: OrnamentSet::class, mappedBy: 'ornamentExtraction')]
    private Collection $ornamentSets;

    #[ORM\OneToOne(inversedBy: 'ornamentExtraction', cascade: ['persist', 'remove'])]
    private ?BossEnemy $bossEnemy = null;

    public function __construct()
    {
        $this->ornamentSets = new ArrayCollection();
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
     * @return Collection<int, OrnamentSet>
     */
    public function getOrnamentSets(): Collection
    {
        return $this->ornamentSets;
    }

    public function addOrnamentSet(OrnamentSet $ornamentSet): static
    {
        if (!$this->ornamentSets->contains($ornamentSet)) {
            $this->ornamentSets->add($ornamentSet);
            $ornamentSet->setOrnamentExtraction($this);
        }

        return $this;
    }

    public function removeOrnamentSet(OrnamentSet $ornamentSet): static
    {
        if ($this->ornamentSets->removeElement($ornamentSet)) {
            // set the owning side to null (unless already changed)
            if ($ornamentSet->getOrnamentExtraction() === $this) {
                $ornamentSet->setOrnamentExtraction(null);
            }
        }

        return $this;
    }

    public function getBossEnemy(): ?BossEnemy
    {
        return $this->bossEnemy;
    }

    public function setBossEnemy(?BossEnemy $bossEnemy): static
    {
        $this->bossEnemy = $bossEnemy;

        return $this;
    }
}
