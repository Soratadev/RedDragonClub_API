<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 25)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    /**
     * @var Collection<int, Boardgame>
     */
    #[ORM\ManyToMany(targetEntity: Boardgame::class, inversedBy: 'categories')]
    private Collection $boardgames;

    public function __construct()
    {
        $this->boardgames = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Boardgame>
     */
    public function getBoardgames(): Collection
    {
        return $this->boardgames;
    }

    public function addBoardgame(Boardgame $boardgame): static
    {
        if (!$this->boardgames->contains($boardgame)) {
            $this->boardgames->add($boardgame);
        }

        return $this;
    }

    public function removeBoardgame(Boardgame $boardgame): static
    {
        $this->boardgames->removeElement($boardgame);

        return $this;
    }
}
