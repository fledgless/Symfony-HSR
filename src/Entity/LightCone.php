<?php

namespace App\Entity;

use App\Entity\Materials\AscensionMats;
use App\Entity\Materials\TraceMats;
use App\Repository\LightConeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LightConeRepository::class)]
class LightCone
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

    #[ORM\ManyToOne(inversedBy: 'lightCones')]
    private ?Path $path = null;

    #[ORM\Column(nullable: true)]
    private ?int $baseAtk = null;

    #[ORM\Column(nullable: true)]
    private ?int $baseDef = null;

    #[ORM\Column(nullable: true)]
    private ?int $baseHp = null;

    /**
     * @var Collection<int, Media>
     */
    #[ORM\ManyToMany(targetEntity: Media::class)]
    private Collection $icons;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $story = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $superimpositionOne = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $superimpositionTwo = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $superimpositionThree = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $superimpositionFour = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $superimpositionFive = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $skillName = null;

    #[ORM\Column]
    private ?bool $announced = false;

    #[ORM\Column]
    private ?bool $released = false;

    #[ORM\Column(length: 255)]
    private ?string $obtainable = null;

    #[ORM\ManyToOne(inversedBy: 'lightCones')]
    private ?AscensionMats $ascMats = null;

    #[ORM\ManyToOne(inversedBy: 'lightCones')]
    private ?TraceMats $traceMats = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $releaseVersion = null;

    public function __construct()
    {
        $this->icons = new ArrayCollection();
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

    public function getBaseAtk(): ?int
    {
        return $this->baseAtk;
    }

    public function setBaseAtk(?int $baseAtk): static
    {
        $this->baseAtk = $baseAtk;
        return $this;
    }

    public function getBaseDef(): ?int
    {
        return $this->baseDef;
    }

    public function setBaseDef(?int $baseDef): static
    {
        $this->baseDef = $baseDef;
        return $this;
    }

    public function getBaseHp(): ?int
    {
        return $this->baseHp;
    }

    public function setBaseHp(?int $baseHp): static
    {
        $this->baseHp = $baseHp;
        return $this;
    }

    /**
     * @return Collection<int, Media>
     */
    public function getIcons(): Collection
    {
        return $this->icons;
    }

    public function addLcIcon(Media $icon): static
    {
        if (!$this->icons->contains($icon)) {
            $this->icons->add($icon);
        }
        return $this;
    }

    public function removeLcIcon(Media $icon): static
    {
        $this->icons->removeElement($icon);
        return $this;
    }

    public function getStory(): ?string
    {
        return $this->story;
    }

    public function setStory(?string $story): static
    {
        $this->story = $story;
        return $this;
    }

    public function getSuperimpositionOne(): ?string
    {
        return $this->superimpositionOne;
    }

    public function setSuperimpositionOne(?string $superimpositionOne): static
    {
        $this->superimpositionOne = $superimpositionOne;
        return $this;
    }

    public function getSuperimpositionTwo(): ?string
    {
        return $this->superimpositionTwo;
    }

    public function setSuperimpositionTwo(?string $superimpositionTwo): static
    {
        $this->superimpositionTwo = $superimpositionTwo;
        return $this;
    }

    public function getSuperimpositionThree(): ?string
    {
        return $this->superimpositionThree;
    }

    public function setSuperimpositionThree(string $superimpositionThree): static
    {
        $this->superimpositionThree = $superimpositionThree;
        return $this;
    }

    public function getSuperimpositionFour(): ?string
    {
        return $this->superimpositionFour;
    }

    public function setSuperimpositionFour(?string $superimpositionFour): static
    {
        $this->superimpositionFour = $superimpositionFour;
        return $this;
    }

    public function getSuperimpositionFive(): ?string
    {
        return $this->superimpositionFive;
    }

    public function setSuperimpositionFive(?string $superimpositionFive): static
    {
        $this->superimpositionFive = $superimpositionFive;
        return $this;
    }

    public function getSkillName(): ?string
    {
        return $this->skillName;
    }

    public function setSkillName(?string $skillName): static
    {
        $this->skillName = $skillName;
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

    public function isReleased(): ?bool
    {
        return $this->released;
    }

    public function setReleased(bool $released): static
    {
        $this->released = $released;
        return $this;
    }

    public function getObtainable(): ?string
    {
        return $this->obtainable;
    }

    public function setObtainable(string $obtainable): static
    {
        $this->obtainable = $obtainable;
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

    public function getTraceMats(): ?TraceMats
    {
        return $this->traceMats;
    }

    public function setTraceMats(?TraceMats $traceMats): static
    {
        $this->traceMats = $traceMats;
        return $this;
    }

    public function getReleaseVersion(): ?string
    {
        return $this->releaseVersion;
    }

    public function setReleaseVersion(?string $releaseVersion): static
    {
        $this->releaseVersion = $releaseVersion;
        return $this;
    }
}
