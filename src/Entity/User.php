<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
class User implements UserInterface, \Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $username = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateOfJoining = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $birthdate = null;

    /**
     * @var Collection<int, Booking>
     */
    #[ORM\OneToMany(targetEntity: Booking::class, mappedBy: 'idUser')]
    private Collection $bookings;

    #[ORM\Column]
    private bool $isAdmin;

    public function __construct()
    {
        $this->bookings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getDateOfJoining(): ?\DateTimeInterface
    {
        return $this->dateOfJoining;
    }

    public function setDateOfJoining(\DateTimeInterface $dateOfJoining): static
    {
        $this->dateOfJoining = $dateOfJoining;

        return $this;
    }

    public function getBirthdate(): ?\DateTimeInterface
    {
        return $this->birthdate;
    }

    public function setBirthdate(\DateTimeInterface $birthdate): static
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * @return Collection<int, Booking>
     */
    public function getBookings(): Collection
    {
        return $this->bookings;
    }

    public function addBooking(Booking $booking): static
    {
        if (!$this->bookings->contains($booking)) {
            $this->bookings->add($booking);
            $booking->setIdUser($this);
        }

        return $this;
    }

    public function removeBooking(Booking $booking): static
    {
        if ($this->bookings->removeElement($booking)) {
            // set the owning side to null (unless already changed)
            if ($booking->getIdUser() === $this) {
                $booking->setIdUser(null);
            }
        }

        return $this;
    }

    public function isAdmin(): ?bool
    {
        return $this->isAdmin;
    }

    public function setIsAdmin(bool $isAdmin): static
    {
        $this->isAdmin = $isAdmin;

        return $this;
    }

    public function getUserIdentifier(): string
    {
        return $this->email;
    }

    public function getRoles(): array
    {
        return $this->isAdmin ? ['ROLE_ADMIN'] : ['ROLE_USER'];
    }

    public function eraseCredentials(): void
    {
    }

    public function getSalt(): ?string
    {
        return null;
    }
}
