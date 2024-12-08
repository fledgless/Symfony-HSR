<?php

namespace App\Entity;

use App\Repository\BaseCharacterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

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

    public function __construct()
    {
        $this->characterIcons = new ArrayCollection();
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

    public function setcCharacterSlug(string $characterSlug): static
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
}