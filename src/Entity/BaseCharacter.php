<?php

namespace App\Entity;

use App\Repository\BaseCharacterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    private ?string $characterRarity = null;

    #[ORM\Column(length: 255)]
    private ?string $characterPath = null;

    #[ORM\Column(length: 255)]
    private ?string $characterType = null;

    #[ORM\OneToOne(inversedBy: 'characterName', cascade: ['persist', 'remove'])]
    private ?CharacterKit $kit = null;

    #[ORM\OneToOne(inversedBy: 'characterName', cascade: ['persist', 'remove'])]
    private ?CharacterEidolons $eidolons = null;

    /**
     * @var Collection<int, Media>
     */
    #[ORM\ManyToMany(targetEntity: Media::class)]
    private Collection $media;

    public function __construct()
    {
        $this->media = new ArrayCollection();
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

    public function getCharacterRarity(): ?string
    {
        return $this->characterRarity;
    }

    public function setCharacterRarity(string $characterRarity): static
    {
        $this->characterRarity = $characterRarity;

        return $this;
    }

    public function getCharacterPath(): ?string
    {
        return $this->characterPath;
    }

    public function setCharacterPath(string $characterPath): static
    {
        $this->characterPath = $characterPath;

        return $this;
    }

    public function getCharacterType(): ?string
    {
        return $this->characterType;
    }

    public function setCharacterType(string $characterType): static
    {
        $this->characterType = $characterType;

        return $this;
    }

    public function getKit(): ?CharacterKit
    {
        return $this->kit;
    }

    public function setKit(?CharacterKit $kit): static
    {
        $this->kit = $kit;

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

    public function __toString()
    {
        return $this->characterName;
    }

    /**
     * @return Collection<int, Media>
     */
    public function getMedia(): Collection
    {
        return $this->media;
    }

    public function addMedium(Media $medium): static
    {
        if (!$this->media->contains($medium)) {
            $this->media->add($medium);
        }

        return $this;
    }

    public function removeMedium(Media $medium): static
    {
        $this->media->removeElement($medium);

        return $this;
    }
}
