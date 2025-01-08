<?php

namespace App\Entity\Characters;

use App\Entity\Media;
use App\Repository\Characters\CharacterEidolonsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CharacterEidolonsRepository::class)]
class CharacterEidolons
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(mappedBy: 'eidolons', cascade: ['persist', 'remove'])]
    private ?BaseCharacter $characterName = null;

    #[ORM\Column(nullable: true)]
    private ?array $eidolonOne = null;

    #[ORM\Column(nullable: true)]
    private ?array $eidolonTwo = null;

    #[ORM\Column(nullable: true)]
    private ?array $eidolonThree = null;

    #[ORM\Column(nullable: true)]
    private ?array $eidolonFour = null;

    #[ORM\Column(nullable: true)]
    private ?array $eidolonFive = null;

    #[ORM\Column(nullable: true)]
    private ?array $eidolonSix = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $eidolonStopPoint = null;

    /**
     * @var Collection<int, Media>
     */
    #[ORM\ManyToMany(targetEntity: Media::class)]
    private Collection $eidolonIcons;

    public function __construct()
    {
        $this->eidolonIcons = new ArrayCollection();
    }

    public function __toString()
    {
        $eidolonsName = $this->characterName + " - Eidolons";
        return $eidolonsName;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCharacterName(): ?BaseCharacter
    {
        return $this->characterName;
    }

    public function setCharacterName(?BaseCharacter $characterName): static
    {
        // unset the owning side of the relation if necessary
        if ($characterName === null && $this->characterName !== null) {
            $this->characterName->setEidolons(null);
        }

        // set the owning side of the relation if necessary
        if ($characterName !== null && $characterName->getEidolons() !== $this) {
            $characterName->setEidolons($this);
        }

        $this->characterName = $characterName;

        return $this;
    }

    public function getEidolonOne(): ?array
    {
        return $this->eidolonOne;
    }

    public function setEidolonOne(?array $eidolonOne): static
    {
        $this->eidolonOne = $eidolonOne;

        return $this;
    }

    public function getEidolonTwo(): ?array
    {
        return $this->eidolonTwo;
    }

    public function setEidolonTwo(?array $eidolonTwo): static
    {
        $this->eidolonTwo = $eidolonTwo;

        return $this;
    }

    public function getEidolonThree(): ?array
    {
        return $this->eidolonThree;
    }

    public function setEidolonThree(?array $eidolonThree): static
    {
        $this->eidolonThree = $eidolonThree;

        return $this;
    }

    public function getEidolonFour(): ?array
    {
        return $this->eidolonFour;
    }

    public function setEidolonFour(?array $eidolonFour): static
    {
        $this->eidolonFour = $eidolonFour;

        return $this;
    }

    public function getEidolonFive(): ?array
    {
        return $this->eidolonFive;
    }

    public function setEidolonFive(?array $eidolonFive): static
    {
        $this->eidolonFive = $eidolonFive;

        return $this;
    }

    public function getEidolonSix(): ?array
    {
        return $this->eidolonSix;
    }

    public function setEidolonSix(?array $eidolonSix): static
    {
        $this->eidolonSix = $eidolonSix;

        return $this;
    }

    public function getEidolonStopPoint(): ?string
    {
        return $this->eidolonStopPoint;
    }

    public function setEidolonStopPoint(?string $eidolonStopPoint): static
    {
        $this->eidolonStopPoint = $eidolonStopPoint;

        return $this;
    }

    /**
     * @return Collection<int, Media>
     */
    public function getEidolonIcons(): Collection
    {
        return $this->eidolonIcons;
    }

    public function addEidolonIcon(Media $eidolonIcon): static
    {
        if (!$this->eidolonIcons->contains($eidolonIcon)) {
            $this->eidolonIcons->add($eidolonIcon);
        }

        return $this;
    }

    public function removeEidolonIcon(Media $eidolonIcon): static
    {
        $this->eidolonIcons->removeElement($eidolonIcon);

        return $this;
    }
}
