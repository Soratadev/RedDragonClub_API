<?php

namespace App\Entity;

use App\Repository\BookingRepository;
use DateTimeInterface;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookingRepository::class)]
class Booking
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\ManyToOne(inversedBy: 'bookings')]
    private User $idUser;

    #[ORM\ManyToOne(inversedBy: 'bookings')]
    private Boardgame $idBoardgame;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private DateTimeInterface $loanDate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUser(): ?User
    {
        return $this->idUser;
    }

    public function setIdUser(?User $idUser): static
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function getIdBoardgame(): ?Boardgame
    {
        return $this->idBoardgame;
    }

    public function setIdBoardgame(?Boardgame $idBoardgame): static
    {
        $this->idBoardgame = $idBoardgame;

        return $this;
    }

    public function getLoanDate(): ?DateTimeInterface
    {
        return $this->loanDate;
    }

    public function setLoanDate(DateTimeInterface $loanDate): static
    {
        $this->loanDate = $loanDate;

        return $this;
    }
}
