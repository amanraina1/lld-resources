<?php

namespace App\Core;

use App\Core\Vehicle;
use App\Core\ParkingSpot;
use DateTimeImmutable;

class Ticket
{
    public string $ticketId;
    public ParkingSpot $spot;
    private Vehicle $vehicle;
    public DateTimeImmutable $entryTime;
    public DateTimeImmutable $exitTime;
    public float $charges;

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

    private function randomString()
    {
        $bytes = random_bytes(16);
        return bin2hex($bytes);
    }
}