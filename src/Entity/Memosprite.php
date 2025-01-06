<?php

namespace App\Entity;

use App\Repository\MemospriteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MemospriteRepository::class)]
class Memosprite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToOne(inversedBy: 'memosprite', cascade: ['persist', 'remove'])]
    private ?CharacterKit $memomaster = null;

    /**
     * @var Collection<int, Media>
     */
    #[ORM\ManyToMany(targetEntity: Media::class)]
    private Collection $icons;

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

    public function getMemomaster(): ?CharacterKit
    {
        return $this->memomaster;
    }

    public function setMemomaster(?CharacterKit $memomaster): static
    {
        $this->memomaster = $memomaster;

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
}
