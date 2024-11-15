<?php

namespace App\Entity;

use App\Repository\LightConeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\Column(length: 2000, nullable: true)]
    private ?string $lcDesc = null;

    #[ORM\Column(length: 2000, nullable: true)]
    private ?string $lcSuperimposition = null;

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

    public function getLcDesc(): ?string
    {
        return $this->lcDesc;
    }

    public function setLcDesc(?string $lcDesc): static
    {
        $this->lcDesc = $lcDesc;

        return $this;
    }

    public function getLcSuperimposition(): ?string
    {
        return $this->lcSuperimposition;
    }

    public function setLcSuperimposition(?string $lcSuperimposition): static
    {
        $this->lcSuperimposition = $lcSuperimposition;

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
}
