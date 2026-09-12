<?php

namespace App\Core;

use App\Core\Vehicle;
use App\Core\ParkingSpot;
use DateTimeImmutable;

class Ticket
{
    private string $ticketId;
    private ParkingSpot $spot;
    private Vehicle $vehicle;
    private DateTimeImmutable $entryTime;
    private ?DateTimeImmutable $exitTime = null;
    private ?float $charges = null;

    public function __construct(ParkingSpot $spot, Vehicle $vehicle)
    {
        $this->ticketId = $this->randomString();
        $this->spot = $spot;
        $this->vehicle = $vehicle;
        $this->entryTime = now();
    }

    public function closeTicket(float $charges)
    {
        $this->charges = $charges;
    }

    public function setExitTime(DateTimeImmutable $exitTime)
    {
        $this->exitTime = $exitTime;
    }

    public function getTicketId(): string
    {
        return $this->ticketId;
    }

    public function getSpot(): ParkingSpot
    {
        return $this->spot;
    }

    public function getVehicle(): Vehicle
    {
        return $this->vehicle;
    }

    public function getEntryTime(): DateTimeImmutable
    {
        return $this->entryTime;
    }

    public function getExitTime(): ?DateTimeImmutable
    {
        return $this->exitTime;
    }

    public function getCharges(): ?float
    {
        return $this->charges;
    }

    private function randomString()
    {
        $bytes = random_bytes(16);
        return bin2hex($bytes);
    }
}
