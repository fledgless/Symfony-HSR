<?php

namespace App\Entity;

use App\Entity\Build\LightCone;
use App\Entity\Characters\BaseCharacter;
use App\Entity\Materials\TraceMats;
use App\Repository\PathRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PathRepository::class)]
class Path
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    /**
     * @var Collection<int, BaseCharacter>
     */
    #[ORM\OneToMany(targetEntity: BaseCharacter::class, mappedBy: 'path')]
    private Collection $characters;

    /**
     * @var Collection<int, LightCone>
     */
    #[ORM\OneToMany(targetEntity: LightCone::class, mappedBy: 'path')]
    private Collection $lightCones;

    /**
     * @var Collection<int, TraceMats>
     */
    #[ORM\OneToMany(targetEntity: TraceMats::class, mappedBy: 'traceMatsPath')]
    private Collection $traceMats;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $aeon = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $pathDesc = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $gameplayDesc = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $dataBankEntry = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pathFilename = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $aeonFilename = null;

    public function __construct()
    {
        $this->characters = new ArrayCollection();
        $this->lightCones = new ArrayCollection();
        $this->traceMats = new ArrayCollection();
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
            $character->setPath($this);
        }
        return $this;
    }

    public function removeCharacter(BaseCharacter $character): static
    {
        if ($this->characters->removeElement($character)) {
            // set the owning side to null (unless already changed)
            if ($character->getPath() === $this) {
                $character->setPath(null);
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
            $lightCone->setPath($this);
        }
        return $this;
    }

    public function removeLightCone(LightCone $lightCone): static
    {
        if ($this->lightCones->removeElement($lightCone)) {
            // set the owning side to null (unless already changed)
            if ($lightCone->getPath() === $this) {
                $lightCone->setPath(null);
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
            $traceMat->setPath($this);
        }
        return $this;
    }

    public function removeTraceMat(TraceMats $traceMat): static
    {
        if ($this->traceMats->removeElement($traceMat)) {
            // set the owning side to null (unless already changed)
            if ($traceMat->getPath() === $this) {
                $traceMat->setPath(null);
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

    public function getAeon(): ?string
    {
        return $this->aeon;
    }

    public function setAeon(?string $aeon): static
    {
        $this->aeon = $aeon;

        return $this;
    }

    public function getPathDesc(): ?string
    {
        return $this->pathDesc;
    }

    public function setPathDesc(?string $pathDesc): static
    {
        $this->pathDesc = $pathDesc;

        return $this;
    }

    public function getGameplayDesc(): ?string
    {
        return $this->gameplayDesc;
    }

    public function setGameplayDesc(?string $gameplayDesc): static
    {
        $this->gameplayDesc = $gameplayDesc;

        return $this;
    }

    public function getDataBankEntry(): ?string
    {
        return $this->dataBankEntry;
    }

    public function setDataBankEntry(?string $dataBankEntry): static
    {
        $this->dataBankEntry = $dataBankEntry;

        return $this;
    }

    public function getPathFilename(): ?string
    {
        return $this->pathFilename;
    }

    public function setPathFilename(?string $pathFilename): static
    {
        $this->pathFilename = $pathFilename;

        return $this;
    }

    public function getAeonFilename(): ?string
    {
        return $this->aeonFilename;
    }

    public function setAeonFilename(?string $aeonFilename): static
    {
        $this->aeonFilename = $aeonFilename;

        return $this;
    }
}
