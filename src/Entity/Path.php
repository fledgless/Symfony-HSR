<?php

namespace App\Entity;

use App\Repository\PathRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PathRepository::class)]
class Path
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $pathName = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Media $pathIcon = null;

    /**
     * @var Collection<int, BaseCharacter>
     */
    #[ORM\OneToMany(targetEntity: BaseCharacter::class, mappedBy: 'characterPath')]
    private Collection $characters;

    /**
     * @var Collection<int, LightCone>
     */
    #[ORM\OneToMany(targetEntity: LightCone::class, mappedBy: 'lcPath')]
    private Collection $lightCones;

    /**
     * @var Collection<int, TraceMats>
     */
    #[ORM\OneToMany(targetEntity: TraceMats::class, mappedBy: 'traceMatsPath')]
    private Collection $traceMats;

    public function __construct()
    {
        $this->characters = new ArrayCollection();
        $this->lightCones = new ArrayCollection();
        $this->traceMats = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->pathName;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPathName(): ?string
    {
        return $this->pathName;
    }

    public function setPathName(string $pathName): static
    {
        $this->pathName = $pathName;

        return $this;
    }

    public function getPathIcon(): ?Media
    {
        return $this->pathIcon;
    }

    public function setPathIcon(?Media $pathIcon): static
    {
        $this->pathIcon = $pathIcon;

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
            $character->setCharacterPath($this);
        }

        return $this;
    }

    public function removeCharacter(BaseCharacter $character): static
    {
        if ($this->characters->removeElement($character)) {
            // set the owning side to null (unless already changed)
            if ($character->getCharacterPath() === $this) {
                $character->setCharacterPath(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, LightCone>
     */
    public function getLightCones(): Collection
    {
        return $this->lightCones;
    }

    public function addLightCone(LightCone $lightCone): static
    {
        if (!$this->lightCones->contains($lightCone)) {
            $this->lightCones->add($lightCone);
            $lightCone->setLcPath($this);
        }

        return $this;
    }

    public function removeLightCone(LightCone $lightCone): static
    {
        if ($this->lightCones->removeElement($lightCone)) {
            // set the owning side to null (unless already changed)
            if ($lightCone->getLcPath() === $this) {
                $lightCone->setLcPath(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, TraceMats>
     */
    public function getTraceMats(): Collection
    {
        return $this->traceMats;
    }

    public function addTraceMat(TraceMats $traceMat): static
    {
        if (!$this->traceMats->contains($traceMat)) {
            $this->traceMats->add($traceMat);
            $traceMat->setTraceMatsPath($this);
        }

        return $this;
    }

    public function removeTraceMat(TraceMats $traceMat): static
    {
        if ($this->traceMats->removeElement($traceMat)) {
            // set the owning side to null (unless already changed)
            if ($traceMat->getTraceMatsPath() === $this) {
                $traceMat->setTraceMatsPath(null);
            }
        }

        return $this;
    }
}
