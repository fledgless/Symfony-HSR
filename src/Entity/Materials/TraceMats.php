<?php

namespace App\Entity\Materials;

use App\Entity\Characters\BaseCharacter;
use App\Entity\Domains\CrimsonCalyx;
use App\Entity\LightCone;
use App\Entity\Media;
use App\Entity\Path;
use App\Repository\TraceMatsRepository;
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
    private ?string $traceMatsFourStarName = null;

    #[ORM\Column(length: 255)]
    private ?string $traceMatsThreeStarName = null;

    #[ORM\Column(length: 255)]
    private ?string $traceMatsTwoStarName = null;

    #[ORM\Column]
    private ?bool $traceMatsReleased = null;

    #[ORM\Column]
    private ?bool $traceMatsAnnounced = null;

    /**
     * @var Collection<int, Media>
     */
    #[ORM\ManyToMany(targetEntity: Media::class)]
    private Collection $traceMatsIcons;

    #[ORM\ManyToOne(inversedBy: 'traceMats')]
    private ?Path $traceMatsPath = null;

    #[ORM\OneToOne(inversedBy: 'traceMats', cascade: ['persist', 'remove'])]
    private ?CrimsonCalyx $traceMatsCrimsonCalyx = null;

    /**
     * @var Collection<int, LightCone>
     */
    #[ORM\OneToMany(targetEntity: LightCone::class, mappedBy: 'lcTraceMats')]
    private Collection $lightCones;

    /**
     * @var Collection<int, BaseCharacter>
     */
    #[ORM\OneToMany(targetEntity: BaseCharacter::class, mappedBy: 'characterTraceMats')]
    private Collection $characters;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    public function __construct()
    {
        $this->traceMatsIcons = new ArrayCollection();
        $this->lightCones = new ArrayCollection();
        $this->characters = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->traceMatsFourStarName;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTraceMatsFourStarName(): ?string
    {
        return $this->traceMatsFourStarName;
    }

    public function setTraceMatsFourStarName(string $traceMatsFourStarName): static
    {
        $this->traceMatsFourStarName = $traceMatsFourStarName;

        return $this;
    }

    public function getTraceMatsThreeStarName(): ?string
    {
        return $this->traceMatsThreeStarName;
    }

    public function setTraceMatsThreeStarName(string $traceMatsThreeStarName): static
    {
        $this->traceMatsThreeStarName = $traceMatsThreeStarName;

        return $this;
    }

    public function getTraceMatsTwoStarName(): ?string
    {
        return $this->traceMatsTwoStarName;
    }

    public function setTraceMatsTwoStarName(string $traceMatsTwoStarName): static
    {
        $this->traceMatsTwoStarName = $traceMatsTwoStarName;

        return $this;
    }

    public function isTraceMatsReleased(): ?bool
    {
        return $this->traceMatsReleased;
    }

    public function setTraceMatsReleased(bool $traceMatsReleased): static
    {
        $this->traceMatsReleased = $traceMatsReleased;

        return $this;
    }

    public function isTraceMatsAnnounced(): ?bool
    {
        return $this->traceMatsAnnounced;
    }

    public function setTraceMatsAnnounced(bool $traceMatsAnnounced): static
    {
        $this->traceMatsAnnounced = $traceMatsAnnounced;

        return $this;
    }

    /**
     * @return Collection<int, Media>
     */
    public function getTraceMatsIcons(): Collection
    {
        return $this->traceMatsIcons;
    }

    public function addTraceMatsIcon(Media $traceMatsIcon): static
    {
        if (!$this->traceMatsIcons->contains($traceMatsIcon)) {
            $this->traceMatsIcons->add($traceMatsIcon);
        }

        return $this;
    }

    public function removeTraceMatsIcon(Media $traceMatsIcon): static
    {
        $this->traceMatsIcons->removeElement($traceMatsIcon);

        return $this;
    }

    public function getTraceMatsPath(): ?Path
    {
        return $this->traceMatsPath;
    }

    public function setTraceMatsPath(?Path $traceMatsPath): static
    {
        $this->traceMatsPath = $traceMatsPath;

        return $this;
    }

    public function getTraceMatsCrimsonCalyx(): ?CrimsonCalyx
    {
        return $this->traceMatsCrimsonCalyx;
    }

    public function setTraceMatsCrimsonCalyx(?CrimsonCalyx $traceMatsCrimsonCalyx): static
    {
        $this->traceMatsCrimsonCalyx = $traceMatsCrimsonCalyx;

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
            $lightCone->setLcTraceMats($this);
        }

        return $this;
    }

    public function removeLightCone(LightCone $lightCone): static
    {
        if ($this->lightCones->removeElement($lightCone)) {
            // set the owning side to null (unless already changed)
            if ($lightCone->getLcTraceMats() === $this) {
                $lightCone->setLcTraceMats(null);
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
            $character->setCharacterTraceMats($this);
        }

        return $this;
    }

    public function removeCharacter(BaseCharacter $character): static
    {
        if ($this->characters->removeElement($character)) {
            // set the owning side to null (unless already changed)
            if ($character->getCharacterTraceMats() === $this) {
                $character->setCharacterTraceMats(null);
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
