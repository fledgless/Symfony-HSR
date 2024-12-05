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
    private ?bool $ascMatReleased = null;

    #[ORM\Column]
    private ?bool $ascMatAnnounced = null;

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

    public function __construct()
    {
        $this->ascMatIcons = new ArrayCollection();
        $this->ascMatsEnemies = new ArrayCollection();
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
}
