<?php

namespace App\Entity\Enemies;

use App\Entity\Domains\OrnamentExtraction;
use App\Entity\Type;
use App\Repository\Enemies\BossEnemyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BossEnemyRepository::class)]
class BossEnemy
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $filename = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $enemyInfo = null;

    /**
     * @var Collection<int, Type>
     */
    #[ORM\ManyToMany(targetEntity: Type::class, inversedBy: 'bossEnemies')]
    private Collection $weaknesses;

    #[ORM\OneToOne(mappedBy: 'bossEnemy', cascade: ['persist', 'remove'])]
    private ?OrnamentExtraction $ornamentExtraction = null;

    public function __construct()
    {
        $this->weaknesses = new ArrayCollection();
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

    public function getFilename(): ?string
    {
        return $this->filename;
    }

    public function setFilename(?string $filename): static
    {
        $this->filename = $filename;

        return $this;
    }

    public function getEnemyInfo(): ?string
    {
        return $this->enemyInfo;
    }

    public function setEnemyInfo(?string $enemyInfo): static
    {
        $this->enemyInfo = $enemyInfo;

        return $this;
    }

    /**
     * @return Collection<int, Type>
     */
    public function getWeaknesses(): Collection
    {
        return $this->weaknesses;
    }

    public function addWeakness(Type $weakness): static
    {
        if (!$this->weaknesses->contains($weakness)) {
            $this->weaknesses->add($weakness);
        }

        return $this;
    }

    public function removeWeakness(Type $weakness): static
    {
        $this->weaknesses->removeElement($weakness);

        return $this;
    }

    public function getOrnamentExtraction(): ?OrnamentExtraction
    {
        return $this->ornamentExtraction;
    }

    public function setOrnamentExtraction(?OrnamentExtraction $ornamentExtraction): static
    {
        // unset the owning side of the relation if necessary
        if ($ornamentExtraction === null && $this->ornamentExtraction !== null) {
            $this->ornamentExtraction->setBossEnemy(null);
        }

        // set the owning side of the relation if necessary
        if ($ornamentExtraction !== null && $ornamentExtraction->getBossEnemy() !== $this) {
            $ornamentExtraction->setBossEnemy($this);
        }

        $this->ornamentExtraction = $ornamentExtraction;

        return $this;
    }
}
