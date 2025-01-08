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
use App\Repository\BaseCharacterRepository;
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
    private ?string $characterName = null;

    #[ORM\Column(length: 255)]
    private ?string $characterSlug = null;

    #[ORM\Column(length: 255)]
    private ?string $characterRarity = null;

    #[ORM\ManyToOne(inversedBy: 'characters')]
    private ?Path $characterPath = null;

    #[ORM\ManyToOne(inversedBy: 'characters')]
    private ?Type $characterType = null;

    #[ORM\OneToOne(inversedBy: 'characterName', cascade: ['persist', 'remove'])]
    private ?CharacterEidolons $eidolons = null;

    /**
     * @var Collection<int, Media>
     */
    #[ORM\ManyToMany(targetEntity: Media::class)]
    private Collection $characterIcons;

    #[ORM\Column]
    private ?bool $characterReleased = false;

    #[ORM\Column]
    private ?bool $characterAnnounced = false;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $characterReleaseDate = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $characterReleaseVersion = null;

    #[ORM\ManyToOne(inversedBy: 'baseCharacters')]
    private ?AscensionMats $characterAscMats = null;

    #[ORM\ManyToOne(inversedBy: 'characters')]
    private ?BossMat $characterBossMat = null;

    #[ORM\ManyToOne(inversedBy: 'characters')]
    private ?WeeklyMat $characterWeeklyMat = null;

    #[ORM\ManyToOne(inversedBy: 'characters')]
    private ?TraceMats $characterTraceMats = null;

    /**
     * @var Collection<int, CharacterVoiceline>
     */
    #[ORM\OneToMany(targetEntity: CharacterVoiceline::class, mappedBy: 'voicelineCharacter')]
    private Collection $characterVoicelines;

    #[ORM\OneToOne(mappedBy: 'characterStoriesCharacter', cascade: ['persist', 'remove'])]
    private ?CharacterStories $characterStories = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $characterBannerName = null;

    #[ORM\ManyToOne(inversedBy: 'locationCharacters')]
    private ?Location $location = null;

    public function __construct()
    {
        $this->characterIcons = new ArrayCollection();
        $this->characterVoicelines = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->characterName;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCharacterName(): ?string
    {
        return $this->characterName;
    }

    public function setCharacterName(string $characterName): static
    {
        $this->characterName = $characterName;

        return $this;
    }

    public function getCharacterSlug(): ?string
    {
        return $this->characterSlug;
    }

    public function setCharacterSlug(string $characterSlug): static
    {
        $this->characterSlug = $characterSlug;

        return $this;
    }

    public function getCharacterRarity(): ?string
    {
        return $this->characterRarity;
    }

    public function setCharacterRarity(string $characterRarity): static
    {
        $this->characterRarity = $characterRarity;

        return $this;
    }

    public function getCharacterPath(): ?Path
    {
        return $this->characterPath;
    }

    public function setCharacterPath(?Path $characterPath): static
    {
        $this->characterPath = $characterPath;

        return $this;
    }

    public function getCharacterType(): ?Type
    {
        return $this->characterType;
    }

    public function setCharacterType(?Type $characterType): static
    {
        $this->characterType = $characterType;

        return $this;
    }

    public function getEidolons(): ?CharacterEidolons
    {
        return $this->eidolons;
    }

    public function setEidolons(?CharacterEidolons $eidolons): static
    {
        $this->eidolons = $eidolons;

        return $this;
    }

    /**
     * @return Collection<int, Media>
     */
    public function getCharacterIcons(): Collection
    {
        return $this->characterIcons;
    }

    public function addCharacterIcon(Media $characterIcon): static
    {
        if (!$this->characterIcons->contains($characterIcon)) {
            $this->characterIcons->add($characterIcon);
        }

        return $this;
    }

    public function removeCharacterIcon(Media $characterIcon): static
    {
        $this->characterIcons->removeElement($characterIcon);

        return $this;
    }

    public function isCharacterReleased(): ?bool
    {
        return $this->characterReleased;
    }

    public function setCharacterReleased(bool $characterReleased): static
    {
        $this->characterReleased = $characterReleased;

        return $this;
    }

    public function isCharacterAnnounced(): ?bool
    {
        return $this->characterAnnounced;
    }

    public function setCharacterAnnounced(bool $characterAnnounced): static
    {
        $this->characterAnnounced = $characterAnnounced;

        return $this;
    }

    public function getCharacterReleaseDate(): ?\DateTimeInterface
    {
        return $this->characterReleaseDate;
    }

    public function setCharacterReleaseDate(?\DateTimeInterface $characterReleaseDate): static
    {
        $this->characterReleaseDate = $characterReleaseDate;

        return $this;
    }

    public function getCharacterReleaseVersion(): ?string
    {
        return $this->characterReleaseVersion;
    }

    public function setCharacterReleaseVersion(string $characterReleaseVersion): static
    {
        $this->characterReleaseVersion = $characterReleaseVersion;

        return $this;
    }

    public function getCharacterAscMats(): ?AscensionMats
    {
        return $this->characterAscMats;
    }

    public function setCharacterAscMats(?AscensionMats $characterAscMats): static
    {
        $this->characterAscMats = $characterAscMats;

        return $this;
    }

    public function getCharacterBossMat(): ?BossMat
    {
        return $this->characterBossMat;
    }

    public function setCharacterBossMat(?BossMat $characterBossMat): static
    {
        $this->characterBossMat = $characterBossMat;

        return $this;
    }

    public function getCharacterWeeklyMat(): ?WeeklyMat
    {
        return $this->characterWeeklyMat;
    }

    public function setCharacterWeeklyMat(?WeeklyMat $characterWeeklyMat): static
    {
        $this->characterWeeklyMat = $characterWeeklyMat;

        return $this;
    }

    public function getCharacterTraceMats(): ?TraceMats
    {
        return $this->characterTraceMats;
    }

    public function setCharacterTraceMats(?TraceMats $characterTraceMats): static
    {
        $this->characterTraceMats = $characterTraceMats;

        return $this;
    }

    /**
     * @return Collection<int, CharacterVoiceline>
     */
    public function getCharacterVoicelines(): Collection
    {
        return $this->characterVoicelines;
    }

    public function addCharacterVoiceline(CharacterVoiceline $characterVoiceline): static
    {
        if (!$this->characterVoicelines->contains($characterVoiceline)) {
            $this->characterVoicelines->add($characterVoiceline);
            $characterVoiceline->setVoicelineCharacter($this);
        }

        return $this;
    }

    public function removeCharacterVoiceline(CharacterVoiceline $characterVoiceline): static
    {
        if ($this->characterVoicelines->removeElement($characterVoiceline)) {
            // set the owning side to null (unless already changed)
            if ($characterVoiceline->getVoicelineCharacter() === $this) {
                $characterVoiceline->setVoicelineCharacter(null);
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
            $this->characterStories->setCharacterStoriesCharacter(null);
        }

        // set the owning side of the relation if necessary
        if ($characterStories !== null && $characterStories->getCharacterStoriesCharacter() !== $this) {
            $characterStories->setCharacterStoriesCharacter($this);
        }

        $this->characterStories = $characterStories;

        return $this;
    }

    public function getCharacterBannerName(): ?string
    {
        return $this->characterBannerName;
    }

    public function setCharacterBannerName(?string $characterBannerName): static
    {
        $this->characterBannerName = $characterBannerName;

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