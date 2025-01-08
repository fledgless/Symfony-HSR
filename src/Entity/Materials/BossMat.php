<?php

namespace App\Entity\Materials;

use App\Entity\Characters\BaseCharacter;
use App\Entity\Domains\StagnantShadow;
use App\Entity\Media;
use App\Entity\Type;
use App\Repository\Materials\BossMatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BossMatRepository::class)]
class BossMat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $bossMatName = null;

    #[ORM\Column]
    private ?bool $bossMatReleased = false;

    #[ORM\Column]
    private ?bool $bossMatAnnounced = false;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Media $bossMatIcon = null;

    #[ORM\OneToOne(inversedBy: 'bossMat', cascade: ['persist', 'remove'])]
    private ?StagnantShadow $bossMatStagnantShadow = null;

    #[ORM\ManyToOne(inversedBy: 'bossMats')]
    private ?Type $bossMatType = null;

    /**
     * @var Collection<int, BaseCharacter>
     */
    #[ORM\OneToMany(targetEntity: BaseCharacter::class, mappedBy: 'characterBossMat')]
    private Collection $characters;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    public function __construct()
    {
        $this->characters = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->bossMatName;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBossMatName(): ?string
    {
        return $this->bossMatName;
    }

    public function setBossMatName(string $bossMatName): static
    {
        $this->bossMatName = $bossMatName;

        return $this;
    }

    public function isBossMatReleased(): ?bool
    {
        return $this->bossMatReleased;
    }

    public function setBossMatReleased(bool $bossMatReleased): static
    {
        $this->bossMatReleased = $bossMatReleased;

        return $this;
    }

    public function isBossMatAnnounced(): ?bool
    {
        return $this->bossMatAnnounced;
    }

    public function setBossMatAnnounced(bool $bossMatAnnounced): static
    {
        $this->bossMatAnnounced = $bossMatAnnounced;

        return $this;
    }

    public function getBossMatIcon(): ?Media
    {
        return $this->bossMatIcon;
    }

    public function setBossMatIcon(?Media $bossMatIcon): static
    {
        $this->bossMatIcon = $bossMatIcon;

        return $this;
    }

    public function getBossMatStagnantShadow(): ?StagnantShadow
    {
        return $this->bossMatStagnantShadow;
    }

    public function setBossMatStagnantShadow(?StagnantShadow $bossMatStagnantShadow): static
    {
        $this->bossMatStagnantShadow = $bossMatStagnantShadow;

        return $this;
    }

    public function getBossMatType(): ?Type
    {
        return $this->bossMatType;
    }

    public function setBossMatType(?Type $bossMatType): static
    {
        $this->bossMatType = $bossMatType;

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
            $character->setCharacterBossMat($this);
        }

        return $this;
    }

    public function removeCharacter(BaseCharacter $character): static
    {
        if ($this->characters->removeElement($character)) {
            // set the owning side to null (unless already changed)
            if ($character->getCharacterBossMat() === $this) {
                $character->setCharacterBossMat(null);
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
