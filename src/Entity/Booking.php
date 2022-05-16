<?php

namespace App\Entity;

use App\Repository\BookingRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookingRepository::class)]
class Booking
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'date')]
    private $booking_start;

    #[ORM\Column(type: 'date')]
    private $booking_end;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'Booking')]
    private $client;

    #[ORM\Column(type: 'datetime_immutable')]
    private $created_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBookingStart(): ?\DateTimeInterface
    {
        return $this->booking_start;
    }

    public function setBookingStart(\DateTimeInterface $booking_start): self
    {
        $this->booking_start = $booking_start;

        return $this;
    }

    public function getBookingEnd(): ?\DateTimeInterface
    {
        return $this->booking_end;
    }

    public function setBookingEnd(\DateTimeInterface $booking_end): self
    {
        $this->booking_end = $booking_end;

        return $this;
    }

    public function getClient(): ?User
    {
        return $this->client;
    }

    public function setClient(?User $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }
}
