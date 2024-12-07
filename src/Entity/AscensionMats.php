<?php

namespace App\Entity;

use App\Repository\AscensionMatsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AscensionMatsRepository::class)]
class AscensionMats
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $ascMatFourStarName = null;

    #[ORM\Column(length: 255)]
    private ?string $ascMatThreeStarName = null;

    #[ORM\Column(length: 255)]
    private ?string $ascMatTwoStarName = null;

    #[ORM\Column]
    private ?bool $ascMatReleased = false;

    #[ORM\Column]
    private ?bool $ascMatAnnounced = false;

    /**
     * @var Collection<int, Media>
     */
    #[ORM\ManyToMany(targetEntity: Media::class)]
    private Collection $ascMatIcons;

    /**
     * @var Collection<int, NormalEnemy>
     */
    #[ORM\ManyToMany(targetEntity: NormalEnemy::class, inversedBy: 'ascensionMats')]
    private Collection $ascMatsEnemies;

    /**
     * @var Collection<int, GoldenCalyx>
     */
    #[ORM\ManyToMany(targetEntity: GoldenCalyx::class, mappedBy: 'goldenCalyxAscMats')]
    private Collection $goldenCalyxes;

    /**
     * @var Collection<int, LightCone>
     */
    #[ORM\OneToMany(targetEntity: LightCone::class, mappedBy: 'lcAscMats')]
    private Collection $lightCones;

    /**
     * @var Collection<int, BaseCharacter>
     */
    #[ORM\OneToMany(targetEntity: BaseCharacter::class, mappedBy: 'characterAscMats')]
    private Collection $characters;

    public function __construct()
    {
        $this->ascMatIcons = new ArrayCollection();
        $this->ascMatsEnemies = new ArrayCollection();
        $this->goldenCalyxes = new ArrayCollection();
        $this->lightCones = new ArrayCollection();
        $this->characters = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->ascMatFourStarName;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAscMatFourStarName(): ?string
    {
        return $this->ascMatFourStarName;
    }

    public function setAscMatFourStarName(string $ascMatFourStarName): static
    {
        $this->ascMatFourStarName = $ascMatFourStarName;

        return $this;
    }

    public function getAscMatThreeStarName(): ?string
    {
        return $this->ascMatThreeStarName;
    }

    public function setAscMatThreeStarName(string $ascMatThreeStarName): static
    {
        $this->ascMatThreeStarName = $ascMatThreeStarName;

        return $this;
    }

    public function getAscMatTwoStarName(): ?string
    {
        return $this->ascMatTwoStarName;
    }

    public function setAscMatTwoStarName(string $ascMatTwoStarName): static
    {
        $this->ascMatTwoStarName = $ascMatTwoStarName;

        return $this;
    }

    public function isAscMatReleased(): ?bool
    {
        return $this->ascMatReleased;
    }

    public function setAscMatReleased(bool $ascMatReleased): static
    {
        $this->ascMatReleased = $ascMatReleased;

        return $this;
    }

    public function isAscMatAnnounced(): ?bool
    {
        return $this->ascMatAnnounced;
    }

    public function setAscMatAnnounced(bool $ascMatAnnounced): static
    {
        $this->ascMatAnnounced = $ascMatAnnounced;

        return $this;
    }

    /**
     * @return Collection<int, Media>
     */
    public function getAscMatIcons(): Collection
    {
        return $this->ascMatIcons;
    }

    public function addAscMatIcon(Media $ascMatIcon): static
    {
        if (!$this->ascMatIcons->contains($ascMatIcon)) {
            $this->ascMatIcons->add($ascMatIcon);
        }

        return $this;
    }

    public function removeAscMatIcon(Media $ascMatIcon): static
    {
        $this->ascMatIcons->removeElement($ascMatIcon);

        return $this;
    }

    /**
     * @return Collection<int, NormalEnemy>
     */
    public function getAscMatsEnemies(): Collection
    {
        return $this->ascMatsEnemies;
    }

    public function addAscMatsEnemy(NormalEnemy $ascMatsEnemy): static
    {
        if (!$this->ascMatsEnemies->contains($ascMatsEnemy)) {
            $this->ascMatsEnemies->add($ascMatsEnemy);
        }

        return $this;
    }

    public function removeAscMatsEnemy(NormalEnemy $ascMatsEnemy): static
    {
        $this->ascMatsEnemies->removeElement($ascMatsEnemy);

        return $this;
    }

    /**
     * @return Collection<int, GoldenCalyx>
     */
    public function getGoldenCalyxes(): Collection
    {
        return $this->goldenCalyxes;
    }

    public function addGoldenCalyx(GoldenCalyx $goldenCalyx): static
    {
        if (!$this->goldenCalyxes->contains($goldenCalyx)) {
            $this->goldenCalyxes->add($goldenCalyx);
            $goldenCalyx->addGoldenCalyxAscMat($this);
        }

        return $this;
    }

    public function removeGoldenCalyx(GoldenCalyx $goldenCalyx): static
    {
        if ($this->goldenCalyxes->removeElement($goldenCalyx)) {
            $goldenCalyx->removeGoldenCalyxAscMat($this);
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
            $lightCone->setLcAscMats($this);
        }

        return $this;
    }

    public function removeLightCone(LightCone $lightCone): static
    {
        if ($this->lightCones->removeElement($lightCone)) {
            // set the owning side to null (unless already changed)
            if ($lightCone->getLcAscMats() === $this) {
                $lightCone->setLcAscMats(null);
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
            $character->setCharacterAscMats($this);
        }

        return $this;
    }

    public function removeCharacter(BaseCharacter $character): static
    {
        if ($this->characters->removeElement($character)) {
            // set the owning side to null (unless already changed)
            if ($character->getCharacterAscMats() === $this) {
                $character->setCharacterAscMats(null);
            }
        }

        return $this;
    }
}
