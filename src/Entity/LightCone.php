<?php

namespace App\Entity;

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
    private ?string $lcName = null;

    #[ORM\Column(length: 255)]
    private ?string $lcPath = null;

    #[ORM\Column(nullable: true)]
    private ?int $lcBaseAtk = null;

    #[ORM\Column(nullable: true)]
    private ?int $lcBaseDef = null;

    #[ORM\Column(nullable: true)]
    private ?int $lcBaseHp = null;

    #[ORM\Column(length: 255)]
    private ?string $lcRarity = null;

    /**
     * @var Collection<int, Media>
     */
    #[ORM\ManyToMany(targetEntity: Media::class)]
    private Collection $media;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $lcStory = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $lcSkillOne = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $lcSkillTwo = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $lcSkillThree = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $lcSkillFour = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $lcSkillFive = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lcSkillName = null;

    public function __construct()
    {
        $this->media = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLcName(): ?string
    {
        return $this->lcName;
    }

    public function setLcName(string $lcName): static
    {
        $this->lcName = $lcName;

        return $this;
    }

    public function getLcPath(): ?string
    {
        return $this->lcPath;
    }

    public function setLcPath(string $lcPath): static
    {
        $this->lcPath = $lcPath;

        return $this;
    }

    public function getLcBaseAtk(): ?int
    {
        return $this->lcBaseAtk;
    }

    public function setLcBaseAtk(?int $lcBaseAtk): static
    {
        $this->lcBaseAtk = $lcBaseAtk;

        return $this;
    }

    public function getLcBaseDef(): ?int
    {
        return $this->lcBaseDef;
    }

    public function setLcBaseDef(?int $lcBaseDef): static
    {
        $this->lcBaseDef = $lcBaseDef;

        return $this;
    }

    public function getLcBaseHp(): ?int
    {
        return $this->lcBaseHp;
    }

    public function setLcBaseHp(?int $lcBaseHp): static
    {
        $this->lcBaseHp = $lcBaseHp;

        return $this;
    }

    public function getLcRarity(): ?string
    {
        return $this->lcRarity;
    }

    public function setLcRarity(string $lcRarity): static
    {
        $this->lcRarity = $lcRarity;

        return $this;
    }

    /**
     * @return Collection<int, Media>
     */
    public function getMedia(): Collection
    {
        return $this->media;
    }

    public function addMedia(Media $media): static
    {
        if (!$this->media->contains($media)) {
            $this->media->add($media);
        }

        return $this;
    }

    public function removeMedia(Media $media): static
    {
        $this->media->removeElement($media);

        return $this;
    }

    public function getLcStory(): ?string
    {
        return $this->lcStory;
    }

    public function setLcStory(?string $lcStory): static
    {
        $this->lcStory = $lcStory;

        return $this;
    }

    public function getLcSkillOne(): ?string
    {
        return $this->lcSkillOne;
    }

    public function setLcSkillOne(?string $lcSkillOne): static
    {
        $this->lcSkillOne = $lcSkillOne;

        return $this;
    }

    public function getLcSkillTwo(): ?string
    {
        return $this->lcSkillTwo;
    }

    public function setLcSkillTwo(?string $lcSkillTwo): static
    {
        $this->lcSkillTwo = $lcSkillTwo;

        return $this;
    }

    public function getLcSkillThree(): ?string
    {
        return $this->lcSkillThree;
    }

    public function setLcSkillThree(string $lcSkillThree): static
    {
        $this->lcSkillThree = $lcSkillThree;

        return $this;
    }

    public function getLcSkillFour(): ?string
    {
        return $this->lcSkillFour;
    }

    public function setLcSkillFour(?string $lcSkillFour): static
    {
        $this->lcSkillFour = $lcSkillFour;

        return $this;
    }

    public function getLcSkillFive(): ?string
    {
        return $this->lcSkillFive;
    }

    public function setLcSkillFive(?string $lcSkillFive): static
    {
        $this->lcSkillFive = $lcSkillFive;

        return $this;
    }

    public function getLcSkillName(): ?string
    {
        return $this->lcSkillName;
    }

    public function setLcSkillName(?string $lcSkillName): static
    {
        $this->lcSkillName = $lcSkillName;

        return $this;
    }
}
