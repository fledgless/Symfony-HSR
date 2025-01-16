<?php

namespace App\Entity\Characters;

use App\Entity\Location;
use App\Entity\Materials\AscensionMats;
use App\Entity\Materials\BossMat;
use App\Entity\Materials\TraceMats;
use App\Entity\Materials\WeeklyMat;
use App\Entity\Media;
use App\Entity\Path;
use App\Entity\Type;
use App\Repository\Characters\BaseCharacterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinTable;

#[ORM\Entity(repositoryClass: BaseCharacterRepository::class)]
class BaseCharacter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column(length: 255)]
    private ?string $rarity = null;

    #[ORM\ManyToOne(inversedBy: 'characters')]
    private ?Path $path = null;

    #[ORM\ManyToOne(inversedBy: 'characters')]
    private ?Type $type = null;

    /**
     * @var Collection<int, Media>
     */
    #[ORM\ManyToMany(targetEntity: Media::class)]
    private Collection $icons;

    #[ORM\Column]
    private ?bool $released = false;

    #[ORM\Column]
    private ?bool $announced = false;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $releaseDate = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $releaseVersion = null;

    #[ORM\ManyToOne(inversedBy: 'characters')]
    private ?AscensionMats $ascMats = null;

    #[ORM\ManyToOne(inversedBy: 'characters')]
    private ?BossMat $bossMat = null;

    #[ORM\ManyToOne(inversedBy: 'characters')]
    private ?WeeklyMat $weeklyMat = null;

    #[ORM\ManyToOne(inversedBy: 'characters')]
    private ?TraceMats $traceMats = null;

    /**
     * @var Collection<int, CharacterVoiceline>
     */
    #[ORM\OneToMany(targetEntity: CharacterVoiceline::class, mappedBy: 'character')]
    private Collection $voicelines;

    #[ORM\OneToOne(mappedBy: 'character', cascade: ['persist', 'remove'])]
    private ?CharacterStories $characterStories = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $bannerName = null;

    #[ORM\ManyToOne(inversedBy: 'locationCharacters')]
    private ?Location $location = null;

    public function __construct()
    {
        $this->icons = new ArrayCollection();
        $this->voicelines = new ArrayCollection();
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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;
        return $this;
    }

    public function getRarity(): ?string
    {
        return $this->rarity;
    }

    public function setRarity(string $rarity): static
    {
        $this->rarity = $rarity;
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

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): static
    {
        $this->type = $type;
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

    public function getReleaseDate(): ?\DateTimeInterface
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(?\DateTimeInterface $releaseDate): static
    {
        $this->releaseDate = $releaseDate;
        return $this;
    }

    public function getReleaseVersion(): ?string
    {
        return $this->releaseVersion;
    }

    public function setReleaseVersion(string $releaseVersion): static
    {
        $this->releaseVersion = $releaseVersion;
        return $this;
    }

    public function getAscMats(): ?AscensionMats
    {
        return $this->ascMats;
    }

    public function setAscMats(?AscensionMats $ascMats): static
    {
        $this->ascMats = $ascMats;
        return $this;
    }

    public function getBossMat(): ?BossMat
    {
        return $this->bossMat;
    }

    public function setBossMat(?BossMat $bossMat): static
    {
        $this->bossMat = $bossMat;
        return $this;
    }

    public function getWeeklyMat(): ?WeeklyMat
    {
        return $this->weeklyMat;
    }

    public function setWeeklyMat(?WeeklyMat $weeklyMat): static
    {
        $this->weeklyMat = $weeklyMat;
        return $this;
    }

    public function getTraceMats(): ?TraceMats
    {
        return $this->traceMats;
    }

    public function setTraceMats(?TraceMats $traceMats): static
    {
        $this->traceMats = $traceMats;
        return $this;
    }

    /**
     * @return Collection<int, CharacterVoiceline>
     */
    public function getVoicelines(): Collection
    {
        return $this->voicelines;
    }

    public function addVoiceline(CharacterVoiceline $voiceline): static
    {
        if (!$this->voicelines->contains($voiceline)) {
            $this->voicelines->add($voiceline);
            $voiceline->setCharacter($this);
        }
        return $this;
    }

    public function removeVoiceline(CharacterVoiceline $voiceline): static
    {
        if ($this->voicelines->removeElement($voiceline)) {
            // set the owning side to null (unless already changed)
            if ($voiceline->getCharacter() === $this) {
                $voiceline->setCharacter(null);
            }
        }
        return $this;
    }

    public function getCharacterStories(): ?CharacterStories
    {
        return $this->characterStories;
    }

    public function setCharacterStories(?CharacterStories $characterStories): static
    {
        // unset the owning side of the relation if necessary
        if ($characterStories === null && $this->characterStories !== null) {
            $this->characterStories->setCharacter(null);
        }
        // set the owning side of the relation if necessary
        if ($characterStories !== null && $characterStories->getCharacter() !== $this) {
            $characterStories->setCharacter($this);
        }
        $this->characterStories = $characterStories;
        return $this;
    }

    public function getBannerName(): ?string
    {
        return $this->bannerName;
    }

    public function setBannerName(?string $bannerName): static
    {
        $this->bannerName = $bannerName;
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