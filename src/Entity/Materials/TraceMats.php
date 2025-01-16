<?php

namespace App\Entity\Materials;

use App\Entity\Characters\BaseCharacter;
use App\Entity\Domains\CrimsonCalyx;
use App\Entity\LightCone;
use App\Entity\Media;
use App\Entity\Path;
use App\Repository\Materials\TraceMatsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TraceMatsRepository::class)]
class TraceMats
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $fourStarName = null;

    #[ORM\Column(length: 255)]
    private ?string $threeStarName = null;

    #[ORM\Column(length: 255)]
    private ?string $twoStarName = null;

    #[ORM\Column]
    private ?bool $released = null;

    #[ORM\Column]
    private ?bool $announced = null;

    /**
     * @var Collection<int, Media>
     */
    #[ORM\ManyToMany(targetEntity: Media::class)]
    private Collection $icons;

    #[ORM\ManyToOne(inversedBy: 'traceMats')]
    private ?Path $path = null;

    #[ORM\OneToOne(inversedBy: 'traceMats', cascade: ['persist', 'remove'])]
    private ?CrimsonCalyx $crimsonCalyx = null;

    /**
     * @var Collection<int, LightCone>
     */
    #[ORM\OneToMany(targetEntity: LightCone::class, mappedBy: 'traceMats')]
    private Collection $lightCones;

    /**
     * @var Collection<int, BaseCharacter>
     */
    #[ORM\OneToMany(targetEntity: BaseCharacter::class, mappedBy: 'traceMats')]
    private Collection $characters;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    public function __construct()
    {
        $this->icons = new ArrayCollection();
        $this->lightCones = new ArrayCollection();
        $this->characters = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->fourStarName;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFourStarName(): ?string
    {
        return $this->fourStarName;
    }

    public function setFourStarName(string $fourStarName): static
    {
        $this->fourStarName = $fourStarName;
        return $this;
    }

    public function getThreeStarName(): ?string
    {
        return $this->threeStarName;
    }

    public function setThreeStarName(string $threeStarName): static
    {
        $this->threeStarName = $threeStarName;
        return $this;
    }

    public function getTwoStarName(): ?string
    {
        return $this->twoStarName;
    }

    public function setTwoStarName(string $twoStarName): static
    {
        $this->twoStarName = $twoStarName;
        return $this;
    }

    public function isReleased(): ?bool
    {
        return $this->released;
    }

    public function setReleased(bool $released): static
    {
        $this->released = $released;
        return $this;
    }

    public function isAnnounced(): ?bool
    {
        return $this->announced;
    }

    public function setAnnounced(bool $announced): static
    {
        $this->announced = $announced;
        return $this;
    }

    /**
     * @return Collection<int, Media>
     */
    public function getIcons(): Collection
    {
        return $this->icons;
    }

    public function addIcon(Media $icon): static
    {
        if (!$this->icons->contains($icon)) {
            $this->icons->add($icon);
        }
        return $this;
    }

    public function removeIcon(Media $icon): static
    {
        $this->icons->removeElement($icon);
        return $this;
    }

    public function getPath(): ?Path
    {
        return $this->path;
    }

    public function setPath(?Path $path): static
    {
        $this->path = $path;
        return $this;
    }

    public function getCrimsonCalyc(): ?CrimsonCalyx
    {
        return $this->crimsonCalyx;
    }

    public function setCrimsonCalyx(?CrimsonCalyx $crimsonCalyx): static
    {
        $this->crimsonCalyx = $crimsonCalyx;
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
            $lightCone->setTraceMats($this);
        }
        return $this;
    }

    public function removeLightCone(LightCone $lightCone): static
    {
        if ($this->lightCones->removeElement($lightCone)) {
            // set the owning side to null (unless already changed)
            if ($lightCone->getTraceMats() === $this) {
                $lightCone->setTraceMats(null);
            }
        }
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
            $character->setTraceMats($this);
        }
        return $this;
    }

    public function removeCharacter(BaseCharacter $character): static
    {
        if ($this->characters->removeElement($character)) {
            // set the owning side to null (unless already changed)
            if ($character->getTraceMats() === $this) {
                $character->setTraceMats(null);
            }
        }
        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;
        return $this;
    }
}
