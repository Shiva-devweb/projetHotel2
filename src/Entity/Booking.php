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
}
