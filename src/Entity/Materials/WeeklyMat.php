<?php

namespace App\Entity\Materials;

use App\Repository\WeeklyMatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WeeklyMatRepository::class)]
class WeeklyMat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $weeklyMatName = null;

    #[ORM\Column]
    private ?bool $weeklyMatReleased = null;

    #[ORM\Column]
    private ?bool $weeklyMatAnnounced = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Media $weeklyMatIcon = null;

    #[ORM\OneToOne(inversedBy: 'weeklyMat', cascade: ['persist', 'remove'])]
    private ?EchoOfWar $weeklyMatEchoOfWar = null;

    /**
     * @var Collection<int, BaseCharacter>
     */
    #[ORM\OneToMany(targetEntity: BaseCharacter::class, mappedBy: 'characterWeeklyMat')]
    private Collection $characters;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    public function __construct()
    {
        $this->characters = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->weeklyMatName;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWeeklyMatName(): ?string
    {
        return $this->weeklyMatName;
    }

    public function setWeeklyMatName(string $weeklyMatName): static
    {
        $this->weeklyMatName = $weeklyMatName;

        return $this;
    }

    public function isWeeklyMatReleased(): ?bool
    {
        return $this->weeklyMatReleased;
    }

    public function setWeeklyMatReleased(bool $weeklyMatReleased): static
    {
        $this->weeklyMatReleased = $weeklyMatReleased;

        return $this;
    }

    public function isWeeklyMatAnnounced(): ?bool
    {
        return $this->weeklyMatAnnounced;
    }

    public function setWeeklyMatAnnounced(bool $weeklyMatAnnounced): static
    {
        $this->weeklyMatAnnounced = $weeklyMatAnnounced;

        return $this;
    }

    public function getWeeklyMatIcon(): ?Media
    {
        return $this->weeklyMatIcon;
    }

    public function setWeeklyMatIcon(?Media $weeklyMatIcon): static
    {
        $this->weeklyMatIcon = $weeklyMatIcon;

        return $this;
    }

    public function getWeeklyMatEchoOfWar(): ?EchoOfWar
    {
        return $this->weeklyMatEchoOfWar;
    }

    public function setWeeklyMatEchoOfWar(?EchoOfWar $weeklyMatEchoOfWar): static
    {
        $this->weeklyMatEchoOfWar = $weeklyMatEchoOfWar;

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
            $character->setCharacterWeeklyMat($this);
        }

        return $this;
    }

    public function removeCharacter(BaseCharacter $character): static
    {
        if ($this->characters->removeElement($character)) {
            // set the owning side to null (unless already changed)
            if ($character->getCharacterWeeklyMat() === $this) {
                $character->setCharacterWeeklyMat(null);
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
