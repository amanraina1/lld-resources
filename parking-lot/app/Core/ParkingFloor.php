<?php

namespace App\Core;

class ParkingFloor
{
    private int $floorId;

    private array $parkingSpots = [];

    public function __construct(int $floorId, array $parkingSpots)
    {
        $this->floorId = $floorId;
        $this->parkingSpots = $parkingSpots;
    }

    public function getParkingSpots()
    {
        return $this->parkingSpots;
    }

    public function getId()
    {
        return $this->floorId;
    }
}