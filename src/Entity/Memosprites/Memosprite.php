<?php

namespace App\Entity\Memosprites;

use App\Entity\Characters\CharacterKit;
use App\Entity\Media;
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

    /**
     * @var Collection<int, MemospriteSkill>
     */
    #[ORM\OneToMany(targetEntity: MemospriteSkill::class, mappedBy: 'memosprite')]
    private Collection $skills;

    /**
     * @var Collection<int, MemospriteTalent>
     */
    #[ORM\OneToMany(targetEntity: MemospriteTalent::class, mappedBy: 'memosprite')]
    private Collection $talents;

    public function __construct()
    {
        $this->icons = new ArrayCollection();
        $this->skills = new ArrayCollection();
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

    /**
     * @return Collection<int, MemospriteSkill>
     */
    public function getSkills(): Collection
    {
        return $this->skills;
    }

    public function addSkill(MemospriteSkill $skill): static
    {
        if (!$this->skills->contains($skill)) {
            $this->skills->add($skill);
            $skill->setMemosprite($this);
        }

        return $this;
    }

    public function removeSkill(MemospriteSkill $skill): static
    {
        if ($this->skills->removeElement($skill)) {
            // set the owning side to null (unless already changed)
            if ($skill->getMemosprite() === $this) {
                $skill->setMemosprite(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, MemospriteTalent>
     */
    public function getTalents(): Collection
    {
        return $this->talents;
    }

    public function addTalent(MemospriteTalent $talent): static
    {
        if (!$this->talents->contains($talent)) {
            $this->talents->add($talent);
            $talent->setMemosprite($this);
        }

        return $this;
    }

    public function removeTalent(MemospriteTalent $talent): static
    {
        if ($this->talents->removeElement($talent)) {
            // set the owning side to null (unless already changed)
            if ($talent->getMemosprite() === $this) {
                $talent->setMemosprite(null);
            }
        }

        return $this;
    }
}
