<?php

namespace App\Entity\Enemies;

use App\Repository\EchosBossRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EchosBossRepository::class)]
class EchosBoss
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $echoBossName = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Media $echoBossIcon = null;

    /**
     * @var Collection<int, Type>
     */
    #[ORM\ManyToMany(targetEntity: Type::class, inversedBy: 'echosBosses')]
    private Collection $echoBossWeaknesses;

    #[ORM\OneToOne(mappedBy: 'echoOfWarBoss', cascade: ['persist', 'remove'])]
    private ?EchoOfWar $echoOfWar = null;

    public function __construct()
    {
        $this->echoBossWeaknesses = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->echoBossName;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEchoBossName(): ?string
    {
        return $this->echoBossName;
    }

    public function setEchoBossName(string $echoBossName): static
    {
        $this->echoBossName = $echoBossName;

        return $this;
    }

    public function getEchoBossIcon(): ?Media
    {
        return $this->echoBossIcon;
    }

    public function setEchoBossIcon(?Media $echoBossIcon): static
    {
        $this->echoBossIcon = $echoBossIcon;

        return $this;
    }

    /**
     * @return Collection<int, Type>
     */
    public function getEchoBossWeaknesses(): Collection
    {
        return $this->echoBossWeaknesses;
    }

    public function addEchoBossWeakness(Type $echoBossWeakness): static
    {
        if (!$this->echoBossWeaknesses->contains($echoBossWeakness)) {
            $this->echoBossWeaknesses->add($echoBossWeakness);
        }

        return $this;
    }

    public function removeEchoBossWeakness(Type $echoBossWeakness): static
    {
        $this->echoBossWeaknesses->removeElement($echoBossWeakness);

        return $this;
    }

    public function getEchoOfWar(): ?EchoOfWar
    {
        return $this->echoOfWar;
    }

    public function setEchoOfWar(?EchoOfWar $echoOfWar): static
    {
        // unset the owning side of the relation if necessary
        if ($echoOfWar === null && $this->echoOfWar !== null) {
            $this->echoOfWar->setEchoOfWarBoss(null);
        }

        // set the owning side of the relation if necessary
        if ($echoOfWar !== null && $echoOfWar->getEchoOfWarBoss() !== $this) {
            $echoOfWar->setEchoOfWarBoss($this);
        }

        $this->echoOfWar = $echoOfWar;

        return $this;
    }
}
